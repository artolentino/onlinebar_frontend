<?php
//Shop::register('css/shop.css');

//if($this->id == 'shoppingCart')
	//$this->renderPartial('/order/waypoint', array('point' => 0));

if(!isset($products)) 
	$products = Shop::getCartContent();

if(!isset($this->breadcrumbs) || ($this->breadcrumbs== array()))
	$this->breadcrumbs = array(
			Shop::t('Shop') => array('//shop/products/'),
			Shop::t('Shopping Cart'));
?>

<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Your Shopping Cart</h3>
            </div>
            <div class="col-sm-8">
              <?php $this->renderPartial('/order/waypoint', array('point' => 0)); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="container shopping-cart">
        <div class="row">
          <div class="col-sm-12">
<?php
if($products) {
	echo '<table class="table table-bordered table-striped table-condensed table-hover">';
	printf('<tr><th>%s</th><th>%s</th><th>%s</th><th>%s</th><th style="width:60px;">%s</th><th style="width:60px;">%s</th><th>%s</th></tr>',
			Shop::t('Image'),
			Shop::t('Quantity'),
			Shop::t('Product'),
			Shop::t('Users'),
			Shop::t('Price Single'),
			Shop::t('Sum'),
			Shop::t('Actions')
);
//var_dump($products);die();

	foreach($products as $position => $product) {
		if($model = Products::model()->findByPk($product['product_id'])) {
			$variations = '';
			if(isset($product['Variations'])) {
				foreach($product['Variations'] as $specification => $variation) {
					if($specification = ProductSpecification::model()->findByPk($specification)) {
						if($specification->input_type == 'textfield')
							$variation = $variation[0];
						else
							$variation = ProductVariation::model()->findByPk($variation);

						if(Shop::module()->allowPositionLiveChange) {
							if($specification->input_type == 'select') {
								$name = sprintf('variation_%s_%s',$position, $specification->id); 
								$variations .= CHtml::radioButtonList(
										$name, $variation->id,
										ProductVariation::listData($variation->getVariations(), true));
								Yii::app()->clientScript->registerScript($name, "
										$('[name=\"".$name."\"]').click(function(){
									$.ajax({
											'url' : '".CController::createUrl('//shop/shoppingCart/updateVariation')."',
											'type' : 'POST',
											'data' : $(this),
											error: function() {
											$('#amount_".$position."').css('background-color', 'red');
											},
											success: function(result) {
											$('.amount_".$position."').css('background-color', 'lightgreen');
											$('.widget_amount_".$position."').css('background-color', 'lightgreen');
											$('.widget_amount_".$position."').html($('.amount_".$position."').val());
											$('.price_".$position."').html(result);	
											$('.price_single_".$position."').load('".$this->createUrl(
										'//shop/shoppingCart/getPriceSingle?position='.$position)."');
											$('.price_total').load('".$this->createUrl(
										'//shop/shoppingCart/getPriceTotal')."');
											$('.shipping_costs').load('".$this->createUrl(
										'//shop/shoppingCart/getShippingCosts')."');

											},
											});
							});

										$('input:checked').trigger('click');
										");
		$variations .= '<br />';
							}
						} else
							$variations .= $specification . ': ' . $variation . '<br />';
					} 

						$img = CHtml::image(
								Yii::app()->baseUrl.'/'.$variation, '', array(
									'width' => Shop::module()->imageWidthThumb));
			}
			} else {

           if (isset($model->images[0]))
 			$img = CHtml::image(
 						Yii::app()->baseUrl.'/'.Shop::module()->productImagesFolder. '/'. $model->images[0]->filename, '', array(
 								'width' => Shop::module()->imageWidthThumb));
 			else
 				$img = null;		

		}

			printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class="text-right price_single_'.$position.'">%s</td><td class="text-right price_'.$position.'">%s</td><td>%s</td></tr>',
					$img,
					CHtml::textField('amount_'.$position,
						$product['amount'], array(
							'size' => 4,
							'class' => 'amount_'.$position,
							)
						),
					$model->title,
					$variations,
					Shop::priceFormat($model->getPrice(isset($product['Variations'])?$product['Variations']: null)),
					Shop::priceFormat($model->getPrice(isset($product['Variations'])?$product['Variations']: null, $product['amount'])),
					CHtml::link(Shop::t('Remove'), array(
							'//shop/shoppingCart/delete',
							'id' => $position), array(
								'confirm' => Shop::t('Are you sure?')))
					);

			Yii::app()->clientScript->registerScript('amount_'.$position,"
					$('.amount_".$position."').keyup(function() {
						$.ajax({
							url:'".$this->createUrl('//shop/shoppingCart/updateAmount')."',
							data: $('#amount_".$position."'),
							success: function(result) {
							$('.amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').css('background-color', 'lightgreen');
							$('.widget_amount_".$position."').html($('.amount_".$position."').val());
							$('.price_".$position."').html(result);	
							$('.price_total').load('".$this->createUrl(
							'//shop/shoppingCart/getPriceTotal')."');
							$('.shipping_costs').load('".$this->createUrl(
							'//shop/shoppingCart/getShippingCosts')."');

							},
							error: function() {
							$('#amount_".$position."').css('background-color', 'red');
							},

							});
				});
					");
			}
	}

	if($shippingMethod = Shop::getShippingMethod()) {
		printf('<tr>
				<td></td>
				<td>1</td>
				<td>%s</td>
				<td></td>
				<td class="text-right shipping_costs">%s</td>
				<td class="text-right shipping_costs">%s</td>
				<td>%s</td></tr>',
				Shop::t('Shipping costs'),
				Shop::priceFormat($shippingMethod->getPrice()),
				Shop::priceFormat($shippingMethod->getPrice()),
				CHtml::link(Shop::t('edit'), array('//shop/shippingMethod/choose'))
				);
	}
echo '<tr>
<td class="text-right no-border" colspan="6">
<p class="price_total">'.Shop::getPriceTotal().'</p></td>
<td class="no-border"></td></tr>';
echo '</table>';
?>

<?php

 if(Yii::app()->controller->id != 'order') {
echo '<div class="col-sm-12">';
echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-shopping-cart'), '  Buy additional Products'),array('//shop/products'),array('class' => 'btn btn-color'));
echo ' ';			
echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-shopping-cart'), '  Check-out'),array('//shop/order/create'),array('class' => 'btn btn-color'));

echo '</div>';
}

?>
<div class="clear"></div>

<?php

} else echo Shop::t('Your shopping cart is empty'); ?>
 </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

