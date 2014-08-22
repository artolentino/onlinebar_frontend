<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change Password"),
);
?>



<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Password Recovery</h3>
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
              <h3 class="first-child">Password Recovery</h3>
              <hr>
               <?php echo CHtml::beginForm(); ?>

					<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
					<?php echo CHtml::errorSummary($form); ?>
					
					
					<?php echo CHtml::activeLabelEx($form,'password'); ?>
					<?php echo CHtml::activePasswordField($form,'password', array('class' => 'form-control','placeholder'=>'Enter Password')); ?>
					<p class="hint">
					<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
					</p>
					
					
					
					<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
					<?php echo CHtml::activePasswordField($form,'verifyPassword', array('class' => 'form-control','placeholder'=>'Verify Password')); ?>
					
					
					<br>
					
					<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-color')); ?>
					

				<?php echo CHtml::endForm(); ?>
</div><!-- form -->
    </div>
</div>

               
              </div> <!-- / .pwd-lost -->
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->