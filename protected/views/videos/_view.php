<?php
/* @var $this VideosController */
/* @var $data Videos */
if(isset($_GET['id'])) {
   $_id =$_GET['id']; 
}


?>

<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Video List</h3>
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
                      
             <?php if(!isset($_id)) { ?>
               <li class="active" ><a class="bg-hover-color" href="video/index">All</a></li> 
             <?php } else { ?>  
              <li><a class="bg-hover-color" href="video/index">All</a></li>      
             <?php } ?>   
                
                 <?php 
                     foreach ($this->OurPrograms as $OurProgram)
                 { 
                     //Check if $_id has a value
                      if(isset($_id)) {
                          if($_id == $OurProgram->id) { ?>
                            <li class="active"><?php echo CHtml::link($OurProgram->code,array('','id'=>$OurProgram->id),array('class' => 'bg-hover-color' )) ?></li>
                          <?php } else {
                              ?>
                              <li><?php echo CHtml::link($OurProgram->code,array('','id'=>$OurProgram->id),array('class' => 'bg-hover-color' )) ?></li>
                        <?php     }
                          }
                        else { 
                      ?>
                      <li><?php echo CHtml::link($OurProgram->code,array('','id'=>$OurProgram->id),array('class' => 'bg-hover-color' )) ?></li>
                      <?php }
                      } ?>
                         
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
              <li class="active"><a href="#all" data-toggle="tab">All</a></li>
              <li><a href="#ebooks" data-toggle="tab">E-books</a></li>
              <li><a href="#audiocd" data-toggle="tab">Audio CD</a></li>
              <li><a href="#kindle" data-toggle="tab">Kindle Edition</a></li>
            </ul>
            
            <div class="row">
              <div class="tab-content">

                <!-- All-->
                <div class="tab-pane fade in active" id="all">
                  <?php 
                     foreach ($Videos as $videos)
                 { 
                         
                   
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
                      <?php echo CHtml::link(
                                   CHtml::image($image, CHtml::encode($title), array()), array('/videos/view', 'id' => $videos->id),array('class' =>'img-responsive'));
                                   ?>   
                        <h5>  
                      <?php echo CHtml::link(
                                   $videos->name,array('/videos/view', 'id' => $videos->id),array('class' =>'primary-font'));
                      ?></h5>   
                        
                     
                      <p class="text-muted">
                          <?php 
                                 foreach ($this->OurLecturers as $OurLecturer)
                            { 
                                     
                                if($OurLecturer->id = $videos->attorneys_id ) {
                                    
                                  $name = 'Atty. ' . $OurLecturer->first_name . ' ' . $OurLecturer->last_name;   
                                 
                                    
                                }else{
                                 
                                 $name = 'Unknown Author';} 
                                   
                 
                           }
                           
                      
                          echo CHtml::link($name  ,array('/lecturers/view','id'=>$OurLecturer->id));       
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
                  <ul class="pagination pull-right">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div> <!-- / .row -->

            </div> <!-- / .row -->
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
