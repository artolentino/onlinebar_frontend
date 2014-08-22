<?php

class ProductsController extends Controller
{

	public $ProductCategory;
	public $_model;


	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update','view'),
				'users'=>array('@'),
			),
				array('allow',
					'actions'=>array('admin','delete','create','update', 'view'),
					'users' => array('admin'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}

	public function beforeAction($action) {
		$this->layout = '//layouts/column1';
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model=new Products;

		 $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);


			if($model->save())
				$this->redirect(array('shop/admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id, $return = null)
	{
		$model=$this->loadModel();

		$this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']);

			if($model->save())
				if($return == 'product')
					$this->redirect(array('products/update', 'id' => $model->product_id));
				else
					$this->redirect(array('products/admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
    
       if(!empty($_GET['id'])) 
       {
		

		 $productCriteria = new CDbCriteria();
		 $productCriteria->select = "*";
		 $productCriteria->condition = "category_id = :id";
		 $productCriteria->order = "title ASC";
         $productCriteria->params = array(':id'=>$_GET['id']);

         $item_count = Products::model()->count($productCriteria);

         $pages = new CPagination($item_count);
         $pages->PageSize = Yii::app()->params['listPerPage'];
         $pages->applyLimit($productCriteria);

         $model = Products::model()->findAll($productCriteria);

         //$dataProvider = new CActiveDataProvider('Products');
         $ProductCategory = Category::model()->findByPK($_GET['id']);

		 $this->render('index',array(
			          'ProductCategory'=>$ProductCategory, 
			          'item_count' =>$item_count,
			          'page_size'=>Yii::app()->params['listPerPage'],
			          'pages' => $pages, 
			          //'dataProvider'=>$dataProvider,
			          'model'=>$model,
                       
		));
	   }else{

         $productCriteria = new CDbCriteria();
		 $productCriteria->select = "*";
		 //$productCriteria->condition = "category_id = :id";
		 $productCriteria->order = "title ASC";
         //$productCriteria->params = array(':id'=>$_GET['id']);

         $item_count = Products::model()->count($productCriteria);

         $pages = new CPagination($item_count);
         $pages->PageSize = Yii::app()->params['listPerPage'];
         $pages->applyLimit($productCriteria);

         $model = Products::model()->findAll($productCriteria);

         $dataProvider = new CActiveDataProvider('Products');
         $ProductCategory = Category::model()->findAll();

		 $this->render('index',array(
			          'ProductCategory'=>$ProductCategory, 
			          'item_count' =>$item_count,
			          'page_size'=>Yii::app()->params['listPerPage'],
			          'pages' => $pages, 
			          'dataProvider'=>$dataProvider,
			          'model'=>$model,
                       
		));






	   }
	
		// $dataProvider = new CActiveDataProvider('Products');

		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Products::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
