
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Products</h3>
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

      <div class="container">
        <div class="row">
          <div class="col-sm-3">

            <!-- Categories -->
            <div class="shop-category first-child">Categories</div>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="shop-products.html#" data-toggle="tab">Postpaid</a></li>
              <li><a href="shop-products.html#" data-toggle="tab">Prepaid</a></li>
            </ul>

                    
          
          </div>
          <div class="col-sm-9">
            <div class="row">
              <div class="tab-content">

                <!-- All-->
                <div class="tab-pane fade in active" id="all">
                
                  <div class="col-sm-4">
                    <div class="shop-product">
                      <?php 
                            if($data->images){
                                $this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                            }else {
                                echo CHtml::image(Shop::register('no-pic.jpg'));
                            }?>
                      <h5 class="primary-font"><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></h5>
                      <p class="text-muted">
                       <?php echo CHtml::encode($data->description); ?>
                      </p>
                      <p>
                        
                       <?php echo Shop::priceFormat($data->price); ?>
        
                      </p>
                      <?php echo CHtml::link(Shop::t('Show Product'), array('products/view', 'id' => $data->product_id), array('class' =>'btn btn-color')); ?>
                      
                    </div>
                  </div>
                  

                

              </div> <!-- / .row -->

              <!-- Pagination -->
              <div class="row">
                <div class="col-sm-12">
                  <ul class="pagination pull-right">
                    <li class="disabled"><a href="shop-products.html#">«</a></li>
                    <li class="active"><a href="shop-products.html#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="shop-products.html#">2</a></li>
                    <li><a href="shop-products.html#">3</a></li>
                    <li><a href="shop-products.html#">4</a></li>
                    <li><a href="shop-products.html#">5</a></li>
                    <li><a href="shop-products.html#">&raquo;</a></li>
                  </ul>
                </div>
              </div> <!-- / .row -->

            </div> <!-- / .row -->
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->


