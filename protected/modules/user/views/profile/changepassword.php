<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);

?>
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<?php $fullName = $profile->firstname . ' ' . $profile->lastname;?>
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Your Profile</h3>
            </div>
            <div class="col-sm-8">
              <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
                                'htmlOptions' => array('class' => 'breadcrumb pull-right hidden-xs')
                                
                              
                            ));
                            ?>
                    <!-- breadcrumbs -->
                        <?php endif ?>  
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-3">
          <div class="team-member user-avatar text-center">

            <?php
                     $name = $profile->firstname . ' ' . $profile->lastname;;

                      if(!empty($profile->ProfilePicture)) {
                                    
                                       $image = Yii::app()->BaseUrl . '/'. $profile->ProfilePicture;
                                    
                                    } else {
                                        $image = Yii::app()->theme->BaseUrl . '/img/default_profile.jpg';
                                    }
                     
                 ?>
                
                <?php
                     echo CHtml::link(
                     CHtml::image($image, CHtml::encode($name), array('style'=>'width:190px',)), '#', array('class' => 'img-responsive center-block',
                     ));
                ?> 
              <p class="text-muted"><?php echo CHtml::encode($usermodel->username); ?></p>
            </div>
            
            <ul class="nav nav-pills nav-stacked">
              <li><?php echo CHtml::link('My Profile',Yii::app()->getModule('user')->profileUrl,array('class' => 'bg-hover-color')); ?></li>
              <li><?php echo CHtml::link('Edit Profile',array('edit'),array('class' => 'bg-hover-color')); ?></li>
              <li  class="active"><?php echo CHtml::link('Change Password',array('changepassword'),array('class' => 'bg-hover-color')); ?></li>
              <li><?php echo CHtml::link('Sign Out',Yii::app()->getModule('user')->logoutUrl,array('class' => 'bg-hover-color')); ?></li>
            </ul>
          </div>
          <div class="col-sm-9">
            <div class="row">
             <div class="col-sm-7">
              
                <h2 class="primary-font"><?php echo $fullName; ?></h2>
                
                <p><?php echo CHtml::encode($usermodel->email); ?></p>
                
              </div>
              <div class="col-sm-5">
                <ul class="user-info">
                  <li>Status: <span class="text-muted"><?php echo CHtml::encode(User::itemAlias("UserStatus",$usermodel->status)); ?></span></li>
                  <li>Registration Date: <span class="text-muted"><?php echo $usermodel->create_at; ?></span></li>
                    
                  <li>Last login: <span class="text-muted"><?php echo $usermodel->lastvisit_at; ?></span></li>
                </ul>
               
              </div>
              <div class="col-sm-12 user-form user-cart">
                <hr class="arrow-down">
                <h3 class="primary-font">Change your password</h3>
                 
              
                
        <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'changepassword-form',
						'enableAjaxValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
							'htmlOptions' => array('role' => 'form'),
						),
					)); ?>
    
								<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
								<?php echo $form->errorSummary($model); ?>
								
								<div class = "form-group">
								<?php echo $form->labelEx($model,'oldPassword'); ?>
								<?php echo $form->passwordField($model,'oldPassword',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'oldPassword'); ?>
								
								
								<div class = "form-group">
								<?php echo $form->labelEx($model,'password'); ?>
								<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'password'); ?>
								</div>
								<p class="hint">
								<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
								</p>
								
								
								<div class = "form-group">
								<?php echo $form->labelEx($model,'verifyPassword'); ?>
								<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'verifyPassword'); ?>
								</div>
								
							    <div class = "form-group">
								<?php echo CHtml::submitButton(UserModule::t("Save"),array('class' => 'btn btn-color btn')); ?>
								</div>

							<?php $this->endWidget(); ?>

	
                
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

