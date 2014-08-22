<?php
/* @var $this EmailSubscriptionsController */
/* @var $model EmailSubscriptions */

$this->breadcrumbs=array(
	'Email Subscriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmailSubscriptions', 'url'=>array('index')),
	array('label'=>'Create EmailSubscriptions', 'url'=>array('create')),
	array('label'=>'View EmailSubscriptions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmailSubscriptions', 'url'=>array('admin')),
);
?>

<h1>Update EmailSubscriptions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>