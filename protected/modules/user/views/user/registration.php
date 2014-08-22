<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Sign Up</h3>
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
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="sign-form">
              <h3 class="first-child">Create New Account</h3>
              <hr>

              <?php if(Yii::app()->user->hasFlash('registration')): ?>
						<div class="success">
						<?php echo Yii::app()->user->getFlash('registration'); ?>
						</div>
						<?php else: ?>
						        

					
						<?php $form=$this->beginWidget('UActiveForm', array(
							'id'=>'registration-form',
							'enableAjaxValidation'=>true,
							'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							'htmlOptions' => array('role' =>'form', 'enctype'=>'multipart/form-data'),
						)); ?>

							<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
							
						<?php echo $form->errorSummary(array($model,$profile)); ?>
	                   <div class="form-group">
		                        <?php echo $form->labelEx($model,'username'); ?>
								<?php echo $form->textField($model,'username',array('class' => 'form-control','placeholder' => 'Desired Username')); ?>
								<?php echo $form->error($model,'username'); ?>
					    </div>

					    <div class="form-group">
					    		<?php echo $form->labelEx($model,'password'); ?>
								<?php echo $form->passwordField($model,'password',array('class' => 'form-control','placeholder' => 'Desired Password')); ?>
								<?php echo $form->error($model,'password'); ?>
								<p class="hint">
								<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
								</p>
					    </div>	
					    <div class="form-group">		
               
		                        <?php echo $form->labelEx($model,'verifyPassword'); ?>
								<?php echo $form->passwordField($model,'verifyPassword',array('class' => 'form-control','placeholder' => 'Repeat Password')); ?>
								<?php echo $form->error($model,'verifyPassword'); ?>
                         </div>
                            <div class="form-group">

		                         <?php echo $form->labelEx($model,'email'); ?>
								 <?php echo $form->textField($model,'email',array('class' => 'form-control','placeholder' => 'Email account to use')); ?>
								 <?php echo $form->error($model,'email'); ?>

						</div>


						<?php 
								$profileFields=$profile->getFields();
								if ($profileFields) {
									foreach($profileFields as $field) {
										echo '<div class="form-group">';
									?>
							
								<?php echo $form->labelEx($profile,$field->varname); ?>
								<?php 
								if ($widgetEdit = $field->widgetEdit($profile)) {
									echo $widgetEdit;
								} elseif ($field->range) {
									echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
								} elseif ($field->field_type=="TEXT") {
									echo$form->textArea($profile,$field->varname,array('class' => 'form-control'));
								} else {
									echo $form->textField($profile,$field->varname,array('class' => 'form-control'));
								}
								 ?>
								<?php echo $form->error($profile,$field->varname); ?>
								
									<?php
									echo '</div>';
									}
								}
						?>

						<?php if (UserModule::doCaptcha('registration')): ?>
	
								<?php echo $form->labelEx($model,'verifyCode'); ?>
								
								<?php $this->widget('CCaptcha'); ?>
								<?php echo $form->textField($model,'verifyCode',array('class' => 'form-control')); ?>
								<?php echo $form->error($model,'verifyCode'); ?>
								
								<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
								<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	
	<?php endif; ?>
                
                <div class="form-group">
                <?php echo CHtml::submitButton(UserModule::t("Register"),array('class'=>'btn btn-color')); ?>
                </div>
            
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
 <?php $this->endWidget(); ?>
<?php endif; ?>