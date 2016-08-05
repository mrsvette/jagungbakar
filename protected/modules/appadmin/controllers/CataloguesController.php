<?php

class CataloguesController extends EController
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
				'actions'=>array('create','approval'),
				'expression'=>'Rbac::ruleAccess(\'create_p\')',
			),
			array('allow',
				'actions'=>array('view','download','detail'),
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
		$model=new Catalogue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Catalogue']))
		{
			$model->attributes=$_POST['Catalogue'];
			$pecah=explode(" ", strtolower($model->name));
			$model->key=implode("_",$pecah);
			$model->date_entry=date(c);
			$model->user_entry=Yii::app()->user->id;
			$image=CUploadedFile::getInstance($model,'src');
			$file=CUploadedFile::getInstance($model,'file');
			if(!empty($image)){
				//$model->src=uniqid().'.'.$file->getExtensionName();
				$path = 'uploads/catalogues/';
				$model->src=$path.$image->name;
				if($image->saveAs($model->src)){ //upload image
					if($model->save()){
						if($file->saveAs($path.$file->name)){
							$model2=new File;
							$model2->file_name=$file->name;
							$model2->file_ext=$file->getExtensionName();
							$model2->file_storage=$path;
							$model2->file_size=$file->size;
							$model2->date_entry=date(c);
							$model2->user_entry=Yii::app()->user->id;
							if($model2->save()){
								$model->file_id=$model2->id;
								$model->update('file_id');
							}
						}
						$this->redirect(array('view'));
					}
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
		$default_src=$model->src;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Catalogue']))
		{
			$model->attributes=$_POST['Catalogue'];
			$pecah=explode(" ", strtolower($model->name));
			$model->key=implode("_",$pecah);
			$model->date_update=date(c);
			$model->user_update=Yii::app()->user->id;
			$image=CUploadedFile::getInstance($model,'src');
			$file=CUploadedFile::getInstance($model,'file');
			if(!empty($image)){
				$path = 'uploads/catalogues/';
				$model->src=$path.$image->name;
				if($image->saveAs($model->src)){ //upload image
					if($model->save()){
						if($file->saveAs($path.$file->name)){
							$model2=new File;
							$model2->file_name=$file->name;
							$model2->file_ext=$file->getExtensionName();
							$model2->file_storage=$path;
							$model2->file_size=$file->size;
							$model2->date_entry=date(c);
							$model2->user_entry=Yii::app()->user->id;
							if($model2->save()){
								$model->file_id=$model2->id;
								$model->update('file_id');
							}
						}
						$this->redirect(array('view'));
					}
				}
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
			$file=$model->file_rel;
			$filename=$model->src;
			if($model->delete()){
				if(file_exists($filename))
					unlink($filename);
				if(file_exists($file->file_storage.$file->file_name)){
					unlink($file->file_storage.$file->file_name);
					$file->delete();
				}
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
		$model=new Catalogue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Catalogue']))
			$model->attributes=$_GET['Catalogue'];

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionDownload()
	{
		$model=new Download('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Download']))
			$model->attributes=$_GET['Download'];

		$this->render('download',array(
			'model'=>$model,
		));
	}

	public function actionDetail($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=Download::model()->findByPk($id);
			echo CJSON::encode( array(
				'status'=>'success',
				'div' => $this->renderPartial('_detail',array('model'=>$model),true,true),
			));
			exit;
		}
	}

	public function actionApproval()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=Download::model()->findByPk($_POST['id']);
			$model->approved=$_POST['value'];
			if($model->update('approved')){
				if($model->approved>0){
					$data=array(
						'template'=>'email_download_user',
						'subject'=>'[Java Connection] Download Catalogue',
						'mail_from'=>Yii::app()->config->get('admin_email'),
						'from_name'=>Yii::app()->config->get('site_name'),
						'mail_to'=>Yii::app()->config->get('admin_email'),
						'to_name'=>Yii::app()->config->get('site_name'),
						'variable'=>array(
								'{-name-}'=>$model->name,
								'{-email-}'=>$model->email,
								'{-link-}'=>Catalogue::getDownloadLink($model->catalogue_id),
							)
					);
					$this->sendMail($data);
				}
				echo CJSON::encode( array(
					'status'=>'success',
				));
				exit;
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Catalogue::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	private function sendMail($data){
		$template_email =  Yii::app()->file->set('emails/'.$data['template'].'.html', true);
		$user_email = $template_email->contents;
			
		$user_email = FPMail::addHF($user_email);
		$vari = array(
					'{-tanggal-}'=>date(Yii::app()->params['emailTime']),
					'{-sitename-}'=>Yii::app()->config->get('site_name'),
					'{-logo-}'=>Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/uploads/images/'.Yii::app()->config->get('logo'),
					'{-support-}'=>Yii::app()->config->get('admin_email'),
					'{-copyright-}'=>'Copyright &copy; '.date(Y).' '.Yii::app()->config->get('site_name').'. All rights reserved.'
		);	
		$vari = $vari+$data['variable'];
		// just send to user	
		$user_email = str_replace(array_keys($vari), array_values($vari), $user_email);
		
		$email = Yii::app()->bbmail;
		$email->setSubject($data['subject']);
		$email->setBodyHtml($user_email);
		$email->setFrom($data['mail_from'], $data['from_name']);
		$email->addTo($data['mail_to'], $data['to_name']);
        
		$email->send('sendmail', array('mailer'=>'sendmail'));
		return true;
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
