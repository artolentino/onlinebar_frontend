<?php $this->pageTitle=Yii::app()->name ;
$this->breadcrumbs=array(
    'Home' => array('/site/index'),
	'About'=>array('site/about')
);

?>



	
<?php $fullName = 'Justice Artemio G. Tuquero';?>
<!-- Wrapper -->
    <div class="wrapper">

      <!-- Topic Header -->
      <div class="topic">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3 class="primary-font">The Chairman</h3>
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
                     $name ='Justice Artemio G. Tuquero';

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
                  <b>Department of Justice:</b><br>

<ul>
<li>Private Secretary, Presiding Justice Jose P. Bengzon Court of Appeals</li>

<li>Attorney-Researcher, Court of AppealsJustice Carmelino G. Alvendia</li>

<li>Assistant Fiscal, Office of the City Fiscal of Manila</li>

<li>Special Assistant, Justice Minister Ricardo C. Puno</li>

<li>Chief State Prosecutor, Department of Justice</li>

<li>Associate Justice, Court of Appeals</li>

<li>Secretary of Justice, Department of Justice</li>
</ul>

<b>Others:</b><br\>

<ul>
<li>Special Attorney, Commission on Election, 1957, 1959 and 1961 Elections</li>

<li>Legal Council, Manila Economic and Cultural Office (MECO) 2002-2003</li>

<li>NominatedAmbassador to Canada by PGMA in 2001</li>

<li>President, Universidad de Manila, Febuary,2009-2010</li>

<li>Dean of College of Law, Manuel L Quezon University 2003-2009</li>

<li>Dean of College of Law, University of the East 1993-1996</li>

<li>Director, University of the East, (Foundationfor Research & Advanced Studies)</li>

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
