<?php
/* @var $this UserWatchedVideoController */
/* @var $model UserWatchedVideo */

$this->breadcrumbs=array(
	'User Watched Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserWatchedVideo', 'url'=>array('index')),
	array('label'=>'Manage UserWatchedVideo', 'url'=>array('admin')),
);
?>

<h1>Create UserWatchedVideo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>