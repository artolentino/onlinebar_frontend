<?php
$this->renderPartial('/order/waypoint', array('point' => 2));

if(!isset($customer))
	$customer = new Customer;

if($customer->address === NULL)
	$this->redirect(array('//shop/customer/create'));

// 	if(!isset($deliveryAddress))
// if(isset($customer->deliveryAddress))
// 	$deliveryAddress = $customer->deliveryAddress;
// 	else
// 	$deliveryAddress = new DeliveryAddress;

if(!isset($this->breadcrumbs))
	$this->breadcrumbs = array(
			Shop::t('Order'),
			Shop::t('Shipping method'));

$form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'action' => array('//shop/order/create'),
			'enableAjaxValidation'=>false,
			)); 
?>

<h2> <?php echo Shop::t('Delivery option'); ?> </h2>


<div class="current_address">
<p>The card number and the corresponding PIN will be send through <?php echo $customer->email; ?></p>

</div>
<hr />  
<h3> <?php echo Shop::t('Shipping Method'); ?> </h3>

<?php
$i = 0;

$methods = ShippingMethod::model()->findAll();

foreach($methods as $method) {
	echo '<div class="row">';
	echo CHtml::radioButton("ShippingMethod", $i == 0, array(
				'value' => $method->id));
	echo '<div class="float-left shipping_method">';
	echo CHtml::label($method->title, 'ShippingMethod');
	echo CHtml::tag('p', array(), $method->description);
	echo CHtml::tag('p', array(),
			Shop::t('Price: ') . Shop::priceFormat($method->getPrice()));
	echo '</div>';
	echo '</div>';
	echo '<div class="clear"></div>';
	$i++;
}
?>
<div class="row buttons">
<?php
echo CHtml::submitButton(Shop::t('Continue'),array('id'=>'next'));
?>
</div>
</div>
<?php $this->endWidget(); ?>
