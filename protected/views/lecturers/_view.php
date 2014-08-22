<?php
/* @var $this LecturersController */
/* @var $data Lecturers */
?>
  <!-- Wrapper -->
<div class="wrapper">

    <!-- Topic Header -->
    <div class="topic">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="primary-font">Our Lecturers</h3>
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

        <div class="row about-us-p">
            <div class="col-sm-7">
                <h2 class="headline first-child text-color">
                    <span class="border-color">Welcome Message</span>
                </h2>
                <p>
                    Our group of people will surely teach you everything you want to know about the law. Our lecturers are the country's finest and leading attorneys on their respective field.
                </p>
                <hr>

            </div>
            <div class="col-sm-5">
                <h2 class="headline first-child text-color">
                    <span class="border-color">A Lecture Session</span>
                </h2>
                <div class="flex-video">
                    <iframe src="" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                </div>
            </div>
        </div> <!-- / .row -->
        <div class="row our-team-p">
            <div class="col-sm-12">
                <h2 class="headline text-color">
                    <span class="border-color">Meet the Team</span>
                </h2>
                <div class="row">
                    <div class= "wrap" >
                        <?php
                        foreach ($this->dataProvider as $OurLecturer) {
                            ?>

                            <?php
                                    $name = 'Atty. ' . $OurLecturer->first_name . ' ' . $OurLecturer->last_name;

                                   
                                    
                                    $filename = $this->createAbsoluteUrl('/images/lecturers/' . $OurLecturer->id . '.jpg');
                                   
                                    if (checkRemoteFile($filename)) {
                                       $image = Yii::app()->BaseUrl . '/images/lecturers/' . $OurLecturer->id . '.jpg';
                                    } else {
                                        $image = Yii::app()->theme->BaseUrl . '/img/default_profile.jpg';
                                    }
                            ?>
                            <div class="box">
                                <div class="boxInner">
                                    <?php
                                    echo CHtml::link(
                                            CHtml::image($image, CHtml::encode($name), array()), array('view', 'id' => $OurLecturer->id), array('class' => 'img-responsive center-block',
                                    ));
                                    ?>  

                                    <div class="titleBox"><?php echo 'Atty. ' . $OurLecturer->first_name . ' ' . $OurLecturer->last_name ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>  
                </div>
            </div> <!-- / .row -->
        </div>
    </div> <!-- / .row -->

</div> <!-- / .container -->

</div> <!-- / .wrapper -->
