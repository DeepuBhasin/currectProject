<?php

	// creating Response Message 
		function errorMessage(array $data){
			return json_encode([
					'errors'=>array('message'=>$data[1],'code'=>$data[0])
				]
			);
		}	
		function successMessage($data){
			return json_encode($data);
		}
	
	// Checking api-key in header Section 
		header("Content-type: application/json; charset=utf-8");
		$headers = apache_request_headers();
		$apiKey=$headers['api-key'];

		if((!isset($apiKey)) || (empty($apiKey)))
		{
			die(showMessage([403,1,'Required Api-Key for Authentication']));	
		}

	// Checking api-key in header Section 

		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$databasename = 'bigcola_oc';
		$conn = @mysqli_connect($hostname,$username,$password,$databasename);

		if(!$conn){

			die(showMessage([403,1 ,@mysqli_connect_error()]));
		}



	// filtering Data 

	function dataFilter($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		return $data;
	 }


	 // checking Valid Api key in Database $headers['api-key']

	 	$apiKey = mysqli_real_escape_string($conn,dataFilter($apiKey));

	    $sql = "SELECT `api_id`,`key` FROM oc_api WHERE `key`='$apiKey'";

		$check = mysqli_query($conn,$sql);

		$numberOfRows = mysqli_num_rows($check);

		if($numberOfRows==0){
			die(showMessage([403,1 ,'Invalid Api-key']));		
		}






?>