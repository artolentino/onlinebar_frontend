<?php
$this->pageTitle = $model->title;

Yii::app()->clientScript->registerMetaTag(
		substr(strip_tags($model->description), 0, 255), 'description');

if($model->keywords)
	Yii::app()->clientScript->registerMetaTag(
			substr(strip_tags($model->keywords), 0, 255), 'keywords');


$this->breadcrumbs=array(
	Shop::t('Products')=>array('index'),
	$model->title,
);

?>


<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Shop Item</h3>
            </div>
            <div class="col-sm-8">
             <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
                                'htmlOptions' => array('class' => 'breadcrumb pull-right hidden-xs')
                            ));
                            ?>
                    <!-- breadcrumbs -->
                        <?php endif ?>  
            </div>
          </div>
        </div>
      </div>

      <div class="container shop-item">
        <div class="row">
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-6">
                <div class="product-img">
                <?php 
						if($model->images) {
							foreach($model->images as $image) {
								$this->renderPartial('/image/view', array( 'model' => $image));
								
							}
						} else 
						$this->renderPartial('/image/view', array( 'model' => new Image()));
						?>	
                  
                </div>
              </div>
              <div class="col-sm-6">
                <h3 class="headline text-color"><?php echo $model->title; ?></h3>
                
                 <p class="text-muted">
                  <?php echo $model->description; ?>
                </p>
                <br />
                <?php $this->renderPartial('/products/addToCart', array(
			'model' => $model)); ?>
                 
              </div>
            </div>
          </div>

        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

