<?php
$this->breadcrumbs=array(
		Shop::t('Order')=>array('index'),
		Shop::t('New Order'),
		);
?>

<?php 
Shop::renderFlash();
if(Shop::getCartContent() == array())
	return false; 
?>
<!-- Wrapper -->
    <div class="wrapper">
    
      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Checkout</h3>
            </div>
            <div class="col-sm-8">
              <?php $this->renderPartial('/order/waypoint', array('point' => 4));?>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->

     

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="headline first-child text-color">
					<?php 
					
					echo CHtml::beginForm(array('//shop/order/confirm')); ?>

              <span class="border-color">Confirmation</span>
            </h2>
           <h3 class="first-child primary-font"> <?php echo 'Email Address: '.  $customer->email; ?> </h3>
           <?php if(!isset($customer))
	                      $customer = Shop::getCustomer();
	                      $this->renderPartial('application.modules.shop.views.customer.view', array(
                                      				'model' => $customer,
                                      				'hideAddress' => true,
                                      				'hideEmail' => false)); ?>

          <?php echo '<p>';


                  	$payment = 	PaymentMethod::model()->findByPk(Yii::app()->user->getState('payment_method'));
                  	echo '<strong>'.Shop::t('Payment method').': </strong>'.' '.$payment->title.' ('.$payment->description.')';	
                  	echo '<br />';
	                  echo '</p>'; 
                    echo '<p>';


                  	$shipping = ShippingMethod::model()->findByPk(Yii::app()->user->getState('shipping_method'));
                  	echo '<strong>'.Shop::t('Shipping Method').': </strong>'.' '.$shipping->title.' ('.$shipping->description.')';
                  	echo '<br />';

	                   $this->renderPartial('application.modules.shop.views.shoppingCart.view'); 


                    echo '<h3 class="first-child primary-font">'.Shop::t('Please add additional comments to the order here').'</h3>'; 

                    echo CHtml::textArea('Order[Comment]',
		
                    @Yii::app()->user->getState('order_comment'), array('style'=>'width:600px; height:100px;padding:10px;'));
		
	
			echo '</p>';
			$this->renderPartial(Shop::module()->termsView);
			echo '<p>';
            echo CHtml::submitButton(Shop::t('Confirm Order'),array ('id'=>'next','class' => 'btn btn-lg btn-color'), array('//shop/order/confirm'));
            echo CHtml::endForm(); 
?>
          </div>

      
        </div>  <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
