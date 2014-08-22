<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
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
              <h3 class="first-child">Restore your password</h3>
              <hr>
               <?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
                <div class="success">
                <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                </div>
                <?php else: ?>

          
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	    
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
		<?php echo CHtml::activeTextField($form,'login_or_email',array('class' => 'form-control','placeholder'=>'Username or Email')) ?>
		
	    <br>
	    <div class="input-group">
	
		<?php echo CHtml::submitButton(UserModule::t("Restore"),array('class'=>'btn btn-color')); ?>
	  </div>

<?php echo CHtml::endForm(); ?>
<?php endif; ?>
    </div>
</div>

               
              </div> <!-- / .pwd-lost -->
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->