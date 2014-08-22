<?php

if(!isset($customer))
	$customer = new Customer;

if(!isset($address))
	$address = new Address;

$this->breadcrumbs=array(
		Yii::t('ShopModule.shop', 'Customers')=>array('index'),
		Yii::t('ShopModule.shop', 'Register as a new Customer'),
		);

?>


	<?php

if($address === null)
	$address = new Address;

// if(!isset($deliveryAddress) || $deliveryAddress === null)
// 	$deliveryAddress = new DeliveryAddress;

if(!isset($billingAddress) || $billingAddress === null)
	$billingAddress = new BillingAddress;
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
              <?php $this->renderPartial('/order/waypoint', array('point' => 1));?>
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
          <div class="col-sm-12">
            <h2 class="headline first-child text-color">
              <span class="border-color">Billing Information</span>
            </h2>
            
            <?php echo $this->renderPartial('/customer/_form', array(
				'action' => isset($action) ? $action : null,
				'customer'=>$customer,
				'address' =>$address,
				//'deliveryAddress' => $deliveryAddress,
				'billingAddress' => $billingAddress,
				)); ?>
          </div>

          <?php $this->endWidget(); ?>
      
        </div>  <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
