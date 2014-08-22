<?php
/* @var $this LecturersController */
/* @var $model Lecturers */

$this->breadcrumbs=array(
        'Home' => array('/site/index'),
	'Lecturers'=>array('index'),
	'Profile',
);

?>


    <!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Lecturer Profile</h3>
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
            <div class="team-member user-avatar text-center">
                <?php
                     $name = 'Atty. ' . $model->first_name . ' ' . $model->last_name;

                      $filename = $this->createAbsoluteUrl('/images/lecturers/' . $model->id . '.jpg');
                                   
                                    if (checkRemoteFile($filename)) {
                                       $image = Yii::app()->BaseUrl . '/images/lecturers/' . $model->id . '.jpg';
                                    } else {
                                        $image = Yii::app()->theme->BaseUrl . '/img/default_profile.jpg';
                                    }
                     
                 ?>
                
                <?php
                     echo CHtml::link(
                     CHtml::image($image, CHtml::encode($name), array('style'=>'width:190px',)), array('view', 'id' => $model->id), array('class' => 'img-responsive center-block',
                     ));
                ?>  
                
             
              <?php echo $name; ?>
              <p class="text-muted">Lecturer</p>
            </div>
            </div>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-7">
                <h2 class="primary-font"><?php echo $name; ?></h2>
                <p class="text-muted">
                  <?php echo $model->expertise ?>
                </p>
                <p><?php echo CHtml::mailto($model->email); ?></p>
                <div class="social user-social">
                  <ul class="list-inline">
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-5">

              </div>
              <div class="col-sm-12 shopping-cart user-cart">
                <hr class="arrow-down">
                <h4 class="primary-font">Lectures</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Video Title</th>
                      <th>Views</th>
                      <th>Duration</th>
                    </tr>
                  </thead>
                  <tbody>


                     
                      <?php  foreach ($videos as $video) {
                           
                      
                      //call public function getVideoInfo($video_id) from videos.php model
      $video_info = Videos::model()->getVideoInfo($video->vimeo_embed_code);
      
      if ($video_info){
                $image = $video_info['thumb_small'];
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
                $image = '../images/default-video-thumbnail.jpg';
                $title = $video->name;
                $duration = 'Unknown Duration';
                $width = 'unknown';
                $height = 'unknown';
                $video_url ='unknown';
                $upload_date = 'unknown';

                }
                ?>
                      
                    <tr>
                      <td>
                        <?php echo CHtml::link(
                                   CHtml::image($image, CHtml::encode($title), array()), array('/videos/view', 'id' => $video->id),array('class' =>'img-responsive'));
                                   ?>  
                      
                        <div class="item">
                         <?php echo CHtml::link($video->name,array('/videos/view', 'id' => $video->id)); ?>
                          <p class="text-muted"><?php echo $video_url;?></p>
                        </div>
                      </td>
                      <td><?php echo $video->views; ?></td>
                      <td><?php echo $duration ;?></td>
                    </tr>
                     <?php } ?>
                  </tbody>
                </table>
               </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
