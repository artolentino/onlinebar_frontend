<?php
/* @var $this UserBalanceWrappersController */
/* @var $model UserBalanceWrappers */

$this->breadcrumbs=array(
	'User Balance Wrappers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserBalanceWrappers', 'url'=>array('index')),
	array('label'=>'Create UserBalanceWrappers', 'url'=>array('create')),
	array('label'=>'Update UserBalanceWrappers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserBalanceWrappers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserBalanceWrappers', 'url'=>array('admin')),
);
?>

<h1>View UserBalanceWrappers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'user_balance_id',
		'subscription_id',
		'created_at',
		'updated_at',
		'create_user_id',
		'update_user_id',
		'account_id',
	),
)); ?>
