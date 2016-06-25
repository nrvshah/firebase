<?php
include("firebase/vendor/autoload.php");

include "vendor/autoload.php";
const DEFAULT_URL = 'https://clientorder-c086d.firebaseio.com';
const DEFAULT_TOKEN = 'nqzLNoDkxwEantLt6javB5rjhKkoy9E14azt4Qua';
const DEFAULT_PATH = '';

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

// $users = array('userId1'=>array('userId'=>'userId1','fname'=>'Vivek','lname'=>'Doshi','email'=>'vivek@ess.com','phone'=>'9173337066'),
// 	'userId2'=>array('userId'=>'userId2','fname'=>'Mak','lname'=>'Jani','email'=>'Mak@ess.com','phone'=>'9173537066'),
// 	'userId3'=>array('userId'=>'userId3','fname'=>'Shivam','lname'=>'Jadav','email'=>'Shivam@ess.com','phone'=>'5173337066'),
// 	'userId4'=>array('userId'=>'userId4','fname'=>'Riya','lname'=>'Soni','email'=>'Riya@ess.com','phone'=>'9173737066'),
// 	'userId5'=>array('userId'=>'userId5','fname'=>'Megan','lname'=>'Doshi','email'=>'Megan@ess.com','phone'=>'9193337066'),
// 	'userId6'=>array('userId'=>'userId6','fname'=>'Aish','lname'=>'Fox','email'=>'Aish@ess.com','phone'=>'9673337066'));

// $orders = array('orderId1'=>array('userId'=>'userId1','orderId'=>'orderId1','Total'=>10,'lname'=>'Doshi','Status'=>1),
// 	'orderId2'=>array('userId'=>'userId2','orderId'=>'orderId2','Total'=>20,'lname'=>'Jani','Status'=>1),
// 	'orderId3'=>array('userId'=>'userId3','orderId'=>'orderId3','Total'=>5,'lname'=>'Jadav','Status'=>1),
// 	'orderId4'=>array('userId'=>'userId4','orderId'=>'orderId4','Total'=>8,'lname'=>'Soni','Status'=>1),
// 	'orderId5'=>array('userId'=>'userId5','orderId'=>'orderId5','Total'=>9,'lname'=>'Doshi','Status'=>1),
// 	'orderId6'=>array('userId'=>'userId6','orderId'=>'orderId6','Total'=>7,'lname'=>'Fox','Status'=>1));


// foreach ($users as $key => $value) {
// 	$firebase->set("Users/$key",$value);
// }

// foreach ($orders as $key => $value) {
// 	$firebase->set("Orders/$key",$value);
// }


$userId = "userId2";

 print_r($firebase->get("Users",array('equalTo'=>array('userId'=>'userId2'))));
// $firebase->get("Orders/or",);
?>