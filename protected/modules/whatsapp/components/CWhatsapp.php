<?php
require_once 'whatsprot.class.php';

class CWhatsapp
{
    public $config;
    public $from;
    public $number;
    public $id;
    public $nick;
    public $password;
    public $contacts = [];
    public $inputs;
    public $messages;
    public $wa;
    public $connected;
    public $waGroupList;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->wa = new WhatsProt($this->number, $this->nick, false);
        $this->wa->eventManager()->bind('onGetMessage', [$this, 'processReceivedMessage']);
        $this->wa->eventManager()->bind('onConnect', [$this, 'connected']);
        //$this->wa->eventManager()->bind('onGetGroups', [$this, 'processGroupArray']);

        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->inputs = $this->cleanPostInputs();

                if (isset($this->inputs['from'])) {
                    $this->from = $this->inputs['from'];

                    if (!array_key_exists($this->from, $this->config)) {
                        exit(json_encode([
                            'success'  => false,
                            'type'     => 'contacts',
                            'errormsg' => "No config settings for user $this->from could be found",
                        ]));
                    } else {
                        $this->number = $this->config[$this->from]['fromNumber'];
                        $this->id = $this->config[$this->from]['id'];
                        $this->nick = $this->config[$this->from]['nick'];
                        $this->password = $this->config[$this->from]['waPassword'];

                        $this->wa = new WhatsProt($this->number, $this->nick, false);
                        $this->wa->eventManager()->bind('onGetMessage', [$this, 'processReceivedMessage']);
                        $this->wa->eventManager()->bind('onConnect', [$this, 'connected']);
                        $this->wa->eventManager()->bind('onGetGroups', [$this, 'processGroupArray']);
                    }
                }
            } catch (Exception $e) {
                exit(json_encode([
                    'success'  => false,
                    'type'     => 'contacts',
                    'errormsg' => $e->getMessage(),
                ]));
            }
        }*/
    }

    /**
     * Sets flag when there is a connection with WhatsAPP servers.
     *
     * @return void
     */
    public function connected()
    {
        $this->connected = true;
    }

    /**
     * Clean and Filter the inputted Form values.
     *
     * This function attempts to clean and filter input values from
     * the form in the $_POST array. As nothing is currently put into
     * a database etc, this is probably not required, but it should help
     * if someone wishes to extend this project later.
     *
     * @throws Exception If no $_POST values submitted.
     *
     * @return array array with values that have been filtered.
     */
    private function cleanPostInputs()
    {
        $args = [
            'action'   => FILTER_SANITIZE_STRING,
            'password' => FILTER_SANITIZE_STRING,
            'from'     => FILTER_SANITIZE_STRING,
            'to'       => [
                'filter' => FILTER_SANITIZE_NUMBER_INT,
                'flags'  => FILTER_REQUIRE_ARRAY,
            ],
            'message'      => FILTER_UNSAFE_RAW,
            'image'        => FILTER_VALIDATE_URL,
            'audio'        => FILTER_VALIDATE_URL,
            'video'        => FILTER_VALIDATE_URL,
            'locationname' => FILTER_SANITIZE_STRING,
            'status'       => FILTER_SANITIZE_STRING,
            'userlat'      => FILTER_SANITIZE_STRING,
            'userlong'     => FILTER_SANITIZE_STRING,
        ];

        $myinputs = filter_input_array(INPUT_POST, $args);
        if (!$myinputs) {
            throw Exception('Problem Filtering the inputs');
        }

        return $myinputs;
    }

    /**
     * Process the latest request.
     *
     * Decide what course of action to take with the latest
     * request/post to this script.
     *
     * @return void
     */
    public function process()
    {
        switch ($this->inputs['action']) {
            case 'login':
                $this->webLogin();
                break;
            case 'logout':
                $this->webLogout();
                exit($this->showWebLoginForm());
                break;
            case 'getContacts':
                $this->getContacts();
                break;
            case 'updateStatus':
                $this->updateStatus();
                break;
            case 'sendMessage':
                $this->sendMessage();
                break;
            case 'sendBroadcast':
                $this->sendBroadcast();
                break;
            default:
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    exit($this->showWebForm());
                }
                exit($this->showWebLoginForm());
                break;
        }
    }

    /**
     * Get Contacts from various sources to display in form.
     *
     * This method will allow you to add contacts from external
     * sources to add to the "to box" dropdown list on the form.
     * Currently this can include:
     *  - Whatsapp Groups for the current user
     *  - Google Contacts (if username/password was supplied in config)
     *
     * @return void
     */
    private function getContacts()
    {
        try {
            //Get whatsapp's Groups this user belongs to.
            $this->waGroupList = [];
            $this->getGroupList();
            if (is_array($this->waGroupList)) {
                $this->contacts = array_merge($this->contacts, $this->waGroupList);
            }

            //Get contacts from google if gmail account configured.
            $googleContacts = [];
            if (isset($this->config[$this->from]['email'])) {
                $email = $this->config[$this->from]['email'];

                if (stripos($email, 'gmail') !== false || stripos($email, 'googlemail') !== false) {
                    $google = new GoogleContacts();
                    $googleContacts = $google->getContacts($this->config, $this->from);
                    if (is_array($googleContacts)) {
                        $this->contacts = array_merge($this->contacts, $googleContacts);
                    }
                }
            }

            if (isset($this->contacts)) {
                exit(json_encode([
                    'success'  => true,
                    'type'     => 'contacts',
                    'data'     => $this->contacts,
                    'messages' => $this->messages,
                ]));
            }
        } catch (Exception $e) {
            exit(json_encode([
                'success'  => false,
                'type'     => 'contacts',
                'errormsg' => $e->getMessage(),
            ]));
        }
    }

    /**
     * Cleanly disconnect from Whatsapp.
     *
     * Ensure at end of script, if a connected had been made
     * to the whatsapp servers, that it is nicely terminated.
     *
     * @return void
     */
    public function __destruct()
    {
        if (isset($this->wa) && $this->connected) {
            $this->wa->disconnect();
        }
    }

    /**
     * Connect to Whatsapp.
     *
     * Create a connection to the whatsapp servers
     * using the supplied password.
     *
     * @return bool
     */
    private function connectToWhatsApp()
    {
        if (isset($this->wa)) {
            $this->wa->connect();
            $this->wa->loginWithPassword($this->password);

            return true;
        }

        return false;
    }

    /**
     * Return all groups a user belongs too.
     *
     * Log into the whatsapp servers and return a list
     * of all the groups a user participates in.
     *
     * @return void
     */
    private function getGroupList()
    {
        $this->connectToWhatsApp();
        $this->wa->sendGetGroups();
    }

    /**
     * Process inbound text messages.
     *
     * If an inbound message is detected, this method will
     * store the details so that it can be shown to the user
     * at a suitable time.
     *
     * @param string $phone The number that is receiving the message
     * @param string $from  The number that is sending the message
     * @param string $id    The unique ID for the message
     * @param string $type  Type of inbound message
     * @param string $time  Y-m-d H:m:s formatted string
     * @param string $name  The Name of sender (nick)
     * @param string $data  The actual message
     *
     * @return void
     */
    public function processReceivedMessage($phone, $from, $id, $type, $time, $name, $data)
    {
        $matches = null;
        $time = date('Y-m-d H:i:s', $time);
        if (preg_match('/\d*/', $from, $matches)) {
            $from = $matches[0];
        }
        $this->messages[] = ['phone' => $phone, 'from' => $from, 'id' => $id, 'type' => $type, 'time' => $time, 'name' => $name, 'data' => $data];
    }

    /**
     * Process the event onGetGroupList and sets a formatted array of groups the user belongs to.
     *
     * @param string $phone      The phone number (jid ) of the user
     * @param array  $groupArray Array with details of all groups user eitehr belongs to or owns.
     *
     * @return array|bool
     */
    public function processGroupArray($phone, $groupArray)
    {
        $formattedGroups = [];

        if (!empty($groupArray)) {
            foreach ($groupArray as $group) {
                $formattedGroups[] = ['name' => 'GROUP: '.$group['subject'], 'id' => $group['id']];
            }

            $this->waGroupList = $formattedGroups;

            return true;
        }

        return false;
    }

    /**
     * Update a users Status.
     *
     * @return void
     */
    private function updateStatus()
    {
        if (isset($this->inputs['status']) && trim($this->inputs['status']) !== '') {
            $this->connectToWhatsApp();
            $this->wa->sendStatusUpdate($this->inputs['status']);
            exit(json_encode([
                'success'  => true,
                'data'     => "<br />Your status was updated to - <b>{$this->inputs['status']}</b>",
                'messages' => $this->messages,
            ]));
        } else {
            exit(json_encode([
                'success'  => false,
                'errormsg' => 'There was no text in the submitted status box!',
            ]));
        }
    }

    /**
     * Sends a message to a contact.
     *
     * Depending on the inputs sends a
     * message/video/image/location message to
     * a contact.
     *
     * @return void
     */
    public function sendMessage()
    {
        if (is_array($this->inputs['to'])) {
            $this->connectToWhatsApp();
            foreach ($this->inputs['to'] as $to) {
                if (trim($to) !== '') {
                    if (isset($this->inputs['message']) && trim($this->inputs['message'] !== '')) {
                        $this->wa->sendMessageComposing($to);
                        $this->wa->sendMessage($to, $this->inputs['message']);
                    }
                    if (isset($this->inputs['image']) && $this->inputs['image'] !== false) {
                        $this->wa->sendMessageImage($to, $this->inputs['image']);
                    }
                    if (isset($this->inputs['audio']) && $this->inputs['audio'] !== false) {
                        $this->wa->sendMessageAudio($to, $this->inputs['audio']);
                    }
                    if (isset($this->inputs['video']) && $this->inputs['video'] !== false) {
                        $this->wa->sendMessageVideo($to, $this->inputs['video']);
                    }
                    if (isset($this->inputs['locationname']) && trim($this->inputs['locationname'] !== '')) {
                        $this->wa->sendMessageLocation($to, $this->inputs['userlong'], $this->inputs['userlat'], $this->inputs['locationname'], null);
                    }
                } else {
                    exit(json_encode([
                        'success'  => false,
                        'errormsg' => 'A blank number was provided!',
                        'messages' => $this->messages,
                    ]));
                }
            }

            exit(json_encode([
                'success'  => true,
                'data'     => 'Message Sent!',
                'messages' => $this->messages,
            ]));
        }
        exit(json_encode([
            'success'  => false,
            'errormsg' => 'Provided numbers to send message to were not in valid format.',
        ]));
    }

    /**
     * Sends a broadcast Message to a group of contacts.
     *
     * Currenly only sends a normal message to
     * a group of contacts.
     *
     * @return void
     */
    private function sendBroadcast()
    {
        if (isset($this->inputs['action']) && trim($this->inputs['action']) == 'sendBroadcast') {
            $this->connectToWhatsApp();
            if (isset($this->inputs['message']) && trim($this->inputs['message'] !== '')) {
                $this->wa->sendBroadcastMessage($this->inputs['to'], $this->inputs['message']);
            }
            if (isset($this->inputs['image']) && $this->inputs['image'] !== false) {
                $this->wa->sendBroadcastImage($this->inputs['to'], $this->inputs['image']);
            }
            if (isset($this->inputs['audio']) && $this->inputs['audio'] !== false) {
                $this->wa->sendBroadcastAudio($this->inputs['to'], $this->inputs['audio']);
            }
            if (isset($this->inputs['video']) && $this->inputs['video'] !== false) {
                $this->wa->sendBroadcastVideo($this->inputs['to'], $this->inputs['video']);
            }
            if (isset($this->inputs['locationname']) && trim($this->inputs['locationname'] !== '')) {
                $this->wa->sendBroadcastPlace($this->inputs['to'], $this->inputs['userlong'], $this->inputs['userlat'], $this->inputs['locationname'], null);
            }
            exit(json_encode([
                'success'  => true,
                'data'     => 'Broadcast Message Sent!',
                'messages' => $this->messages,
            ]));
        }
    }

    /**
     * Process the web login page.
     *
     * @return void
     */
    private function webLogin()
    {
        if ($this->inputs['password'] == $this->config['webpassword']) {
            $_SESSION['logged_in'] = true;
            exit($this->showWebForm());
        } else {
            $error = 'Sorry your password was incorrect.';
            exit($this->showWebLoginForm($error));
        }
    }

    /**
     * Logout of the webapp.
     *
     * @return void
     */
    private function webLogout()
    {
        unset($_SESSION['logged_in']);
    }

}