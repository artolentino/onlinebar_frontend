<?php

Yii::import('application.vendor.vimeo.*');
require_once('vimeo.php');

class VideosController extends Controller
{
    
    public $Videos;
    public $ProgramCategory;
    public $Lecturers;

    private $_model;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
               
	{
		    $Videos=$this->loadModel();
		    //$comment=$this->newComment($Videos);
   
            $Lecturers = Lecturers::model()->findAll();


			$this->render('view',array(
				'model'=>$Videos,
				//'model'=>$this->loadModel($id),
				//'comment'=>$comment,
				'Lecturers'=>$Lecturers,		                       
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Videos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
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

		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		       $OurLecturers = Lecturers::model()->findAll();

	       	
               if(!empty($_GET['id']) && !empty($_GET['keyword']))

               {
                   
                    
		       		$videoCriteria = new CDbCriteria();
		       		$videoCriteria->select = "*";
		       		$videoCriteria->condition = "category_id = :id AND name LIKE :name";
		       		$videoCriteria->order = "name ASC";
		       		$videoCriteria->params = array(':id'=>$_GET['id'],':name'=>'%'. $_GET['keyword'] . '%');

		       		$item_count = Videos::model()->count($videoCriteria);
		       		$pages = new CPagination($item_count);
		            $pages->setPageSize(Yii::app()->params['listPerPage']);
		            $pages->applyLimit($videoCriteria);  // the trick is here!

		            $ProgramCategory = Programs::model()->findByPk($_GET['id']);
		           
                    
                    $this->render('index',array(
                        //'model'=> Videos::model()->search(),
			            'model'=> Videos::model()->findAll($videoCriteria),
                        'ProgramCategory'=>$ProgramCategory,
                         'OurLecturers'=>$OurLecturers,
                        'item_count'=>$item_count,
                        'page_size'=>Yii::app()->params['listPerPage'],
                        'pages'=>$pages,
		));


               }else if(!empty($_GET['id']) && empty($_GET['keyword']))

               {

                     $videoCriteria = new CDbCriteria();
		       		 $videoCriteria->select = "*";
		       		 $videoCriteria->condition = "category_id = :id";
		       		 $videoCriteria->order = "name ASC";
		       		 $videoCriteria->params = array(':id'=>$_GET['id']);

		       		 

		       		 $item_count = Videos::model()->count($videoCriteria);
		       		 $pages = new CPagination($item_count);
		             $pages->setPageSize(Yii::app()->params['listPerPage']);
		             $pages->applyLimit($videoCriteria);  // the trick is here!

		             $ProgramCategory = Programs::model()->findByPk($_GET['id']);
                     
                     $this->render('index',array(
                        //'model'=> Videos::model()->search(),
			            'model'=> Videos::model()->findAll($videoCriteria),
                        'ProgramCategory'=>$ProgramCategory,
                         'OurLecturers'=>$OurLecturers,
                        'item_count'=>$item_count,
                        'page_size'=>Yii::app()->params['listPerPage'],
                        'pages'=>$pages,
		));
		            

               } else if(!empty($_GET['keyword']) && empty($_GET['id']))

                   {
                     $videoCriteria = new CDbCriteria();
		       		 $videoCriteria->select = "*";
		       		 $videoCriteria->condition = "name LIKE :name";
		       		 $videoCriteria->order = "name ASC";
		       		 $videoCriteria->params = array(':name'=>'%'.$_GET['keyword']. '%');

		       		 $item_count = Videos::model()->count($videoCriteria);
		       		 $pages = new CPagination($item_count);
		             $pages->setPageSize(Yii::app()->params['listPerPage']);
		             $pages->applyLimit($videoCriteria);  // the trick is here!

		             $ProgramCategory = Programs::model()->findAll();

		            $this->render('index',array(
                        //'model'=> Videos::model()->search(),
			            'model'=> Videos::model()->findAll($videoCriteria),
                        'OurLecturers'=>$OurLecturers,
                        'ProgramCategory'=>$ProgramCategory,
                        'item_count'=>$item_count,
                        'page_size'=>Yii::app()->params['listPerPage'],
                        'pages'=>$pages,
		));

                   }else {

               	    $ProgramCategory = Programs::model()->findAll(); 
			        $videoCriteria = new CDbCriteria();
			        $videoCriteria->order = 'name ASC';
			   
			        $item_count = Videos::model()->count($videoCriteria);
			        $pages = new CPagination($item_count);
			        $pages->setPageSize(Yii::app()->params['listPerPage']);
			        $pages->applyLimit($videoCriteria);  // the trick is here!

			        $this->render('index',array(
                        //'model'=> Videos::model()->search(),
			            'model'=> Videos::model()->findAll($videoCriteria),
                        'OurLecturers'=>$OurLecturers,
                        'ProgramCategory'=>$ProgramCategory,
                        'item_count'=>$item_count,
                        'page_size'=>Yii::app()->params['listPerPage'],
                        'pages'=>$pages,
		));
               
                 }

		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Videos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Videos']))
			$model->attributes=$_GET['Videos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionReload()
	{

      

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Videos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{


		 if($this->_model===null)
		{

			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.Videos::STATUS_PUBLISHED.' OR status='.Videos::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Videos::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.'. $_GET['id']);
		}
		return $this->_model;
		// $model=Videos::model()->findByPk($id);
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		// return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Videos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='videos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($Videos)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($Videos->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}

}
