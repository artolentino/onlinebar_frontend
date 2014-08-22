<?php
/* @var $this UserBalancesController */
/* @var $model UserBalances */

$this->breadcrumbs=array(
	'User Balances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserBalances', 'url'=>array('index')),
	array('label'=>'Create UserBalances', 'url'=>array('create')),
	array('label'=>'Update UserBalances', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserBalances', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserBalances', 'url'=>array('admin')),
);
?>

<h1>View UserBalances #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_id',
		'balance',
		'user_id',
		'expiration',
		'created_at',
		'updated_at',
		'create_user_id',
		'update_user_id',
		'prepaid_id',
	),
)); ?>
