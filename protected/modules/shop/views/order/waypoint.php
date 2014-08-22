<?php
$points = array(
		Shop::t('Billing information'),
		Shop::t('Payment'),
		Shop::t('Confirm'),
		Shop::t('Success')
);

$links = array(
		array('//shop/customer/create'),
		array('//shop/paymentMethod/choose'),
		array('//shop/order/create'));


 

echo '<ol class="breadcrumb pull-right hidden-xs" >';
	printf('<li "waypoint %s">%s</li>',
			$point == 0 ? 'active' : '',
			CHtml::link(Shop::t('Shopping Cart'), array(
						'//shop/shoppingCart/view')));

foreach ($points as $p => $pointText) 
{
	printf('<li class="waypoint%s">%s</li>',
			($point == ++$p) ? ' active' : '',
			$point < ++$p ? $pointText : CHtml::link($pointText, @$links[$p-2])
			);
}
echo '</ol>';
?>
