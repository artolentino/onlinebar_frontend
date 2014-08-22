<?php
/* @var $this EmailSubscriptionsController */
/* @var $model EmailSubscriptions */

$this->breadcrumbs=array(
	'Email Subscriptions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmailSubscriptions', 'url'=>array('index')),
	array('label'=>'Create EmailSubscriptions', 'url'=>array('create')),
	array('label'=>'Update EmailSubscriptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailSubscriptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailSubscriptions', 'url'=>array('admin')),
);
?>

<h1>View EmailSubscriptions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'created_at',
		'updated_at',
		'create_user_id',
		'update_user_id',
	),
)); ?>
