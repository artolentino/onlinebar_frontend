<?php
/* @var $this EmailSubscriptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Email Subscriptions',
);

$this->menu=array(
	array('label'=>'Create EmailSubscriptions', 'url'=>array('create')),
	array('label'=>'Manage EmailSubscriptions', 'url'=>array('admin')),
);
?>

<h1>Email Subscriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
