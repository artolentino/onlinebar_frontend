<?php
/* @var $this UserBalancesController */
/* @var $model UserBalances */

$this->breadcrumbs=array(
	'User Balances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserBalances', 'url'=>array('index')),
	array('label'=>'Manage UserBalances', 'url'=>array('admin')),
);
?>

<h1>Create UserBalances</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>