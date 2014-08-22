<?php 
?>
<div class="view">
    <h3>
		<?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?>
    </h3>
    
    <div class="product-overview-image">	
          	<?php 
		  	if($data->images){
		   		$this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
			}else {
				echo CHtml::image(Shop::register('no-pic.jpg'));
			}?>
	</div>
    
     <div class="product-overview-description">
        <p> <?php echo CHtml::encode($data->description); ?> </p>
        <p><strong> <?php echo Shop::priceFormat($data->price); ?></strong> <br />
        <p><?php echo Shop::pricingInfo(); ?></p>
      
        <p><?php echo CHtml::link(Shop::t('show product'), array('products/view', 'id' => $data->product_id), array('class' =>'show-product')); ?></p>
    </div>
    
    <div class="clear"></div>
</div>
<div class="view-bottom"></div>

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
              <ol class="breadcrumb pull-right hidden-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li class="active">Products</li>
              </ol>
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
              <li class="active"><a href="shop-products.html#" data-toggle="tab">Books</a></li>
              <li><a href="shop-products.html#" data-toggle="tab">Movies</a></li>
              <li><a href="shop-products.html#" data-toggle="tab">Music</a></li>
              <li><a href="shop-products.html#" data-toggle="tab">Computers</a></li>
              <li><a href="shop-products.html#" data-toggle="tab">Clothing</a></li>
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
          <div class="col-sm-9">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="shop-products.html#all" data-toggle="tab">All</a></li>
              <li><a href="shop-products.html#ebooks" data-toggle="tab">E-books</a></li>
              <li><a href="shop-products.html#audiocd" data-toggle="tab">Audio CD</a></li>
              <li><a href="shop-products.html#kindle" data-toggle="tab">Kindle Edition</a></li>
            </ul>
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
                      <?php echo CHtml::link(Shop::t('show product'), array('products/view', 'id' => $data->product_id), array('class' =>'show-product')); ?>
                      <a href="shop-products.html#" class="btn btn-sm btn-color"><i class="fa fa-shopping-cart"></i> Add to cart</a>
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

