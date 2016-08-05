<?php

class NivosliderController extends DController
{
	public static $_alias='Nivo Sliders';

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
			array('allow',
				'actions'=>array('imageView'),
				'users'=>array('@'),
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
		$model=new NivoSlider('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NivoSlider']))
		{
			$model->attributes=$_POST['NivoSlider'];
			$file=CUploadedFile::getInstance($model, 'image');
			$model->image=uniqid().'.'.$file->getExtensionName();
			if($model->save()){
				if(!empty($file)){
					$path = 'images/slider/';
					if(!is_dir($path))
						mkdir($path);
					$file->saveAs($path.$model->image); //upload image
				}
				$this->redirect(array('view','id'=>$model->id));
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
		$image_lama=$model->image;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NivoSlider']))
		{
			$model->attributes=$_POST['NivoSlider'];
			$file=CUploadedFile::getInstance($model, 'image');
			if(!empty($file))
				$model->image=uniqid().'.'.$file->getExtensionName();
			else
				$model->image=$image_lama;
			if($model->save()){
				if(!empty($file)){
					$path = 'images/slider/';
					if(!is_dir($path))
						mkdir($path);
					$delfile = $path . basename($image_lama);
					if(!empty($image_lama) && file_exists($delfile))
						unlink ($delfile);
					$file->saveAs($path.$model->image); //upload image baru
				}
				$this->redirect(array('view','id'=>$model->id));
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
			$image='images/slider/'.$model->image;
			if($model->delete()){
				if(file_exists($image))
					unlink($image);
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
		$model=new NivoSlider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NivoSlider']))
			$model->attributes=$_GET['NivoSlider'];

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionImageView()
	{
		if(Yii::app()->request->isAjaxRequest ){
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=$this->loadModel($_POST['imageid']);
			echo CJSON::encode( array(
				  'status'=>'success',
				  'div' => CHtml::image(Yii::app()->request->baseUrl.'/images/slider/'.$model->image),
				));
			exit;
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=NivoSlider::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='nivo-slider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
