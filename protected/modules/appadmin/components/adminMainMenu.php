<?php
Yii::import('zii.widgets.CPortlet');

class adminMainMenu extends CPortlet{
	public $visible=true;
	
	public function init()
    {
        if($this->visible)
        {
 
        }
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
	
	protected function renderContent()
	{
		$Rbac=new Rbac;
		$this->render('_adminmainmenu',array('items'=>$items,'Rbac'=>$Rbac));
	}
}

?>
