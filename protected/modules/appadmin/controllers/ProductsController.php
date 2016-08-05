<?php

class ProductsController extends EController
{
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
				'actions'=>array('create','createItems','addPriceForm','createPriceItems','addFacilityForm','createFacilityItems','createImage','createAvailableItems','addAvailableForm','insertHelper'),
				'expression'=>'Rbac::ruleAccess(\'create_p\')',
			),
			array('allow',
				'actions'=>array('admin','view','items'),
				'expression'=>'Rbac::ruleAccess(\'read_p\')',
			),
			array('allow',
				'actions'=>array('update','updateItems','updateImageType'),
				'expression'=>'Rbac::ruleAccess(\'update_p\')',
			),
			array('allow',
				'actions'=>array('delete','deleteItems','deletePrice','deleteFacility','deleteImage','deleteImage2','deleteAvailable'),
				'expression'=>'Rbac::ruleAccess(\'delete_p\')',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionAdmin()
	{
		$criteria=new CDbCriteria;
		$criteria->order='type ASC';
		$dataProvider=new CActiveDataProvider('Product',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>20)));

		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionView($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('product_id',$id);
		$dataProvider=new CActiveDataProvider('ProductItems',array('criteria'=>$criteria));

		$this->render('view',array(
			'dataProvider'=>$dataProvider,
			'model'=>$this->loadModel($id),
			'model2'=>new ProductItems,
		));
	}

	public function actionItems($id)
	{
		$model=ProductItems::model()->findByPk($id);
		$prices=new ProductPrices;
		$facilities=new ProductFasilities;

		$criteria=new CDbCriteria;
		$criteria->compare('product_item_id',$id);
		$imageProvider=new CActiveDataProvider('ProductImages',array('criteria'=>$criteria));

		$criteria2=new CDbCriteria;
		$criteria2->compare('parent_id',$id);
		$subItemsProvider=new CActiveDataProvider('ProductItems',array('criteria'=>$criteria2));

		$model2=new ProductItems;

		$this->render('items',array(
			'model'=>$model,
			'prices'=>$prices,
			'facilities'=>$facilities,
			'imageProvider'=>$imageProvider,
			'subItemsProvider'=>$subItemsProvider,
			'model2'=>$model2,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=new Product;
			$model->attributes=$_POST['Product'];
			$model->date_entry=date(c);
			$model->user_entry=Yii::app()->user->id;
			if($model->save()){
				echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
				));
			}else{
				echo CJSON::encode(array(
					'status'=>'failed',
					'div'=>$this->renderPartial('_form_product',array('model'=>$model),true,true),
				));
			}
			exit;
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=$this->loadModel($id);
			$model->attributes=$_POST['Product'];
			$model->date_update=date(c);
			$model->user_update=Yii::app()->user->id;
			if($model->save()){
				echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
				));
			}else{
				echo CJSON::encode(array(
					'status'=>'failed',
					'div'=>$this->renderPartial('_form_product',array('model'=>$model),true,true),
				));
			}
			exit;
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			//$del1=ProductItems::model()->deleteAllByAttributes(array('product_id'=>$id));
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionCreateItems()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=new ProductItems;
			$model->attributes=$_POST['ProductItems'];
			if(!empty($model->parent_id)){
				$model->level=ProductItems::model()->findByPk($model->parent_id)->level+1;
			}
			$model->date_entry=date(c);
			$model->user_entry=Yii::app()->user->id;
			if($model->save()){
				echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
				));
			}else{
				echo CJSON::encode(array(
					'status'=>'failed',
					'div'=>$this->renderPartial('_form_item',array('model'=>$model),true,true),
				));
			}
			exit;
		}
	}

	public function actionUpdateItems($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=ProductItems::model()->findByPk($id);
			$model->attributes=$_POST['ProductItems'];
			$model->date_update=date(c);
			$model->user_update=Yii::app()->user->id;
			if($model->save()){
				echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
				));
			}else{
				echo CJSON::encode(array(
					'status'=>'failed',
					'div'=>$this->renderPartial('_form_item',array('model'=>$model),true,true),
				));
			}
			exit;
		}
	}

	public function actionDeleteItems($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=ProductItems::model()->findByPk($id);
			$del1=ProductFasilities::model()->deleteAllByAttributes(array('product_item_id'=>$id));
			$del2=ProductOrders::model()->deleteAllByAttributes(array('product_item_id'=>$id));
			$del3=ProductPrices::model()->deleteAllByAttributes(array('product_item_id'=>$id));
			if($model->image_count>0){
				foreach($model->image_rel as $model2){
					if(!empty($model2->image)){
						if(file_exists($model2->src.$model2->image)){
							if(unlink($model2->src.$model2->image)){
								if(file_exists($model2->thumb.$model2->image))
									unlink($model2->thumb.$model2->image);
								$model2->delete();
							}
						}
					}
				}
			}
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionCreatePriceItems($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			foreach($_POST['ProductPrices']['name'] as $index=>$data){
				$model=new ProductPrices;
				$model->product_item_id=$id;
				$model->name=$_POST['ProductPrices']['name'][$index];
				$model->period=$_POST['ProductPrices']['period'][$index];
				$model->price=$this->money_unformat($_POST['ProductPrices']['price'][$index]);
				if(!$model->alreadySaved()){
					$model->save();
				}else{
					$criteria=new CDbCriteria;
					$criteria->compare('product_item_id',$id);
					$criteria->compare('name',$_POST['ProductPrices']['name'][$index]);
					$model2=ProductPrices::model()->find($criteria);
					$model2->period=$_POST['ProductPrices']['period'][$index];
					$model2->price=$_POST['ProductPrices']['price'][$index];
					$model2->update(array('period','price'));
				}
			}
			
			echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
			));
			exit;
		}
	}

	public function actionAddPriceForm()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=new ProductPrices;
			echo CJSON::encode(array(
				'status'=>'success',
				'div'=>$this->renderPartial('__price_item',array('model'=>$model),true,true),
			));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeletePrice()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$criteria=new CDbCriteria;
			$criteria->compare('product_item_id',$_POST['product_item_id']);
			$criteria->compare('name',$_POST['name']);
			$criteria->compare('period',$_POST['period']);
			$criteria->compare('price',$_POST['price']);
			$model=ProductPrices::model()->find($criteria);
			if(!empty($model))
				$model->delete();
			echo CJSON::encode(array(
				'status'=>'success',
			));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionAddFacilityForm()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=new ProductFasilities;
			echo CJSON::encode(array(
				'status'=>'success',
				'div'=>$this->renderPartial('__facility_item',array('model'=>$model),true,true),
			));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionCreateFacilityItems($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			foreach($_POST['ProductFasilities']['name'] as $index=>$data){
				$model=new ProductFasilities;
				$model->product_item_id=$id;
				$model->name=$_POST['ProductFasilities']['name'][$index];
				$model->description=$_POST['ProductFasilities']['description'][$index];
				if(!$model->alreadySaved()){
					$model->save();
				}else{
					$criteria=new CDbCriteria;
					$criteria->compare('product_item_id',$id);
					$criteria->compare('name',$_POST['ProductFasilities']['name'][$index]);
					$model2=ProductFasilities::model()->find($criteria);
					$model2->description=$_POST['ProductFasilities']['description'][$index];
					$model2->update(array('description'));
				}
			}
			
			echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
			));
			exit;
		}
	}

	public function actionDeleteFacility()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$criteria=new CDbCriteria;
			$criteria->compare('product_item_id',$_POST['product_item_id']);
			$criteria->compare('name',$_POST['name']);
			$model=ProductFasilities::model()->find($criteria);
			if(!empty($model))
				$model->delete();
			echo CJSON::encode(array(
				'status'=>'success',
			));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionCreateImage($id)
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
	        
        $folder='uploads/images/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","png");
        $sizeLimit = Yii::app()->params['sizeLimit'];// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);

		//create thumb
		$thumb=Yii::app()->phpThumb->create($folder.$result['filename']);
		$thumb->resize(250,250);
		$thumb->save('uploads/_thumbs/Images/'.$result['filename']);

		$model=new ProductImages;
		$model->product_item_id=$id;
		$model->image=$result['filename'];
		$model->thumb='uploads/_thumbs/Images/';
		$model->src=$folder;
		$model->date_entry=date(c);
		$model->user_entry=Yii::app()->user->id;
		if($model->save()){
		    $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		  	echo $result;// it's array
		}
	}

	public function actionDeleteImage()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=ProductImages::model()->findByPk($_POST['id']);
			if(!empty($model->image)){
				$criteria=new CDbCriteria;
				$criteria->compare('image',$model->image);
				$count=ProductImages::model()->count($criteria);
				if($count<=1){
					if(file_exists($model->src.$model->image)){
						if(unlink($model->src.$model->image)){
							if(file_exists($model->thumb.$model->image))
								unlink($model->thumb.$model->image);
							$model->delete();
						}
					}
				}else
					$model->delete();
			}
			echo CJSON::encode(array('status'=>'success'));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteImage2($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=ProductImages::model()->findByPk($id);
			if(!empty($model->image)){
				$criteria=new CDbCriteria;
				$criteria->compare('image',$model->image);
				$count=ProductImages::model()->count($criteria);
				if($count<=1){
					if(file_exists($model->src.$model->image)){
						if(unlink($model->src.$model->image)){
							if(file_exists($model->thumb.$model->image))
								unlink($model->thumb.$model->image);
							$model->delete();
						}
					}
				}else
					$model->delete();
			}
			echo CJSON::encode(array('status'=>'success'));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionUpdateImageType()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=ProductImages::model()->findByPk($_POST['id']);
			if(!empty($_POST['value'])){
				$model->type=$_POST['value'];
				$model->update('type');
			}
			echo CJSON::encode(array('status'=>'success'));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionCreateAvailableItems($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			foreach($_POST['ProductAvailability']['name'] as $index=>$data){
				$model=new ProductAvailability;
				$model->product_item_id=$id;
				$model->name=$_POST['ProductAvailability']['name'][$index];
				$model->description=$_POST['ProductAvailability']['description'][$index];
				$model->status=$_POST['ProductAvailability']['status'][$index];
				if(!$model->alreadySaved()){
					$model->save();
				}else{
					$criteria=new CDbCriteria;
					$criteria->compare('product_item_id',$id);
					$criteria->compare('name',$_POST['ProductAvailability']['name'][$index]);
					$model2=ProductAvailability::model()->find($criteria);
					$model2->description=$_POST['ProductAvailability']['description'][$index];
					$model2->status=$_POST['ProductAvailability']['status'][$index];
					$model2->update(array('description','status'));
				}
			}
			
			echo CJSON::encode(array(
					'status'=>'success',
					'div'=>'Data berhasil disimpan',
			));
			exit;
		}
	}

	public function actionAddAvailableForm()
	{
		if(Yii::app()->request->isPostRequest)
		{
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			$model=new ProductAvailability;
			echo CJSON::encode(array(
				'status'=>'success',
				'div'=>$this->renderPartial('__available_item',array('model'=>$model),true,true),
			));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionDeleteAvailable()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$criteria=new CDbCriteria;
			$criteria->compare('product_item_id',$_POST['product_item_id']);
			$criteria->compare('name',$_POST['name']);
			$criteria->compare('status',$_POST['status']);
			$model=ProductAvailability::model()->find($criteria);
			if(!empty($model))
				$model->delete();
			echo CJSON::encode(array(
				'status'=>'success',
			));
			exit;
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionInsertHelper()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('type','<3');
		$models=Product::model()->findAll($criteria);
		$items=array();
		foreach($models as $model){
			$del1=ProductItems::model()->deleteAllByAttributes(array('product_id'=>$model->id));
			$pitems=array('Type Studio 21.56 M','Type Studio Deluxe 25.38 M','1 Bedroom 41.85 M (Semi Gross)','2 Bedroom 56.08 M (Semi Gross)');
			foreach($pitems as $i=>$name){
				$model2=new ProductItems;
				$model2->product_id=$model->id;
				$model2->name=$name;
				$model2->date_entry=date(c);
				$model2->user_entry=Yii::app()->user->id;
				if($model2->save()){
					//product fasilities
					$del2=ProductFasilities::model()->deleteAllByAttributes(array('product_item_id'=>$model2->id));
					$pfasilities=array(
						'Kusen + Pintu Teras : Alumunium + Kaca 6mm','Type Studio Deluxe 25.38 M',
						'1 Bedroom 41.85 M (Semi Gross)','2 Bedroom 56.08 M (Semi Gross)',
						'Unit Lift Penumpang : 2 Unit',
						'Lift Service : i Unit (bed size)',
						'Sanitari : Toto',
						'Pintu Utama : Enginering WoodE',
						'Listrik : 1300 WATT'
					);
					foreach($pfasilities as $j=>$pfasility){
						$model3=new ProductFasilities;
						$model3->product_item_id=$model2->id;
						$model3->name=$pfasility;
						$model3->save();
					}
					//product images
					$del3=ProductImages::model()->deleteAllByAttributes(array('product_item_id'=>$model2->id));
					$images=array(
						Post::createSlug($name).'.jpg',
						Post::createSlug($model->name).'.jpg',
						'rooms-'.Post::createSlug($name).'.jpg'
					);
					foreach($images as $k=>$image){
						$model4=new ProductImages;
						$model4->product_item_id=$model2->id;
						$model4->image=$image;
						$model4->thumb='uploads/_thumbs/Images/';
						$model4->src='uploads/images/';
						$model4->type=$k+1;
						$model4->date_entry=date(c);
						$model4->user_entry=Yii::app()->user->id;
						$model4->save();
					}
					//product availibility
					$del4=ProductAvailability::model()->deleteAllByAttributes(array('product_item_id'=>$model2->id));
					for($i=1; $i<=36; $i++){
						$model5=new ProductAvailability;
						$model5->product_item_id=$model2->id;
						$model5->name=$i;
						$model5->description='Kamar '.$i;
						$model5->status=1;
						$model5->save();
					}
				}
			}
			$items[]=$model->name;
		}
		var_dump($items);exit;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel($id)
	{
		if($this->_model===null)
		{
			$this->_model=Product::model()->findByPk($id);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
