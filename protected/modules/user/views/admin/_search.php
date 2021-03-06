<div class="row-fluid">
<?php    
    /** @var TbActiveForm $form */
$form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm', array(
        'id' => 'verticalForm',
        'htmlOptions' => array('class' => 'well'), // for inset effect
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            )
);
?>
        <div class="row">
        <?php echo $form->label($model,'User ID'); ?>
        <?php echo $form->textField($model,'id'); ?>
         </div>
         <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
        </div>
        <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
        </div>

         <div class="row">
        <?php echo $form->label($model,'activkey'); ?>
        <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>
        </div>

        <div class="row">
        <?php echo $form->label($model,'create_at'); ?>
        <?php echo $form->textField($model,'create_at'); ?>
        </div>

        <div class="row">
        <?php echo $form->label($model,'lastvisit_at'); ?>
        <?php echo $form->textField($model,'lastvisit_at'); ?>
        </div>

        <div class="row">
        <?php echo $form->label($model,'superuser'); ?>
        <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus')); ?>
        </div>

        <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus')); ?>
        </div>
   
<?php $this->endWidget(); ?>

</div><!-- search-form -->