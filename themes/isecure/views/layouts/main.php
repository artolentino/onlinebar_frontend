<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ar Tolentino">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/img/favicon.png">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/color-styles.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/ui-elements.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/jquery.Jcrop.css" rel="stylesheet">


    
    <!-- Resources -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
    
   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
  </head>

  <body class="body-red">
  
    <!-- Extra Bar -->
    <div class="mini-navbar mini-navbar-dark hidden-xs">
      <div class="container">
        <div class="col-sm-12"> 
         <?php if(!Yii::app()->user->isGuest && UserBalances::model()->isSubscriber(Yii::app()->user->id)) { ?>
             <a href="#" class="first-child"><i class="fa fa-video-camera"></i>  You have until [ place Date here ] video streaming time left in your account</span></a>
                
             <?php } ?>

         <?php if(!Yii::app()->user->isGuest && !UserBalances::model()->isSubscriber(Yii::app()->user->id)) { ?>
             <a href="#" class="first-child"><i class="fa fa-video-camera"></i>  You have  <?php echo  Videos::model()->formatDuration(Yii::app()->session['user_balance']) ?>    video streaming time left in your account</span></a>
                
             <?php } ?>    
          
          
          <?php  echo Yii::app()->user->isGuest ?  CHtml::link(CHtml::tag('i', array('class'=>'fa fa-arrow-circle-down'), ' Sign Up'),Yii::app()->getModule('user')->registrationUrl,array('class' => 'pull-right')): '';?> 
          <?php echo Yii::app()->user->isGuest ? CHtml::link(CHtml::tag('i', array('class'=>'fa fa-sign-in'), ' Sign In'),Yii::app()->getModule('user')->loginUrl,array('class' => 'pull-right')): '';?> 
         
           <?php if(!Yii::app()->user->isGuest && !UserBalances::model()->isSubscriber(Yii::app()->user->id) && (Yii::app()->session['user_balance'] <= 0)) {
                 echo CHtml::button('Activate your prepaid card', array('submit' => array('/user_package/activate'),'class' => 'btn btn-primary btn-small pull-right')); 
             }
             ?> 
            <?php 
           if(!Yii::app()->user->isGuest) {
           $products = Shop::getCartContent();

      
            if($products) {
               echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-shopping-cart'), ' View your Cart'),array('//shop/shoppingCart/view'), array('class' => 'pull-right')) ;
             }
           }
             ?>
             
          <?php if(!Yii::app()->user->isGuest) {
                echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-user'), '  Welcome '. User::model()->getFullname()) ,Yii::app()->getModule('user')->profileUrl ,array('class' => 'pull-right')) ;
                
                echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-sign-out'), ' Sign Out'),Yii::app()->getModule('user')->logoutUrl ,array('class' => 'pull-right')) ;
             }  ?>

             


          
        </div>
      </div>
    </div>

    <div class="navbar navbar-dark navbar-static-top" role="navigation">
      <div class="container">

        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
            <?php echo CHtml::link('<i class="fa fa-info-circle"></i> iSecure-Philjust <span class="hidden-sm">Law & Bar Review Center</span>',
                                   array('site/index'),
                                   array('class' => 'navbar-brand')); 
            ?>
            
        </div> <!-- / Navbar Header -->

        <!-- Navbar Links -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li <?php echo activate('site');?> ><?php echo CHtml::link('Home',
                                   array('/site/index'),
                                   array('class' => 'bg-hover-color')); 
            ?></li>
            <li <?php echo activate('videos');?>>
              <a href="#" class="dropdown-toggle bg-hover-color" data-toggle="dropdown">Review Programs<b class="caret"></b></a>
              <?php  $this->widget('ext.iSecure.iSecureProgramsMenu'); ?>
                
            </li>
            <li <?php echo activate('lecturers');?>>
              <a href="#" class="dropdown-toggle bg-hover-color" data-toggle="dropdown">Our Lectures <b class="caret"></b></a>
              <?php  $this->widget('ext.iSecure.iSecureLecturersMenu'); ?>
            </li>
             <li <?php echo activate('enroll');?> ><?php echo CHtml::link('Learn Now!',
                                   array('/shop'),
                                   array('class' => 'bg-hover-color')); 
            ?></li>
            
            <li <?php echo activate('page');?> ><?php echo CHtml::link('About Us',
                                   array('/site/about'),
                                   array('class' => 'bg-hover-color')); 
            ?></li>
          </ul>

          <!-- Search Form (xs) -->
          <form class="navbar-form navbar-left visible-xs" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Go!</button>
          </form> <!-- / Search Form (xs) -->

        </div> <!-- / Navbar Links -->
      </div> <!-- / container -->
    </div> <!-- / navbar -->
 
    <?php echo $content; ?>

     <!-- Footer -->
    <footer class="footer-white">
      <div class="container">
        <div class="row">
          <!-- Contact Us -->
          <div class="col-sm-4">
            <h3 ><span>Contact Us</span></h3>
            <div class="content">
              <p>
              5th Floor Room 504 1186 APC Building<br />
              Quezon, Avenue, Quezon City<br />
              Phone: <?php echo Yii::app()->params['Telephone'];?><br />
              Fax: <?php echo Yii::app()->params['Telephone'];?><br />
              Email: <?php echo CHtml::mailto(Yii::app()->params['adminEmail']); ?>
              </p>
            </div>
          </div>
          <!-- Social icons -->
          <div class="col-sm-4">
            <h3><span>Go Social</span></h3>
            <div class="content social">
              <p>Stay in touch with us:</p>
              <ul class="list-inline">
                <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-twitter'), ''), '#', array('class'=>'twitter')); ?></li>
                <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-facebook'), ''), 'http://www.facebook.com/onlinebarreview/', array('class'=>'facebook')); ?></li>  
                <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-pinterest'), ''), '#', array('class'=>'pinterest')); ?></li>  
                 <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-github'), ''), '#', array('class'=>'github')); ?></li>
                 <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-linkedin'), ''), '#', array('class'=>'linkedin')); ?></li>
                <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-instagram'), ''), 'instagram@onlinebarreview', array('class'=>'instagram')); ?></li>
                <li><?php echo CHtml::link(CHtml::tag('i', array('class'=>'fa fa-google-plus'), ''), '#', array('class'=>'google-plus')); ?></li>
                
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- Subscribe -->
          <div class="col-sm-4">
            <h3><span>Subscribe</span></h3>
            <div class="content">
              <p>Enter your e-mail below to subscribe to our free newsletter.<br />We promise not to bother you often!</p>
            
                <div class="row">
                     <div class="col-sm-12">
                    <?php echo CHtml::beginForm(array('/EmailSubscriptions/create',),'post',array('class' =>'form-inline')); ?>
              
                    <div class="form-group">
                       <label class="sr-only" for="subscribe-email">Email address</label>
                       <?php echo CHtml::emailField('subscribe-email', '', array('class' => 'form-control','placeholder'=>'Enter email', )) ?>
                    </div>  
                        <?php echo CHtml::submitButton('Ok',array('class' =>'btn btn-default'));?>
                   <?php echo CHtml::endForm(); ?> 
                 </div>

                </div>
         
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <!-- Copyrights -->
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; Ar Tolentino,iSecure Integrated Business Solution, Inc.2014. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p><span class ="pull-right">We Accept: <img src="<?php echo Yii::app()->baseUrl . '/images/paymentbar.png' ?>" width="229" height="32" alt="Payment" /></span>
          </div>
        </div>
      </div>
    </footer>

   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/scrolltopcontrol.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.sticky.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.Jcrop.min.js"></script>
    
   
    
        
</body></html>
