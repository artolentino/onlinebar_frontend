<?php
/* @var $this UserBalancesController */
/* @var $model UserBalances */

$this->breadcrumbs=array(
	'User Balances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserBalances', 'url'=>array('index')),
	array('label'=>'Create UserBalances', 'url'=>array('create')),
	array('label'=>'View UserBalances', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserBalances', 'url'=>array('admin')),
);
?>

<h1>Update UserBalances <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>