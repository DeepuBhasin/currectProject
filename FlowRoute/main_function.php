<?php
include_once('database.php');
// session_start();

$now = new DateTime();
$now->setTimezone(new DateTimezone('Asia/Calcutta'));
$get_time= $now->format('Y-m-d H:i:s');
$ipaddress= $_SERVER['SERVER_ADDR'];

//database connection


//login program
$email_id=stripcslashes(htmlentities(trim($_POST['email_id'])));
$password=stripcslashes(htmlentities(trim($_POST['password'])));

$email_id=mysqli_real_escape_string($con,$email_id);
$password=md5(mysqli_real_escape_string($con,$password));

$query=mysqli_query($con,"SELECT * FROM login WHERE email_id='$email_id' AND password='$password'");
if(mysqli_num_rows($query)==1)
{
	while($ab=mysqli_fetch_array($query))
	{

		session_start();
		$_SESSION=array(
			'id'=>$ab['id'],
			'first_name'=>$ab['first_name'],
			'last_name'=>$ab['last_name'],
			'email_id'=>$ab['email_id'],
			'login_time'=>$ab['login_time'],
			'login_address'=>$ab['login_address']);
		mysqli_query($con,"UPDATE login SET login_time='$get_time',login_address='$ipaddress'WHERE id=".$ab['id']);
		header("location:dashboard.php?page=index&color=success&message=".urlencode('Welcome To Management System'));
	}
}
else
{
	header("location:index.php?page=index&color=danger&message=".urlencode('Invalid Email Id and Password'));
}	


?>