<?php
/* @var $this UserBalancesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Balances',
);

$this->menu=array(
	array('label'=>'Create UserBalances', 'url'=>array('create')),
	array('label'=>'Manage UserBalances', 'url'=>array('admin')),
);
?>

<h1>User Balances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
