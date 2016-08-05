<?php

class MemberGroupsController extends EController
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
				'actions'=>array('create','priviledge'),
				'expression'=>'Rbac::ruleAccess(\'create_p\')',
			),
			array('allow',
				'actions'=>array('view'),
				'expression'=>'Rbac::ruleAccess(\'read_p\')',
			),
			array('allow',
				'actions'=>array('update'),
				'expression'=>'Rbac::ruleAccess(\'update_p\')',
			),
			array('allow',
				'actions'=>array('delete'),
				'expression'=>'Rbac::ruleAccess(\'delete_p\')',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MemberGroup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MemberGroup']))
		{
			$model->attributes=$_POST['MemberGroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MemberGroup']))
		{
			$model->attributes=$_POST['MemberGroup'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionView()
	{
		$model=new MemberGroup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MemberGroup']))
			$model->attributes=$_GET['MemberGroup'];

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionPriviledge()
	{
		$this->layout='column2';

		$dataProvider=Crawler::getDataProvider2(Yii::app()->params['exceptionRbacAccess'],false);
		
		foreach($dataProvider as $data){
			$num[]=count(Crawler::getInternalActions($data['controller'].'Controller'));
		}
		rsort($num);
		$model=new MemberGroupAccess;
		if(isset($_POST['MemberGroupAccess'])){
			$model->attributes=$_POST['MemberGroupAccess'];
			foreach($model->access as $module=>$access){
				foreach($access as $controller=>$priv){
					$this->simpan($module,$controller,$_GET['id'],$priv);
				}
			}
			Yii::app()->user->setFlash('userrbac','Data berhasil disimpan.');
			$this->refresh();
		}
		$group=MemberGroup::model()->findByPk($_GET['id']);

		$this->render('priviledge',array(
				'dataProvider'=>$dataProvider,
				'model'=>$model,
				'num_column'=>$num[0],
				'group_name'=>$group->name,
			));
	}

	private function simpan($module,$controller,$group_id,$priv=array())
	{
		$model=new MemberGroupAccess;
		$model->module=strtolower($module);
		$model->controller=strtolower($controller);
		$model->group_id=(int)$group_id;
		
		$criteria=new CDbCriteria;
		$criteria->compare('module',$model->module);
		$criteria->compare('controller',$model->controller);
		$criteria->compare('group_id',$model->group_id);
		$count=MemberGroupAccess::model()->count($criteria);
		if($count>0){
			$model2=MemberGroupAccess::model()->find($criteria);
			$model2->create_p=$priv['create_p'];
			$model2->read_p=$priv['read_p'];
			$model2->update_p=$priv['update_p'];
			$model2->delete_p=$priv['delete_p'];
			$model2->update(array('create_p','update_p','delete_p','read_p'));
		}else{
			$model->create_p=$priv['create_p'];
			$model->read_p=$priv['read_p'];
			$model->update_p=$priv['update_p'];
			$model->delete_p=$priv['delete_p'];
			$model->save();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MemberGroup::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
