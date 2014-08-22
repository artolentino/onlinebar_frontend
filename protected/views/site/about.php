<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - About Us';
$this->breadcrumbs=array(
	'About',
);
?>
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">About Us</h3>
            </div>
            <div class="col-sm-8">
              <ol class="breadcrumb pull-right hidden-xs">
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="container">

        <div class="row about-us-p">
          <div class="col-sm-7">
            <h2 class="headline first-child text-color">
              <span class="border-color">iSecure-Philjust Law & Bar Review Center</span>
            </h2>
            <p>
                <b>iSecure Integrated Business Solution Inc.</b>, was registered at the Securities and Exchange Commission on October 27, 2006. iSecure is a Technical and Business Management firm established with primary objective of providing Quality Business Solutions through Information Technology. Our Company is Driven by Concerted Ideas that will Bring a Delightfully Refreshing New Light to Acclimate our Consumers in Today’s Chaotic World of Business. We Strongly Adhere Towards <b>ADAPTABILITY, INTEGRITY, and QUALITY SERVICE.</b><p>

            <ul>
                <li>Adaptability – breaking new ground in the business world by providing innovative solutions to attune our consumers need with everyday demands.</li>

                <li>Integrity – as we are in strict adherence to incorruptible code of values that will keep every cent you entrust to us.</li>

                <li>Quality Service – in making everything work together to deliver our promise to you…</li><p>
</ul>
            <b>iSecure Integrated Business Solution Inc.</b>, is managed by several dynamic professionals with more than 15 years of work experiences in their field of expertise involving Business Management, Engineering Services, Software Development Solution, Concept Planning and Development, Project Management, and Project Implementation.
            

            <hr>
            
          </div>
          <div class="col-sm-5">
             <div class="flex-video">
                
              <iframe src="http://www.whoa.ph/index.php/api/embed?account=onlinebar&video=avp-1" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
            </div>
          </div>
        </div> <!-- / .row -->
        <div class="row our-team-p">
          <div class="col-sm-12">
            <h2 class="headline text-color">
              <span class="border-color">Our Team</span>
            </h2>
            <div class="row">
              <div class="col-sm-2">
                <div class="team-member text-center">
                      <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/chairman')); ?>
                                  Justice Artemio G. Tuquero
                  <p class="text-muted">Chairman of the Board</p>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="team-member text-center">
                <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/president')); ?>
                  Mr. Emiliano T. Legaspi, Jr.
                  <p class="text-muted">Vice Chairman and President</p>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="team-member text-center">
                 <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/trasurer')); ?>
                 Dr. Isabel Lao Umahon – Legaspi
                  <p class="text-muted">Treasurer</p>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="team-member text-center">
                  <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/finance')); ?>
                  Arnold C. Ocampo
                  <p class="text-muted">Chief Finance Officer - CFO</p>
                </div>
              </div>
              
              </div>
              <div class="col-sm-2">
                <div class="team-member text-center">
                <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/network')); ?>
                  Ernersto J. Rufino Jr.
                  <p class="text-muted">Network Infrastructure & Security Director</p>
                </div>
              </div>
                
                <div class="col-sm-2">
                <div class="team-member text-center">
                 <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/it')); ?>
                  Mr. Jose L. Carlos, Jr., PH.D.
                  <p class="text-muted">IT - Consultant</p>
                </div>
                </div>    
                    <div class="col-sm-2">
                <div class="team-member text-center">
                 <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/developer')); ?>
                  Engr. Gabriel A. Tolentino
                  <p class="text-muted">Software/Web Developer</p>
                </div>
                    </div>
                        
                        <div class="col-sm-2">
                <div class="team-member text-center">
                <?php $image = CHtml::image(Yii::app()->theme->baseUrl.'/img/default_profile.jpg',  '..' ,array('class' => 'img-responsive center-block'));
                       echo CHtml::link($image,array('site/legal')); ?>
                  Atty. Arturo Mercader
                  <p class="text-muted">Legal Consultant</p>
                </div>
                        </div>
              </div> 
            </div> <!-- / .row -->
          </div>
        </div> <!-- / .row -->

      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
