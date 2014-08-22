<?php
echo Shop::renderFlash();
echo '<div class="product-price-info">';
echo Shop::pricingInfo();
echo '</div>';

echo CHtml::beginForm(array('shoppingCart/create'));

if($variations = $model->getVariations()) {
	$i = 0;
	foreach($variations as $variation) {
		$i++;
		$field = "Variations[{$variation[0]->specification_id}][]";
		echo '<div class="product_variation product_variation_'.$i.'">';
		echo CHtml::label($variation[0]->specification->title,
				$field, array(
					'class' => 'lbl-header'));

		if($variation[0]->specification->required)
			echo ' <span class="required">*</span>';

		echo  '<br />';
		if($variation[0]->specification->input_type == 'textfield') {
			echo CHtml::textField($field);
		} else if ($variation[0]->specification->input_type == 'select'){
			// If the specification is required, preselect the first field. Otherwise
			// let the customer choose which one to pick
			echo CHtml::radioButtonList($field,
					$variation[0]->specification->required ? $variation[0]->id : null,
					ProductVariation::listData($variation));
		} else if ($variation[0]->specification->input_type == 'image'){
			echo CHtml::fileField($field);
		}

		echo '</div>';
		if($i % 2 == 0)
			echo '<div style="clear: both;"></div>';
	}

}

 echo '<div class="price-block">';
 echo CHtml::hiddenField('product_id', $model->product_id);
 echo '<span class="price">';
 printf('%s %s', $model->variationCount > 0 ? Shop::pricePrefix() : '',
				Shop::priceFormat($model->getPrice()));
 echo '</span>';
 echo CHtml::textField('amount', 1, array('size' => 3));
 
 echo '</div><br>';
 echo CHtml::htmlButton('<i class="fa fa-shopping-cart"></i> Add to cart', array('class' => 'btn btn-color', 'type' => 'submit'));
 echo CHtml::endForm();