<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);


?>
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
<div class="row">
  <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
           
  <!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Sign In</h3>
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
              <h3 class="first-child">Sign In To Your Account</h3>
              <hr>
              
            <p><?php echo UserModule::t('Please fill out the following form with your login credentials: Fields with <span class="required">*</span> are required.'); ?></p>
            
                <?php echo CHtml::errorSummary($model); ?>
                 <?php  
                   $form = $this->beginWidget('CActiveForm');
                 ?>

                    <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <?php  echo $form->textField($model, 'username', 
                                    array('class' => 'form-control', 'placeholder'=>'Username',));?>
                   </div>
                   <br>
                   
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                       <?php echo  $form->passwordField($model, 'password', array('class' => 'form-control','placeholder'=>'Password')); ?>
                  </div> 

                  <div class="checkbox"> Remember me             
                      <?php echo $form->checkbox($model, 'rememberMe',array('class'=>'checkbox'));?>
                  </div>
                
                      
                       <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-color')); ?>
                  <hr>
              <p>Not registered? <?php echo CHtml::link('Create an Account',Yii::app()->getModule('user')->registrationUrl); ?></p> 
              <div class="pwd-lost">
                Lost your password? <?php echo CHtml::link('Click here to recover',Yii::app()->getModule('user')->recoveryUrl); ?>
               

             
               
              </div> <!-- / .pwd-lost -->
               <?php $this->endWidget();
                      unset($form);
                ?>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
<?php
            $form = new CForm(array(
                'elements'=>array(
                    'username'=>array(
                        'type'=>'text',
                        'maxlength'=>32,
                    ),
                    'password'=>array(
                        'type'=>'password',
                        'maxlength'=>32,
                    ),
                    'rememberMe'=>array(
                        'type'=>'checkbox',
                    )
                ),

                'buttons'=>array(
                    'login'=>array(
                        'type'=>'submit',
                        'label'=>'Login',
                    ),
                ),
            ), $model);
            ?>