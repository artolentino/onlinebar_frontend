<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout='//layouts/column1';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		$model = $this->loadUser();
	    $this->render('profile',array(
	    	'model'=>$model,
			'profile'=>$model->profile,
	    ));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		$model = $this->loadUser();
		$profile=$model->profile;
                
                UWprofilepic::handleProfilePic($model,$profile); 
		
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
                Yii::app()->user->updateSession();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} else $profile->validate();
		}

		$this->render('edit',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$usermodel = $this->loadUser();
		$model = new UserChangePassword;
		$profile=$usermodel->profile;
                
                UWprofilepic::handleProfilePic($usermodel,$profile); 
		
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					//validate user input
                                        if($model->validate()) {
                                        //generate new hash per new password
                                        $new_hash = Yii::app()->hasher->hashPassword($model->password);
                                        //generate new activation code
                                        $new_actikey = str_replace("/","_",Yii::app()->hasher->hashPassword(microtime().$model->password));
                                        //add into database (Hash)
                                        $command = Yii::app()->db->createCommand();
                                        $command->update('tbl_users', array(
                                        'password'=>$new_hash
                                        ), 'id=:id', array(':id'=>Yii::app()->user->id));
                                        //add into database (Activation Key)
                                        $command->update('tbl_users', array(
                                        'activkey'=>$new_actikey
                                        ), 'id=:id', array(':id'=>Yii::app()->user->id));
                                        Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
                                        $this->redirect(array("profile"));
                                            }
			}
			$this->render('changepassword',array('model'=>$model,'profile'=>$profile,'usermodel'=>$usermodel));
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}