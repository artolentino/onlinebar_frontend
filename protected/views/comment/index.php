<?php
$this->breadcrumbs=array(
	'Home' => array('/site/index'),
	'Comments',
);
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
