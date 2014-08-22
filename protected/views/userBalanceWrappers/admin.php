<?php
/* @var $this UserBalanceWrappersController */
/* @var $model UserBalanceWrappers */

$this->breadcrumbs=array(
	'User Balance Wrappers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserBalanceWrappers', 'url'=>array('index')),
	array('label'=>'Create UserBalanceWrappers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-balance-wrappers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Balance Wrappers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-balance-wrappers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'user_balance_id',
		'subscription_id',
		'created_at',
		'updated_at',
		/*
		'create_user_id',
		'update_user_id',
		'account_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
