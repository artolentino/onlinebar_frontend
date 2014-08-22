<?php
/* @var $this UserWatchedVideoController */
/* @var $model UserWatchedVideo */

$this->breadcrumbs=array(
	'User Watched Videos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserWatchedVideo', 'url'=>array('index')),
	array('label'=>'Create UserWatchedVideo', 'url'=>array('create')),
	array('label'=>'Update UserWatchedVideo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserWatchedVideo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserWatchedVideo', 'url'=>array('admin')),
);
?>

<h1>View UserWatchedVideo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'video_id',
		'date_watched',
		'account_id',
		'length_watched',
		'created_at',
		'updated_at',
		'create_user_id',
		'update_user_id',
	),
)); ?>
