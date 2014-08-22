<?php $this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
    'Home' => array('/site/index'),
  'About'=>array('site/about')
);

?>



  
<?php $fullName = 'Mr. Emiliano T. Legaspi, Jr.';?>
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">Vice Chairman and President</h3>
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
                     $name ='Mr. Emiliano T. Legaspi, Jr.';

                                                      $image = Yii::app()->theme->BaseUrl . '/img/default_profile.jpg';
                     
                 ?>
                
                <?php
                     echo CHtml::link(
                     CHtml::image($image, CHtml::encode($name), array('style'=>'width:190px',)), array( ), array('class' => 'img-responsive center-block',
                     ));
                ?> 
              <p class="text-muted"></p>
            </div>
        
          </div>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-7">
              
                <h2 class="primary-font"><?php echo $fullName; ?></h2>
                <p>
                <ul>
                 <li> Former member of Project Management Team of STRADCOM/LTO computerization project nationwide.</li>

<li>Fifteen (15) years of work experience in the field of Information Technology, construction, financial & banking institution, and entertainment industry.</li>

<li>Various training from Cisco, Microsoft, Sybase, Unisys and other IT systems applications.</li>

<li>An entrepreneur and management consultant</li>

<li>Finished Masters in Business Administration (MBA) from New Era University</li>

<li>Degree of Bachelor of Science and Accountancy</li>

</ul>
                </p>
                             
              </div>
              <div class="col-sm-5">

               </div>
              <div class="col-sm-12 shopping-cart user-cart">
                <hr class="arrow-down">
                 <?php //$this->renderPartial('application.modules.shop.views.shoppingCart.view'); ?>

              </div>
            </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->

    </div> <!-- / .wrapper -->
