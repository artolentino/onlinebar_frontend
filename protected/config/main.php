<?php

// uncomment the following to define a path alias
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../components/helpers.php');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'iSecure-PhilJust Online Law & Bar Review',
    'theme' => 'isecure',
    // preloading 'log' component
    'preload' => array('log'),
    
    // path aliases
    'aliases' => array(
         'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        //'bootstrap' => realpath(__FILE__ . '/../extensions/bootstrap'), // change this if necessary
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        //'bootstrap.helpers.TbHtml',
        'application.vendor.*',
        'ext.YiiMailer.YiiMailer',
        'application.extensions.phpass.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.shop.models.*',
        'application.modules.shop.components.*',
    ),

            'modules'=> array(
            'shop' => array('currencySymbol' => 'PHP',
             'debug' => 'true'),

             'user' => array(
            
            'profileRelations' => array(
                'region' => array(CActiveRecord::BELONGS_TO, 'region', 'region_code'),
                'comment' => array(CActiveRecord::BELONGS_TO, 'Comment', 'author'),

            
            ),
            'tableUsers' => 'tbl_users',
            'tableProfiles' => 'tbl_profiles',
            'tableProfileFields' => 'tbl_profiles_fields',
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'root',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
            'Paypal' => array(
            'class' => 'application.components.Paypal',
            'apiUsername' => 'artolentino_api1.gmail.com',
            'apiPassword' => 'BTD76JRKELF373HA',
            'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AcFnfO61wh2f4rV9s6WEEC093cG7',
            'apiLive' => false,
            'returnUrl' => 'paypal/confirm/', //regardless of url management component
            'cancelUrl' => 'paypal/cancel/', //regardless of url management component
            // Default currency to use, if not set USD is the default
            'currency' => 'PHP',
            // Default description to use, defaults to an empty string
            //'defaultDescription' => '',
            // Default Quantity to use, defaults to 1
            //'defaultQuantity' => '1',
            //The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
            //'version' => '3.0',
            ),

            'hasher' => array(
            'class' => 'Phpass',
            'hashPortable' => false,
            // 'hasCostLog2'=>8,
            ),
            'phpThumb' => array(
                'class' => 'ext.EPhpThumb.EPhpThumb',
            ),


           'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'nextPageLabel' => 'Next',
                    'prevPageLabel' => 'Prev',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    )
                )
            )
        ),

        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),
        'user' => array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
          // uncomment the following to use a MySQL database
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=onlinebar_isecure',
            'emulatePrepare' => true,
            'enableParamLogging' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info, trace',
                    'logFile' => 'infoMessages.log',
                ),

                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace,log',
                    'categories' => 'system.db.CDbCommand',
                    'logFile' => 'db.log',
                ), 
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'warning',
                ),
            ),
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
    ),
    //------- End component declaration----------------------//
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'artolentino@gmail.com',
        'contactNumber'=>'',
        'contactEmail'=>'contact@onlinebarreview.co',
        'Telephone'=>'+63 02 415 8596',
        'Facebook'=>'http://www.facebook.com/onlinebarreview/',
        'Tweeter'=>'#',
        'GooglePlus'=>'#',
        'Pinterest'=>'#',
        'GitHub'=>'#',
        'Instagram'=>'instagram@onlinebarreview',     
        'listPerPage' => 21,
        
    ),
);
