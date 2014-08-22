<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
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
                     $name = $profile->firstname . ' ' . $profile->lastname;

                     // $filename = $this->createAbsoluteUrl($profile->ProfilePicture);
                     // print_r($filename . ' | ' . $profile->ProfilePicture);
                                   
                                    if(!empty($profile->ProfilePicture)) {
                                    
                                       $image = Yii::app()->BaseUrl . '/'. $profile->ProfilePicture;
                                    
                                    } else {
                                        $image = Yii::app()->theme->BaseUrl . '/img/default_profile.jpg';
                                    }
                     
                 ?>
                
                <?php
                     echo CHtml::link(
                     CHtml::image($image, CHtml::encode($name), array('style'=>'width:190px',)), array('view', 'id' => $model->id), array('class' => 'img-responsive center-block',
                     ));
                ?> 
              <p class="text-muted"><?php echo CHtml::encode($model->username); ?></p>
            </div>
            <ul class="nav nav-pills nav-stacked">
             <li><?php echo CHtml::link('My Profile',Yii::app()->getModule('user')->profileUrl,array('class' => 'bg-hover-color')); ?></li>
              <li class="active"><?php echo CHtml::link('Edit Profile',array('edit'),array('class' => 'bg-hover-color')); ?></li>
              <li><?php echo CHtml::link('Change Password',array('changepassword'),array('class' => 'bg-hover-color')); ?></li>
              <li><?php echo CHtml::link('Sign Out',Yii::app()->getModule('user')->logoutUrl,array('class' => 'bg-hover-color')); ?></li>
            </ul>
          </div>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-7">
              
                <h2 class="primary-font"><?php echo $fullName; ?></h2>
                
                <p><?php echo CHtml::encode($model->email); ?></p>
                
              </div>
              <div class="col-sm-5">
                <ul class="user-info">
                  <li>Status: <span class="text-muted"><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></span></li>
                  <li>Registration Date: <span class="text-muted"><?php echo $model->create_at; ?></span></li>
                    
                  <li>Last login: <span class="text-muted"><?php echo $model->lastvisit_at; ?></span></li>
                </ul>
               
              </div>
              <div class="col-sm-12 user-form user-cart">
                <hr class="arrow-down">
                <h3 class="primary-font">Edit your profile</h3>
                 
              
                
        <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'profile-form',
					'enableAjaxValidation'=>true,
					'htmlOptions' => array('enctype'=>'multipart/form-data'),
				    )); ?>


	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
              echo '<div class = "form-group">';

			?>
	
		<?php echo $form->labelEx($profile,$field->varname);
		
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('class'=>'form-control'));
		} else {
			echo $form->textField($profile,$field->varname,array('class'=>'form-control'));
		}
		echo $form->error($profile,$field->varname); ?>
		
			<?php
			echo '</div>';
			}
		}
?>
	     <div class = "form-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
		</div>
	    <div class = "form-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	    </div>
        <div class = "form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save Changes'),array('class' => 'btn btn-color btn')); ?>
	    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->


	
                
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

