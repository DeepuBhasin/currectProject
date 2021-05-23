<?php
include_once '__db.php';	

	if($_SERVER['REQUEST_METHOD']!=='POST')
	{
		die(showMessage([400,1,'Request Method Should be POST']));
	}

	if( (!isset($_POST['orders'])) || (!isset($_POST['status']))){

			die(showMessage([403,1,'Missing of Arguments : Orders or Status']));	
	}


	$orderArray =explode(',',$_POST['orders']);

	foreach ($orderArray as $key=>$value)
	{
		$orderArray[$key] = mysqli_real_escape_string($conn,dataFilter($value));
	}	
	$status =  strtolower(mysqli_real_escape_string($conn,dataFilter($_POST['status'])));
	

	foreach($orderArray as $key=>$value){
		$sql = "UPDATE oc_order_status as ocs INNER JOIN oc_order as oc ON ocs.order_status_id=oc.order_status_id SET ocs.name='$status' where oc.order_id=$value";
		$check = mysqli_query($conn,$sql);

		if($check){
			$responseArray[$key]="Order id : ".$value." Updated Successfully";
		}else{
			$responseArray[$key]="Order id : ".$value." Updated Failed";
		}	

	}
	
	die(showMessage([200,0,$responseArray]));
?>