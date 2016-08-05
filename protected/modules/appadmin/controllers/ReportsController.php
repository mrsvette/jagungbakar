<?php

class ReportsController extends EController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('visitors'),
				'expression'=>'Rbac::ruleAccess(\'read_p\')',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Manages all models.
	 */
	public function actionVisitors()
	{
		$model=new PcounterUsers('search');
		$model->unsetAttributes();  // clear any default values

		$criteria=new CDbCriteria;
		$criteria->order='t.date_entry DESC';
		if(isset($_GET['PcounterUsers']['date_from']))
			$criteria->compare('DATE_FORMAT(t.date_entry,"%Y-%m-%d")','>='.date("Y-m-d",strtotime($_GET['PcounterUsers']['date_from'])));
		if(isset($_GET['PcounterUsers']['date_to']))
			$criteria->compare('DATE_FORMAT(t.date_entry,"%Y-%m-%d")','<='.date("Y-m-d",strtotime($_GET['PcounterUsers']['date_to'])));
		$criteria->group='DATE_FORMAT(t.date_entry,"%Y-%m-%d")';
		$dataProvider=new CActiveDataProvider('PcounterUsers',array('criteria'=>$criteria));

		$rawData=PcounterUsers::getUniqueVisitors(false,true);
		$uniquesProvider=new CArrayDataProvider($rawData, array(
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
		$this->render('visitors',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
			'uniquesProvider'=>$uniquesProvider
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Params::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='params-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
