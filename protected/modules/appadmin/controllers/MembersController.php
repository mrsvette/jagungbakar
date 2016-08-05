<?php

class MembersController extends EController
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
				'actions'=>array('view','curriculumVitae','testimony'),
				'expression'=>'Rbac::ruleAccess(\'read_p\')',
			),
			array('allow',
				'actions'=>array('update','changeStatus','changeGroup'),
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
		$model=new Member;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			$model->status=1;
			$model->date_entry=date(c);
			$model->user_entry=0;
			if($model->save()){
				$model->mid=Member::generateId($model->id);
				$model->password=md5($model->password);
				$model->user_entry=$model->id;
				$model->update(array('password','user_entry','mid'));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Member']))
		{
			$model->attributes=$_POST['Member'];
			$model->birth_date=date("Y-m-d",strtotime($model->birth_date));
			$model->date_update=date(c);
			$model->user_update=Yii::app()->user->id;
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
		$model=new Member('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Member']))
			$model->attributes=$_GET['Member'];

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionChangeStatus()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=$this->loadModel($_POST['id']);
			$model->status=$_POST['status'];
			if($model->update('status')){
				echo CJSON::encode(array(
					'status'=>'success',
					'message'=>'Status for '.$model->first_name.' successfully update to '.Lookup::item('MemberStatus',$_POST['status']),
				));
			}
		}
	}

	public function actionChangeGroup()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=$this->loadModel($_POST['id']);
			$model->group_id=$_POST['group_id'];
			if($model->update('group_id')){
				echo CJSON::encode(array(
					'status'=>'success',
					'message'=>'Member type for '.$model->first_name.' successfully update to '.$model->group_rel->name,
				));
			}
		}
	}

	public function actionCurriculumVitae($id)
	{
		$model=$this->loadModel($id);
		$testimony=new Testimony;
		$criteria=new CDbCriteria;
		$criteria->compare('testimony_tomember_rel.member_id',$id);
		$criteria->with=array('testimony_tomember_rel');
		$criteria->together=true;

		$dataProvider=new CActiveDataProvider('Testimony',array('criteria'=>$criteria));

		$this->render('curriculum_vitae',array(
			'model'=>$model,
			'testimony'=>$testimony,
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionTestimony()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// Stop jQuery from re-initialization
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;

			$model=new Testimony;
			if(isset($_POST['Testimony'])){
				$model->attributes=$_POST['Testimony'];
				$model->status=1;
				$model->date_entry=date(c);
				$model->user_entry=Yii::app()->user->id;
				if($model->save()){
					$model2=new TestimonyToMember;
					$model2->testimony_id=$model->id;
					$model2->member_id=$_GET['mid'];
					if($model2->save()){
						echo CJSON::encode(array(
							'status'=>'success',
						));
						exit;
					}
				}else{
					echo CJSON::encode(array(
							'status'=>'failed',
						));
					exit;
				}
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
		$model=Member::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
