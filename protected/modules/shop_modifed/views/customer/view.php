<?php
if(!isset($hideEmail)) {
	echo '<h3>'.Shop::t('Customer information').'</h3>';
	
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
	),
)); 
}

if($model->address && !isset($hideAddress)) {
	echo '<h3>'.Shop::t('Address').'</h3>';
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->address,
	'attributes'=>array(
		'firstname',
		'lastname',
		'street',
		'zipcode',
		'city',
		'country',
	),
)); 

}

// echo '<div class="box-delivery-address">';
// echo '<h3>'.Shop::t('Delivery address').'</h3>';
//  $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model->deliveryAddress ? $model->deliveryAddress : $model->address,
// 	'attributes'=>array(
// 		'firstname',
// 		'lastname',
// 		'street',
// 		'zipcode',
// 		'city',
// 		'country',
// 	),
// ));
// echo CHtml::link(Shop::t('Delivery address').' '.Shop::t('Edit'), array(
// 			'//shop/shippingMethod/choose', 'order' => true)); 
// echo '</div>';

echo '<div class="box-billing-address">';
echo ' <h3 class="primary-font">' . Shop::t('Billing address'). '</h3>';
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->billingAddress ? $model->billingAddress : $model->address,
	'attributes'=>array(
		'firstname',
		'lastname',
		'street',
		'zipcode',
		'city',
		'country',
	),
)); 

echo '</div>';
echo '<div class="clear"></div>';
?>