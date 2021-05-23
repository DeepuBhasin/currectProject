<?php

	// creating Response Message 
		function showMessage(array $data){
			return json_encode($data);
		}	
	
	// Checking api-key in header Section 
		$headers = apache_request_headers();
		
		if((!isset($headers['api-key'])) || (empty($headers['api-key'])))
		{
			die(showMessage(['Status'=>403,'Error'=>1 ,'Message'=>'Required Api-Key for Authentication']));	
		}

	// Checking api-key in header Section 

		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$databasename = 'bigcola_oc';
		$conn = @mysqli_connect($hostname,$username,$password,$databasename);

		if(!$conn){

			die(showMessage(['status'=>403,'Error'=>1 ,'Message'=>@mysqli_connect_error()]));
		}



	// filtering Data 

	function dataFilter($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	 }


	 // checking Valid Api key in Database 
	 	$apiKey = mysqli_real_escape_string($conn,dataFilter($headers['api-key']));

	    $sql = "SELECT `api_id`,`key` FROM oc_api WHERE `key`='$apiKey'";

		$check = mysqli_query($conn,$sql);

		$numberOfRows = mysqli_num_rows($check);

		if($numberOfRows==0){
			die(showMessage(['status'=>403,'Error'=>1 ,'Message'=>'Invalid Api-key']));		
		}






?>