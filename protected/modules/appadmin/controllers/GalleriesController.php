<?php

class GalleriesController extends EController
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
				'actions'=>array('create'),
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
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			$model->date_entry=date(c);
			$model->user_entry=Yii::app()->user->id;
			$file=CUploadedFile::getInstance($model,'src');
			if(!empty($file)){
				$path = 'uploads/images/';
				$model->image=$file->name;
				$model->src=$path;
				$model->thumb='uploads/_thumbs/Images/';
				$model->date_entry=date(c);
				$model->user_entry=Yii::app()->user->id;
				if($file->saveAs($model->src.$model->image)){ //upload image
					//create thumb
					$thumb=Yii::app()->phpThumb->create($path.$model->image);
					$thumb->resize(250,250);
					$thumb->save($model->thumb.$model->image);
					if($model->save())
						$this->redirect(array('view'));
				}
			}
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
		$default_src=$model->src.$model->image;
		$old_image=$model->image;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			$model->date_entry=date(c);
			$model->user_entry=Yii::app()->user->id;
			$file=CUploadedFile::getInstance($model,'src');
			if(!empty($file)){
				$path = 'uploads/images/';
				$model->image=$file->name;
				$model->src=$path;
				$model->thumb='uploads/_thumbs/Images/';
				if($file->saveAs($model->src.$model->image)){ //upload image
					//create thumb
					$thumb=Yii::app()->phpThumb->create($path.$model->image);
					$thumb->resize(250,250);
					$thumb->save($model->thumb.$model->image);
					if($model->save()){
						if($model->image!=$old_image){
							if(file_exists($default_src))
								unlink($default_src);
							if(file_exists($model->thumb.$old_image))
								unlink($model->thumb.$old_image);
						}
						$this->redirect(array('view'));
					}
				}
			}else{
				$model->save();
				$this->redirect(array('view'));
			}
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
			$model=$this->loadModel($id);
			$filename=$model->src.$model->image;
			$thumb=$model->src.$model->thumb;
			if($model->delete()){
				if(file_exists($filename))
					unlink($filename);
				if(file_exists($thumb))
					unlink($thumb);
			}

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
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
