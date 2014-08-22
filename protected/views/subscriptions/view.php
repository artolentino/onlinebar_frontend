<?php
/* @var $this SubscriptionsController */
/* @var $model Subscriptions */

$this->breadcrumbs=array(
	'Subscriptions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Subscriptions', 'url'=>array('index')),
	array('label'=>'Create Subscriptions', 'url'=>array('create')),
	array('label'=>'Update Subscriptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subscriptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subscriptions', 'url'=>array('admin')),
);
?>

<h1>View Subscriptions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'package_id',
		'subscription_no',
		'name',
		'street',
		'region_code',
		'province_code',
		'municity_code',
		'barangay_code',
		'bgy',
		'city',
		'zip_code',
		'contact',
		'authorized_person',
		'authorized_email',
		'created_at',
		'updated_at',
		'create_user_id',
		'update_user_id',
		'reseller_id',
	),
)); ?>
