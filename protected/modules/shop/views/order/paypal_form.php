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
              <ol class="breadcrumb pull-right hidden-xs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Sign In</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
         
    
     

                        <?php $form=$this->beginWidget('CActiveForm'); ?>
                         
                            <?php echo $form->errorSummary($model); ?>

                                <h4> <?php echo Shop::t(
                                        'Please enter your Paypal account data to confirm the payment of your Order'); ?> </h4>

                                <p> <?php echo Shop::t('The order number that will be paid is: {order_id}', array(
                                            '{order_id}' => $model->order_id)); ?> </p>

                                <?php echo CHtml::hiddenField('order_id', $model->order_id); ?>
                            
                            <div class="row">
                                <?php echo $form->label($model,'email'); ?>
                                <?php echo $form->textField($model,'email') ?>
                                <?php echo $form->error($model,'email') ?>
                            </div>
                         
                            <div class="row submit">
                                <?php echo CHtml::submitButton(Shop::t('Pay by Paypal')); ?>
                            </div>
                         
                        <?php $this->endWidget(); ?>

        
         
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->


