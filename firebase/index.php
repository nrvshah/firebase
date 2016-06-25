<?php
include("firebase/vendor/autoload.php");
include("php-slim/vendor/autoload.php");

const DEFAULT_URL = 'https://clientorder-c086d.firebaseio.com';
const DEFAULT_TOKEN = 'nqzLNoDkxwEantLt6javB5rjhKkoy9E14azt4Qua';
const DEFAULT_PATH = '';

$app = new \Slim\Slim();
$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

/**
	This function will respond to 
	http://domainname/firebase/index.php/getuser/userId/{userId}
	e.g : http://eternalsoft.in/firebase/index.php/getuser/userId/userId2

	Return : 
		On Success : User Detail
		On Failure : Error Message 
 **/
$app->get('/getuser/userId/:userId', function ($userId) use($firebase) {
    $response = $firebase->get("Users/$userId");
    if($response=="null")
    {
    	$data['error'] = "User with userId : $userId not found";
    	echo json_encode($data);
    }
    else
    {
    	echo $response;
    }
});

/**
	This function will respond to 
	http://domainname/firebase/index.php/getorder/orderId/{orderId}
	e.g : http://eternalsoft.in/firebase/index.php/getorder/orderId/orderId1

	Return : 
		On Success : Order Detail + User Detail
		On Failure : Error Message 
 **/
$app->get('/getorder/orderId/:orderId', function ($orderId) use($firebase) {
	$data = array();
    $response = $firebase->get("Orders/$orderId");
    if($response=="null")
    {
	    $data['error'] = "Order with orderId : $orderId not found";
	}
	else
	{
		$data['order'] = json_decode($response,true);
		$data['user'] = json_decode($firebase->get("Users/".$data['order']['userId']),true);	
	}
    echo json_encode($data);
});


/**
	This function will respond to 
	http://domainname/firebase/index.php/cancelorder/orderId/{orderId}
	e.g : http://eternalsoft.in/firebase/index.php/cancelorder/orderId/orderId1

	Return : 
		On Success : Success Message
		On Failure : Error Message 
 **/
$app->get('/cancelorder/orderId/:orderId', function ($orderId) use($firebase) {
	$data = array();
    $response = $firebase->get("Orders/$orderId");
    if($response=="null")
    {
	    $data['error'] = "Order with orderId : $orderId not found";
	}
	else
	{
		$order_data['order'] = json_decode($response,true);
		if($order_data['order']['Status']==2)
		{
			$data['error'] = "Order with orderId : $orderId is already cancelled";
		}
		else
		{
			$firebase->update("Orders/$orderId",array('Status'=>2));
			$data['success'] = "Order with orderId : $orderId cancelled successfully";			
		}
	}
    echo json_encode($data);
});

$app->run();
?>