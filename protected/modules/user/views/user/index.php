<?php
$this->breadcrumbs=array(
    'Home' =>array('/site/index'),
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
	    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>
<h1><?php echo UserModule::t("List User"); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered',
	      'dataProvider'=>$dataProvider,
        'responsiveTable' => true,
        'columns'=>array(
		array(
       'header'=>'Username/Email Address',                 
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
      'htmlOptions'=>array('style'=>'width:250px'),
		),
    array(

    'header'=>"First Name", 
    'name'=>'profile.firstname',
    'type'=>'raw',
    ),
           
    array(

    'header'=>"Last Name", 
    'name'=>'profile.lastname',
    'type'=>'raw',
    ), 
             
		'create_at',
		'lastvisit_at',
            
            
            
	),
)); 
