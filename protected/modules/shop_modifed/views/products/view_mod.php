<?php
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
								echo '<br />'; 
							}
						} else 
						$this->renderPartial('/image/view', array( 'model' => new Image()));
						?>	
                  
                </div>
              </div>
              <div class="col-sm-6">
                <h3 class="primary-font first-child"><?php echo $model->title; ?></h3>
                  <p class="text-muted">
                  <?php echo $model->description; ?> 
                </p>
                <div class="price-block">
                             
                  <span class="price"><?php printf('%s',Shop::priceFormat($model->price));?></span>
                  </div>
                              <br />
                 <div class="product-options"> 
               <?php $this->renderPartial('/products/addToCart', array(
			'model' => $model)); ?>              
                </div>
                
              </div>
            </div>

            <!-- Item Description -->
            <div class="row">
              <div class="col-sm-12">
                <h3 class="headline text-color">
                  <span class="border-color">Product Details</span>
                </h3>
                <p>
                 <?php 
$specs = $model->getSpecifications();
if($specs) {
	echo '<table>';
	
	printf ('<tr><td colspan="2"><strong>%s</strong></td></tr>',
			Shop::t('Product Specifications'));
			
	foreach($specs as $key => $spec) {
		if($spec != '')
			printf('<tr> <td> %s: </td> <td> %s </td> </td>',
					$key,
					$spec);
	}
	
	echo '</table>';
} 
?>
                </p>
              </div>
            </div> <!-- / .row -->
            <div class="row">
              <div class="col-sm-12">
                <h3 class="headline text-color">
                  <span class="border-color">Similar Products</span>
                </h3>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="shop-product featured">
                      <a href="shop-item.html"><img src="img/product-1.jpg" class="img-responsive" alt="..."></a>
                      <a href="shop-item.html"><h5 class="primary-font">Product #1</h5></a>
                      <p class="text-muted">
                        Nunc in neque nec arcu vulputate ullamcorper.
                      </p>
                      <p class="price">
                        <span class="old">$80,99</span>
                        <span class="new">$59,99</span>
                      </p>
                      <a href="shop-item.html#" class="btn btn-sm btn-color"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="shop-product">
                      <a href="shop-item.html"><img src="img/product-2.jpg" class="img-responsive" alt="..."></a>
                      <a href="shop-item.html"><h5 class="primary-font">Product #2</h5></a>
                      <p class="text-muted">
                        Nunc in neque nec arcu vulputate ullamcorper.
                      </p>
                      <p>
                        $200,00
                      </p>
                      <a href="shop-item.html#" class="btn btn-sm btn-color"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="shop-product">
                      <a href="shop-item.html"><img src="img/product-3.jpg" class="img-responsive" alt="..."></a>
                      <a href="shop-item.html"><h5 class="primary-font">Product #3</h5></a>
                      <p class="text-muted">
                        Nunc in neque nec arcu vulputate ullamcorper.
                      </p>
                      <p>
                        $50,00
                      </p>
                      <a href="shop-item.html#" class="btn btn-sm btn-color"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div> <!-- / .row -->
          </div>
          <div class="col-sm-3">
            <!-- Categories -->
            <div class="shop-category first-child">Categories</div>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="shop-item.html#" data-toggle="tab">Books</a></li>
              <li><a href="shop-item.html#" data-toggle="tab">Movies</a></li>
              <li><a href="shop-item.html#" data-toggle="tab">Music</a></li>
              <li><a href="shop-item.html#" data-toggle="tab">Computers</a></li>
              <li><a href="shop-item.html#" data-toggle="tab">Clothing</a></li>
            </ul>

            <!-- Search -->
            <div class="shop-category">Search</div>
            <form role="form" class="shop-search">
              <div class="form-group">
                <label for="categories" class="sr-only">Select category</label>
                <select class="form-control" id="categories">
                  <option>Select category</option>
                  <option>Books</option>
                  <option>Movies</option>
                  <option>Music</option>
                  <option>Computers</option>
                  <option>Clothing</option>
                </select>
              </div>
              <div class="form-group">
                <label for="query" class="sr-only">Search</label>
                <input type="text" class="form-control" placeholder="Looking for..." id="query">
              </div>
              <button class="btn btn-color">Search</button>
            </form>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
