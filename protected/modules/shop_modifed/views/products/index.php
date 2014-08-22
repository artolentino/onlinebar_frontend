 <?php
$this->breadcrumbs=array(
	'Home' => array('/site/index'),
	'Products',
);

Shop::renderFlash();

if (count($ProductCategory) > 1) {

  $CategoryName = 'All Products';
  $_id =0;
} else {

 $CategoryName = $ProductCategory->title;
 $_id = $ProductCategory->category_id;


}
?>

<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font"><?php echo $CategoryName; ?></h3>
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

       <?php  $this->widget('ext.iSecure.iSecureProductCategorySideMenu',array('ProductCategoryID' =>$_id)); ?>

   
          
          </div>

              
            <div class="col-sm-9">
             <div class="row">
              <div class="tab-content">
              <div class="col-sm-12">

              <?php if($pages->itemCount >= 1)
         { 
         
          $_start = $pages->getOffset() + 1;
          $_pages = $pages->itemCount;
          $_currentPage = $pages->currentPage;
          $_totalPage = $pages->currentPage + 1;

            if ($_totalPage == $pages->pageCount  ) 
             {
               $_end = $pages->getOffset() + ($_pages - ($pages->currentPage)*( $page_size));
            } else {
                      $_end = $pages->getOffset() + $page_size;
                   }
    ?>
             
             <p class ="pull-right">Displaying <?php echo $_start; ?> to <?php echo $_end;?>  of <?php echo $_pages;?> results.</p>
               
               <?php 
                   } else { 
               ?>
                   <p class ="pull-right">No Results found.</p>
               <?php } ?>
               </div>

                <!-- All-->
                <div class="tab-pane fade in active" id="all">
                <?php
                       $data = array();
                        foreach ($model as $data) 
                        {
                            ?>
                  <div class="col-sm-4">
                    <div class="shop-product">
                      <?php 
                            if($data->images){
                                $this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                            }else {
                                echo CHtml::image(Shop::register('no-pic.jpg'));
                            }?>
                      <h4><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></h4>
                      <p class="text-muted">
                       <?php echo CHtml::encode($data->description); ?>
                      </p>
                      <p>
                        
                          <h4><?php echo Shop::priceFormat($data->price); ?></h4>
        
                      </p>

                      <?php  echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-eye'), '  View Product'),array('products/view','id' => $data->product_id), array('class' => 'btn btn-color')) ;;?>
                     
                     
                  
                    </div>
                  </div>
                  
             <?php } ?>
                

              </div> <!-- / .row -->

              <!-- Pagination -->
              <div class="row">
                <div class="col-sm-12">
                  <?php 
                  $this->widget('CLinkPager', array(
                                    'currentPage'=>$pages->getCurrentPage(),
                                    'itemCount'=>$item_count,
                                    'pageSize'=>$page_size,
                                    'maxButtonCount'=>5,
                                    'firstPageLabel'=>'<<',
                                    'prevPageLabel'=>'<',
                                    'nextPageLabel'=>'>',
                                    'lastPageLabel'=>'>>',
                                    'header'=>'',
                                    'htmlOptions'=>array('class'=>'pagination pull-right bg-hover-color'),

                                )); ?>

                </div>                
              </div> <!-- / .row -->

            </div> <!-- / .row -->
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->

