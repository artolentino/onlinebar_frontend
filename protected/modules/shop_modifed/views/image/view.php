<?php 
$folder = Shop::module()->productImagesFolder;

if($model->filename) 
	$path = Yii::app()->baseUrl. '/' . $folder . '/' . $model->filename;
	else
	$path = Shop::register('no-pic.jpg');

echo CHtml::image($path,
		$model->title,
		array(
			'title' => $model->title,
			'class' => 'img-responsive',
			//'width' => isset($thumb) && $thumb
			//? Shop::module()->imageWidthThumb 
			//: Shop::module()->imageWidth)
		)); ?>

