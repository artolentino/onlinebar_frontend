<?php
/* @var $this UserBalancesController */
/* @var $model UserBalances */

$this->breadcrumbs=array(
	'User Balances'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserBalances', 'url'=>array('index')),
	array('label'=>'Create UserBalances', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-balances-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Balances</h1>

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
	'id'=>'user-balances-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'account_id',
		'balance',
		'user_id',
		'expiration',
		'created_at',
		/*
		'updated_at',
		'create_user_id',
		'update_user_id',
		'prepaid_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
