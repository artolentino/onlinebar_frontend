<?php
/* @var $this SiteController */
?>


<!-- Wrapper -->
    <div class="wrapper">

      <!-- Jumbotron -->
      <div class="main-slideshow">
        <div id="main-slideshow" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide No 1 -->
            <div class="item active">
              <div class="jumbotron first">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <h1 class="animated slideInLeft">Civil Law</h1>
                      <p class="lead animated slideInLeft delay-1">Parental Authority</p>
                      <p class="lead animated slideInRight delay-1">Succession</p>
                      <p class="lead animated slideInLeft delay-1">Conjugal Partnership of Gains</p>
                      <p class="lead animated slideInRight delay-1">Marriage Formal Requisites and more....</p>
                      <?php echo CHtml::link(Shop::t('Check it Out!'), array('/videos/index', 'id' =>3), array('class' =>'btn btn-color animated slideInLeft delay-2')); ?></div>
                    <div class="col-sm-6 hidden-xs">
                      <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo.png" alt="...">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <!-- Slide No 2 -->
            <div class="item">
              <div class="jumbotron second">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1 class="text-center animated fadeInDown">Criminal Law </h1>
                      <p class="lead text-center animated fadeInDown delay-1">Crime Differentiation</p>
                      <p class="lead text-center animated fadeInDown delay-1">Crime of Libel Slander and Incriminating an Innocent Person</p>
                       <p class="lead text-center animated fadeInDown delay-1">Crimes against the Fundamental Laws of the State and more.... </p>
                       <div class="text-center animated fadeInDown delay-2"><?php echo CHtml::link(Shop::t('Check it Out!'), array('/videos/index', 'id' =>6), array('class' =>'btn btn-color pull-center')); ?></div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Slide No 3 -->
            <div class="item">
              <div class="jumbotron third">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <h1 class="animated slideInLeft">Labor Law</h1>
                      <p class="lead animated slideInLeft delay-1">We are always open for your questions<br /> and feature requests.</p>
                      <?php echo CHtml::link(Shop::t('Check it Out!'), array('/videos/index', 'id' =>2), array('class' =>'btn btn-color animated slideInLeft delay-2')); ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="video hidden-xs">
                                
                      </div>                
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- / Slide No 3 -->
          </div>
          <!-- Controls -->
          <a class="slideshow-arrow slideshow-arrow-prev bg-hover-color" href="#main-slideshow" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="slideshow-arrow slideshow-arrow-next bg-hover-color" href="#main-slideshow" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div> <!-- / Slideshow -->

      <!-- Intro Text -->
      <div class="container intro">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center text-orange text-shadow">LEARNING LAW THROUGH TECHNOLOGY,</h2> 
            <h2 class="text-center text-money-green text-shadow">Kaalaman ba sa Batas ang hanap mo? SAGOT NAMIN YAN! </h2>
            <h2 class="text-center text-violet text-shadow">Take the Advantages!</h2>
            <hr>
          </div>

<!-- Circle Images Advantages -->
    <div class="col-sm-12">    
        <div class="col-sm-2">
          <img alt="Powerful Speakers" src="<?php echo Yii::app()->theme->baseUrl;?>/img/14.jpg" class="img-circle img-responsive img-center" />
          <h4 class="text-center text-orange">
            Powerful speakers and relevant contents
          </h4>
        </div>
        <div class="col-sm-2">
          <img alt="Anytime Anywhere" src="<?php echo Yii::app()->theme->baseUrl;?>/img/flexibible-online-learning.jpg" class="img-circle img-responsive img-center" />
             <h4 class="text-center text-orange">
           Anytime and anywhere convinience.
         </h4>
        </div>
        <div class="col-sm-2">
          <img alt="Fast Track Lessons" src="<?php echo Yii::app()->theme->baseUrl;?>/img/OnlineLearning.jpg" class="img-circle img-responsive img-center" />
          <h4 class="text-center text-orange">
            Fast track your lessons and replay topics you want to master.
          </h4>
        </div>
        <div class="col-sm-2">
          <img alt="Rainy Season" src="<?php echo Yii::app()->theme->baseUrl;?>/img/rainy_season.jpg" class="img-circle img-responsive img-center" />
          <h4 class="text-center text-orange">
            No hassle in travelling during rainy season.
          </h4>
        </div>
        <div class="col-sm-2">
          <img alt="Travelling Expenses" src="<?php echo Yii::app()->theme->baseUrl;?>/img/commute.jpg" class="img-circle img-responsive img-center" />
          <h4 class="text-center text-orange">
            No more additional travelling expenses.
          </h4>
        </div>
        <div class="col-sm-2">
          <img alt="Save Money" src="<?php echo Yii::app()->theme->baseUrl;?>/img/Money.jpg" class="img-circle img-responsive img-center" />
          <h4 class="text-center text-orange">
            Save MONEY!
          </h4>
        </div>
      </div>
<!-- Circle Images Advantages -->


        </div> <!-- / .row -->

        <hr>

        <!-- Portfolio -->
          <div class="row portfolio">
          <div class="col-sm-4">
            <!-- Portfolio Item #1 -->
            <div class="portfolio-item">

            <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/lecturers.jpg','',array('class' => 'img-responsive'));
 
                echo CHtml::link($image,array('/Lecturers')); ?>

      
              <div class="portfolio-desc">
                <h3 class="primary-font">Powerful speakers and relevant contents</h3>
                <p class="text-muted">
                  Our group of people will surely teach you everything you want to know about the law. Our lecturers are the country's finest and leading attorneys on their respective field.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- Portfolio Item #2 -->
            <div class="portfolio-item">
             <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/review_programs.jpg','',array('class' => 'img-responsive'));
 
                echo CHtml::link($image,array('/Videos')); ?>

              
              <div class="portfolio-desc">
                <h3 class="primary-font">Our Review Programs</h3>
                <p class="text-muted">
                  We offer our users a broad knowledge about law divided into different subjects for easier access.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- Portfolio Item #3 -->
           <div class="portfolio-item">
             <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/forms.jpg','',array('class' => 'img-responsive'));
 
                echo CHtml::link($image,array('site/forms')); ?>
              <div class="portfolio-desc">
                <h3 class="primary-font">Free Legal Forms</h3>
                <p class="text-muted">
                  Looking for some legal forms? Get your legal forms for FREE! We offer templates for General Forms, Affidavits, Barangay Forms and other legal forms without paying the additional cost.
                </p>
               
              </div>
            </div>
          </div>
        </div> <!-- / .row -->
        <div class="col-sm-12">
     <h2 class="text-center text-orange text-shadow">At iSecure Online Bar Review Center, we max out your money's worth! Join us now!</h2> 
        </div>
<!-- Subscription Package-->

<div class="col-sm-12">
<h2 class="headline text-muted text-blue">
  <span class="border-muted">Postpaid Packages (Annual Subscriptions)</span></h2> 
</div>      
     <div class="col-sm-12">
      <?php  $this->widget('ext.iSecure.iSecureSubscriptionWidget'); ?>  
   </div>


<!-- Prepaid Package-->

 <div class="col-sm-12">
   <h2 class="headline text-money-green">
  <span class="border-muted">Prepaid Packages/Electronic Load</span>
  </h2> 
  </div>

    <div class="col-sm-12">
    <?php  $this->widget('ext.iSecure.iSecurePrepaidWidget'); ?>  
     <div class="col-sm-3">
 </div>


   </div> 
  </div><!-- / .wrapper -->

