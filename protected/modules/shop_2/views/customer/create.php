<?php
$this->renderPartial('/order/waypoint', array('point' => 1));

if(!isset($customer))
	$customer = new Customer;

if(!isset($address))
	$address = new Address;

$this->breadcrumbs=array(
		Shop::t('Customers')=>array('index'),
		Shop::t('Register as a new Customer'),
		);

?>

<h2> <?php echo Shop::t('Please enter your Billing information'); ?> </h2>

<p><?php echo Shop::t('Registration information'); ?></p>
<p><strong> <?php echo Shop::t('Please enter your Billing information'); ?></strong> </p>
	<?php


// if(!isset($deliveryAddress) || $deliveryAddress === null)
// 	$deliveryAddress = new DeliveryAddress;

if(!isset($billingAddress) || $billingAddress === null)
	$billingAddress = new BillingAddress;

 echo $this->renderPartial('/customer/_form', array(
				'action' => isset($action) ? $action : null,
				'customer'=>$customer,
				'address' =>$address,
				//'deliveryAddress' => $deliveryAddress,
				'billingAddress' => $billingAddress,
				)); ?>

