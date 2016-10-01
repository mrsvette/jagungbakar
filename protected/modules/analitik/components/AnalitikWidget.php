<?php
Yii::import('zii.widgets.CPortlet');

class AnalitikWidget extends CPortlet{

	public $visible = true;
	
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
		$code = Extension::getConfigByModule('analitik','analitik_code');
		$code = '<script type="text/javascript">'.$code.'</script>';

		$this->render(
			'_analitik',
			array(
				'code' => $code,
			)
		);
	}
}

?>
