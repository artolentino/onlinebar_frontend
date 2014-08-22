<div class="form">

<?php
if(isset($action) && $action !== null) 
	$form=$this->beginWidget('CActiveForm', array(
				'id'=>'customer-form',
				'action' => $action,
				'enableAjaxValidation'=>false,
				)); 
else
$form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'enableAjaxValidation'=>false,
			)); ?>
 <div class="col-sm-6 contact-us-p">
 <p>Please fill-in all the required fields in the form below. This will serve as you billing address for this transaction. </p>
<?php echo $form->errorSummary(array($customer, $address)); ?>

		<?php echo $form->hiddenField($customer, 'user_id', array('value'=> Yii::app()->user->id)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($address,'firstname'); ?>
		<?php echo $form->textField($address,'firstname',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'firstname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($address,'lastname'); ?>
		<?php echo $form->textField($address,'lastname',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'lastname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($customer,'email'); ?>
		<?php $customer->email = Yii::app()->user->email;?>
		<?php echo $form->textField($customer,'email',array('class'=>'form-control')); ?>
		<?php echo $form->error($customer,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($address,'street'); ?>
		<?php echo $form->textField($address,'street',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'street'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($address,'zipcode'); ?>
		<?php echo $form->textField($address,'zipcode',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'zipcode'); ?>
		</div>
	<div class="form-group">	
        <?php echo $form->labelEx($address,'city'); ?> 
		<?php echo $form->textField($address,'city',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'city'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($address,'country'); ?>
		<?php echo $form->textField($address,'country',array('class'=>'form-control')); ?>
		<?php echo $form->error($address,'country'); ?>
	</div>

	<div style="clear: both;"> </div>

	<div class="form-group">
	<?php echo CHtml::submitButton($customer->isNewRecord 
			? Yii::t('ShopModule.shop', 'Register') 
			: Yii::t('ShopModule.shop', 'Save')
			,array('id'=>'next','class' => 'btn btn-lg btn-color')
			); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
