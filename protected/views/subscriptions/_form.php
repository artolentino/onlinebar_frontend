<?php
/* @var $this SubscriptionsController */
/* @var $model Subscriptions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscriptions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->textField($model,'package_id'); ?>
		<?php echo $form->error($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscription_no'); ?>
		<?php echo $form->textField($model,'subscription_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subscription_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_code'); ?>
		<?php echo $form->textField($model,'region_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'region_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_code'); ?>
		<?php echo $form->textField($model,'province_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'province_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'municity_code'); ?>
		<?php echo $form->textField($model,'municity_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'municity_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'barangay_code'); ?>
		<?php echo $form->textField($model,'barangay_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'barangay_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bgy'); ?>
		<?php echo $form->textField($model,'bgy',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bgy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorized_person'); ?>
		<?php echo $form->textField($model,'authorized_person',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'authorized_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorized_email'); ?>
		<?php echo $form->textField($model,'authorized_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'authorized_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_user_id'); ?>
		<?php echo $form->textField($model,'create_user_id'); ?>
		<?php echo $form->error($model,'create_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_user_id'); ?>
		<?php echo $form->textField($model,'update_user_id'); ?>
		<?php echo $form->error($model,'update_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reseller_id'); ?>
		<?php echo $form->textField($model,'reseller_id'); ?>
		<?php echo $form->error($model,'reseller_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->