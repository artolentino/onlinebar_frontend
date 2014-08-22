<?php
if(!isset($customer))
	$customer = new Customer;

if($customer->address === NULL)
	$this->redirect(array('//shop/customer/create'));

	if(!isset($billingAddress))
		if(isset($customer->billingAddress))
			$billingAddress = $customer->billingAddress;
		else
			$billingAddress = new BillingAddress;

if(!isset($this->breadcrumbs))
	$this->breadcrumbs = array(
			Shop::t('Order'),
			Shop::t('Payment method'));

$form=$this->beginWidget('CActiveForm', array(
			'id'=>'customer-form',
			'action' => array('//shop/order/create'),
			'enableAjaxValidation'=>false,
			)); 
?>

			
?>

<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">

              <h3 class="primary-font"><?php echo Shop::t('Payment method'); ?></h3>
            </div>
            <div class="col-sm-8">
              <?php $this->renderPartial('/order/waypoint', array('point' => 2)); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="container">

        <div class="col-xs-12">
          <div class = "row">
            <h3><?php echo'Billing Address'; ?></h3>
					<?php $this->widget('zii.widgets.CDetailView', array(
							'data'=>$customer->address,
							//'htmlOptions' => array('class' => 'detail-view'),
							'attributes'=>array(
								'title',
								'firstname',
								'lastname',
								'street',
								'zipcode',
								'city',
								'country'
								),
							)); ?>
				

       
          </div>
          <br>
          <div class="col-xs-12">

       <div class = "row">
          <h3> <?php echo Shop::t('Choose your Payment method'); ?> </h3>

<?php
$i = 0;
	echo '<fieldset>';
foreach(PaymentMethod::model()->findAll() as $method) {
	echo '<div class="row">';
	echo CHtml::radioButton("PaymentMethod", $i == 0, array(
				'value' => $method->id));
	echo '<img src="' . Yii::app()->baseUrl . '/images/' . $method->image . '"/>'; 
	echo CHtml::tag('p', array(
				'class' => 'shop_selection',
				'onClick' => "
				$(\"input[name='PaymentMethod'][value='".$method->id."']\").attr('checked','checked');"),
			$method->title . '<br />'.$method->description);

	echo '</div>';
	echo '<div class="clear"></div>';
	$i++;
}
	echo '</fieldset>';
	?>


<div class="row buttons">
<?php echo CHtml::submitButton(Shop::t('Continue'),array('id'=>'next')); ?>
</div>

<?php
 $this->endWidget(); 

?>
</div>
 </div>
          </div>

      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
