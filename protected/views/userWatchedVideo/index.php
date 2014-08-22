<?php
/* @var $this UserWatchedVideoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Watched Videos',
);

$this->menu=array(
	array('label'=>'Create UserWatchedVideo', 'url'=>array('create')),
	array('label'=>'Manage UserWatchedVideo', 'url'=>array('admin')),
);
?>

<h1>User Watched Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
