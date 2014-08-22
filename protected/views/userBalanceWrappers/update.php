<?php
/* @var $this UserBalanceWrappersController */
/* @var $model UserBalanceWrappers */

$this->breadcrumbs=array(
	'User Balance Wrappers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserBalanceWrappers', 'url'=>array('index')),
	array('label'=>'Create UserBalanceWrappers', 'url'=>array('create')),
	array('label'=>'View UserBalanceWrappers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserBalanceWrappers', 'url'=>array('admin')),
);
?>

<h1>Update UserBalanceWrappers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>