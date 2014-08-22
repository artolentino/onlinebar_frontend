<?php
/* @var $this VideosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
        'Home'=>array('/site/index'),
	      'Videos',
);

if (count($ProgramCategory) > 1) {

  $CategoryName = 'All Videos';
  $_id =0;
} else {

 $CategoryName = $ProgramCategory->code;
 $_id = $ProgramCategory->id;


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

             <?php  $this->widget('ext.iSecure.iSecureProgramsSideMenu',array('ProgramID' =>$_id)); ?>

            <!-- Search -->
            <div class="shop-category">Search</div>
            
             <?php echo CHtml::beginForm(array('/Videos/index'),'GET',array('id'=>'findForm')); ?>
            
              <div class="form-group">

               <?php echo CHtml::dropDownList('id', isset($_GET['id'])?$_GET['id']:'', 
                                CHtml::listData(Programs::model()->findAll(), 'id', 'code'), array('class'=>'form-control','prompt'=>'Select category'));?>
                
              </div>
              <div class="form-group">
             <?php echo CHtml::textField('keyword', isset($_GET['keyword'])?$_GET['keyword']:'', array('class'=>'form-control','placeholder'=>'Looking for...' )) ?>
              </div>
              <?php echo CHtml::submitButton('Search', array('class'=>'btn btn-color')) ?>
              
           
            <?php echo CHtml::endForm(); ?> 

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
                     foreach ($model as $videos)

                 { 
                         
                    //$data[] = $videos->attributes;  
                    //print_r($videos->vimeo_embed_code);
                    $video_info = Videos::model()->getVideoInfo($videos->vimeo_embed_code);

                    if ($video_info){
                              $image = $video_info['thumb_medium'];
                              $title = $video_info['title'];
                              $upload_date = $video_info['upload_date'];
                              $number_of_plays = $video_info['number_of_plays'];
                              $duration = $video_info['duration'];
                              $width = $video_info['width'];
                              $height = $video_info['height'];
                              $video_url = $video_info['video_url'];
                              } 
                        else {
                       // No vimeo data use default video thumbnail
                              $image = Yii::app()->theme->baseUrl. '/img/default-video-thumbnail.jpg';
                              $title = $videos->name;
                              $duration = 'Unknown Duration';
                              $width = 'unknown';
                              $height = 'unknown';
                              $video_url ='unknown';
                              $upload_date = 'unknown';

                              }
                         ?>
                  <div class="col-sm-4">
                    <div class="shop-product">
                      <?php echo CHtml::image($image, CHtml::encode($title), array(), array('class' =>'img-responsive'));
                                   ?>   
                        <h5>  

                          <?php 
                              if(!Yii::app()->user->isGuest) { 



                          echo CHtml::link($videos->name,array('/videos/view', 'id' => $videos->id)); 
                          }else{

                            echo  $videos->name;
                        
                          }

                          ?>
                      </h5>   
                        
                     
                      <p class="text-muted">
                          <?php 
                          //Get lecturer Records using $videos->attorneys_id
                          if(!$videos->attorneys_id == '')
                          {    
                          
                          $sql="SELECT * FROM attorneys WHERE id = " . $videos->attorneys_id;// SQL Query
                         
                          $command = Yii::app()->db->createCommand($sql);
                          $rows = $command->queryAll();
                          $rowCount=$command->execute();
                          $row=$rows[0];
                         
                          $name = 'Atty. ' . $row['first_name']. ' ' . $row['last_name'];
                          echo CHtml::link($name  ,array('/lecturers/view','id'=>$videos->attorneys_id));   
                          }
                          else
                          {    
                           
                           $name = 'Unknown Author';
                           echo $name;   
                          } 
                                  
                      
                          
                          if(!Yii::app()->user->isGuest) { 

                               echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-youtube-play'), '  Watch Video'),array('/videos/view', 'id' => $videos->id),array('class' => 'btn btn-color'));
                          }   
                         ?> 
                      </p>
                    </div>
                  </div>
                  <?php } ?>  
                  </div>
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
