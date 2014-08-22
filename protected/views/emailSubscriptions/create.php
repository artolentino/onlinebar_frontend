<?php
/* @var $this EmailSubscriptionsController */
/* @var $model EmailSubscriptions */

$this->breadcrumbs=array(
	'Email Subscriptions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmailSubscriptions', 'url'=>array('index')),
	array('label'=>'Manage EmailSubscriptions', 'url'=>array('admin')),
);
?>

<h1>Create EmailSubscriptions</h1>

<?php 


$model=new EmailSubscriptions;
$model->email = $_POST['subscribe-email'];

if($model->save())
{
    echo 'Successfully saved!';// data is valid and is successfully inserted/updated
    $mail = new YiiMailer();
    
    $mail->Mailer='smtps'; 
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure= 'ssl';
    $mail->Username = 'artolentino@gmail.com'; 
    $mail->Password = 'ysaac1214';  
    $mail->setView('contact');  
    $mail->setData(array('message' => 'Thanks you for your subscriptions', 'name' => 'iSecure Integrated Business Solutions', 'description' => 'Contact form'));    
    $mail->setLayout('mail');
    $mail->setFrom('artolentino@gmail.com', 'Ar Tolentino');
    $mail->setTo($_POST['subscribe-email']);
    $mail->setSubject('Newsletter Subscription');


    if ($mail->send()) {
    	   Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
        }else {
           Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());

        }
}else{

	print_r($model->getErrors());
    echo 'There is an error!';// data is invalid. call getErrors() to retrieve error messages
}




//$this->renderPartial('_form', array('model'=>$model)); 



?>