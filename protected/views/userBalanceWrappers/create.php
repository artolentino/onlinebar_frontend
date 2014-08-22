<?php
/* @var $this UserBalanceWrappersController */
/* @var $model UserBalanceWrappers */

$this->breadcrumbs=array(
	'User Balance Wrappers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserBalanceWrappers', 'url'=>array('index')),
	array('label'=>'Manage UserBalanceWrappers', 'url'=>array('admin')),
);
?>

<h1>Create UserBalanceWrappers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>