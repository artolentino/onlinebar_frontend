<?php
//$this->renderPartial('/order/waypoint', array('point' => 2));

if(!isset($customer))
	$customer = new Customer;

if(!isset($deliveryAddress))
	if(isset($customer->deliveryAddress))
		$deliveryAddress = $customer->deliveryAddress;
	else
		$deliveryAddress = new DeliveryAddress;

if(!isset($this->breadcrumbs))
	$this->breadcrumbs = array(
			Shop::t('Order'),
			Shop::t('Shipping method'));
			
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
              <?php $this->renderPartial('/order/waypoint', array('point' => 2));?>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->

      <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'action' => array('//shop/order/create'),
			'enableAjaxValidation'=>false,
			)); 
      ?>

      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <h2 class="headline first-child text-color">
              <span class="border-color">Email Delivery</span>
            </h2>
            <h3 class="first-child primary-font"> <?php echo $customer->email; ?> </h3>
            <p>The above email address you use to register at iSecure Online Barreview Center will also be use to deliver your purchases. After the confirmation of payments you must open your email to check messages related to this transaction.</p>
            <?php
        	    echo CHtml::submitButton(Shop::t('Continue'),array('id'=>'next','class' => 'btn btn-lg btn-color'));
             ?>
          </div>

          <?php $this->endWidget(); ?>
      
        </div>  <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->