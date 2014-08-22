<?php
/* @var $this VideosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        'Home'=>array('/site/index'),
	      'Products',
);

if (count($ProductCategory) > 1) {

  $ProductName = 'All Products';
  $_id =0;
} else {

 $ProductName = $ProductCategory->title;
 $_id = $ProductCategory->category_id;


}

?>

<?php
Shop::renderFlash();
?>
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font"><?php echo $ProductName; ?></h3>
            </div>
            <div class="col-sm-8">
                 <!-- breadcrumbs -->
                  <?php if (isset($this->breadcrumbs)): 
                          
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => false,
                                'tagName' => 'ol',
                                'separator' => '',
                                'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate' => '<li><span>{label}</span></li>',
                                'htmlOptions' => array('class' => 'breadcrumb pull-right hidden-xs')
                            ));
                           
               
                        endif 
                  ?>  
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-3">

            <!-- Categories -->
            <div class="shop-category first-child">Categories</div>
             <?php  $this->widget('ext.iSecure.iSecureProductSideMenu',array('CategoryID' =>$_id)); ?>
          </div>
          <div class="col-sm-9">
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
            
            <div class="row">
              <div class="tab-content">
                <!-- Ebooks -->
                <div class="tab-pane fade in active" id="ebooks">
                     <?php foreach ($model as $data) {  ?>

                  <div class="col-sm-4">
                    <div class="shop-product">
                          <?php 
                            if($data->images){
                                $this->renderPartial('/image/view', array('thumb' =>true, 'model' => $data->images[0]));
                            }else {
                                echo CHtml::image(Shop::register('no-pic.jpg'));
                          }?>

                      <h5 class="primary-font"><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?></h5>
                      <p class="text-muted"> <?php echo CHtml::encode($data->description); ?></p>
                      <p class="price">
                        <span class="old"> <?php echo Shop::priceFormat($data->price); ?></span>
                      </p>
                       <?php echo CHtml::link(Shop::t('Show Product'), array('products/view', 'id' => $data->product_id), array('class' =>'btn btn-color')); ?>
                    </div>
                  </div>
                  <?php } ?>
               </div>

            
      
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
    
