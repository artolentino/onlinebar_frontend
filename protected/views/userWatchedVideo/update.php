<?php
/* @var $this UserWatchedVideoController */
/* @var $model UserWatchedVideo */

$this->breadcrumbs=array(
	'User Watched Videos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserWatchedVideo', 'url'=>array('index')),
	array('label'=>'Create UserWatchedVideo', 'url'=>array('create')),
	array('label'=>'View UserWatchedVideo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserWatchedVideo', 'url'=>array('admin')),
);
?>

<h1>Update UserWatchedVideo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>