<?php
/* @var $this UserBalanceWrappersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Balance Wrappers',
);

$this->menu=array(
	array('label'=>'Create UserBalanceWrappers', 'url'=>array('create')),
	array('label'=>'Manage UserBalanceWrappers', 'url'=>array('admin')),
);
?>

<h1>User Balance Wrappers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
