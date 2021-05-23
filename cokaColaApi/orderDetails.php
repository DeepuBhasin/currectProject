<?php
include_once '__db.php';	

	if($_SERVER['REQUEST_METHOD']!=='GET'){
		
		die(showMessage([400,1,'Request Method Should be GET']));
	
	}
	if(!isset($_GET['orderid'])){
		die(showMessage([403,1,'Missing of Arguments : Ordersid']));	
	}

	$orderid =  mysqli_real_escape_string($conn,dataFilter($_GET['orderid']));
	

	$sql1 = "SELECT oc.order_id,oc.store_name,oc.store_id,oc.date_added,oc.comment,oc.user_agent,oc.customer_id,oc.firstname,oc.lastname,oc.email,oc.telephone,oc.commission,oc.total,oc.shipping_method,oc.shipping_address_1,oc.email,oc.shipping_city,oc.shipping_zone,oc.shipping_postcode,oc.payment_method,oc.payment_company,oc.payment_address_1,ocs.name as status
FROM oc_order as oc INNER JOIN oc_order_status as ocs ON ocs.order_status_id=oc.order_status_id  WHERE oc.language_id=ocs.language_id and oc.order_id=$orderid";
	
	$sql1_data = mysqli_query($conn,$sql1);
	
	$sql1_rows = mysqli_num_rows($sql1_data);
	
	if($sql1_rows==0){
		die(showMessage([200,1 ,'Data is not Available']));	
	}

	$rows = mysqli_fetch_all($sql1_data,MYSQLI_ASSOC)[0];

$data=[
	'id'=>$rows['order_id'],
	'code'=>'IND'.$rows['order_id'],
	'erpCode'=>$rows['order_id'],
	'status'=>$rows['status'],
	'vendor'=>[
				'name'=>$rows['store_name'],
				'ubigeo'=>null,
				'erpcode'=>$rows['store_id']
			  ],
	'createdAt'=>$rows['date_added'],
	'creationDate'=>$rows['date_added'],
	'creationTime'=>$rows['date_added'],
	'extraFields'=>null,
	'channel'=>'Ecommerce',
	'dedicationMessage'=>$rows['comment'],
	'userAgent'=>$rows['user_agent'],
	'customer'=>[
					'id'=>$rows['customer_id'],
					'firstname'=>$rows['firstname'],
					'lastname'=>$rows['lastname'],
					'email'=>$rows['email'],
					'phone'=>$rows['telephone'],
					'vendorCode'=>null,
					'erpCode'=>null,
				]		  



	];
	
	die(showMessage([200,0,$data]));
?>