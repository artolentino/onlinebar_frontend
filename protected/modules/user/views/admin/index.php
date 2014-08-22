<?php
$this->breadcrumbs = array(
    'Home' => array('/site/index'),
    UserModule::t('Users') => array('/user'),
    UserModule::t('Manage Users'),
);

$this->menu = array(
    array('label' => UserModule::t('Create User'), 'url' => array('create')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
    array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>


<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
); ?>
 
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Advanced Search</h4>
    </div>
 
    <div class="modal-body">      
            <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
            </p>

            <div class="search-form" >
            <?php $this->renderPartial('_search',array(
                    'model'=>$model,
            )); ?>
           </div><!-- search-form -->
    </div>

       
   
 
    <div class="modal-footer">
       <?php $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'primary',
            'label'=>'Search',
           'icon'=>'icon-search',
            'url'=>'#',
            'htmlOptions'=>array('onclick' => '$("#verticalForm").submit()'),
        )); ?>

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
        
    </div>
 
<?php $this->endWidget(); ?>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => 'Advance Search',
        //'type' => 'primary',
        'icon'=>'icon-search',
        'htmlOptions' => array(
            'data-toggle' => 'modal',
            'data-target' => '#myModal',
            
        ),
    )
);?>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered',
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'responsiveTable' => true,
    'columns' => array(
        array(
            'name' => 'id', 'header' => 'User ID',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        array(
            'name' => 'username', 'header' => 'User Name',
            'type' => 'raw',
            'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
        ),
        array(
            'name' => 'email', 'header' => 'Email Address',
            'type' => 'raw',
            'value' => 'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
        ),
        array(
            'name' => 'superuser', 'header' => 'SuperUser',
            'value' => 'User::itemAlias("AdminStatus",$data->superuser)',
            'filter' => User::itemAlias("AdminStatus"),
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        array(
            'name' => 'status', 'header' => 'Status',
            'value' => 'User::itemAlias("UserStatus",$data->status)',
            'filter' => User::itemAlias("UserStatus"),
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));

