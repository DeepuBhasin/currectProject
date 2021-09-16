<?php
$con = mysqli_connect("localhost", "root", "", "radzi_database");
if (!$con) {
	die("<h2>Database is Not Connected</h2>");
}

$from_list = array(0 => '+19894799590'); //Your Twilio Phone Number
$sid = 'ACa97ec5b67df9d5218763e446cbecab13'; //Your Twilio API Account SID
$auth = '58a8116a9638ec3844c4fb200d448502'; //Your Twilio API Account Auth Token

$now = new DateTime();
$now->setTimezone(new DateTimezone('Asia/Calcutta'));
$get_time = $now->format('Y-m-d H:i:s');


// $con=mysqli_connect("localhost","wavelinx_order","Deepu_9915099247","wavelinx_order");
