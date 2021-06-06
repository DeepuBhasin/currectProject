<?php
include_once '__db.php';	

	function getAddressData($type=null){
			$url = parse_url($_SERVER['REQUEST_URI'],$type);
	 		$url_array = explode('/',$url);
	 		$endString = end($url_array);
	 		return $endString;
 		
	}




	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$endString = strtolower(getAddressData(PHP_URL_PATH));

 		if($endString!='statuses')
 		{
 			die(showMessage([400,1,'File name is Invalid']));
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

	}
	else if($_SERVER['REQUEST_METHOD']=='GET')
	{
		if(strlen(getAddressData(PHP_URL_QUERY))>0){
			
			$endData = getAddressData(PHP_URL_QUERY);
			
			if(preg_match('/deliveryDate=/', $endData)==0 || preg_match('/status=/', $endData)==0 || preg_match('/page=/', $endData)==0 || preg_match('/limit=/', $endData)==0)
				{
					die(showMessage([403,1,'Missing of Arguments: Deivery Date or Status or Page or Limit']));	
				}
			
			$endData = explode("&",$endData);
			
			foreach($endData as $key=>$value)
			{
				$endData[$key] = str_replace(['deliveryDate=','status=','page=','limit='],'',$value);
			}
			$deliveryDate =  mysqli_real_escape_string($conn,dataFilter($endData[0]));
			$status =  strtolower(mysqli_real_escape_string($conn,dataFilter($endData[1])));
			$page =  mysqli_real_escape_string($conn,dataFilter($endData[2]));
			$limit =  mysqli_real_escape_string($conn,dataFilter($endData[3]));

			$sql1 = "SELECT count(oc.order_id) as count FROM oc_order oc INNER JOIN oc_order_status ocs ON oc.order_status_id=ocs.order_status_id where date(oc.date_added) Between date('$deliveryDate') and date('$deliveryDate') and ocs.name Like '%$status%' and oc.language_id=ocs.language_id";

			
			$sql1_data = mysqli_query($conn,$sql1);
			

			// for pagination 
				$total_records  =(int) mysqli_fetch_all($sql1_data,MYSQLI_ASSOC)[0]['count'];		// getting total count from Database
				$limit = ($limit>0)?$limit:1;													// record Per page 
				$page = ($page>0)?$page:1;														// Current page 
				$offset=($page-1)*$limit;														// from where we will start the record
				$total_page = ceil($total_records/$limit);										// total Number of Pages

			// end of paggination 


				if($page<$total_page){
					$next_page = true;
				}else {
					$next_page = false;
				}
				
				if($page>1){
					$previous_page = true;
				}else{
					$previous_page = false;
				}

				$page_info=[
					'page'=>$page,
					'pages' =>$total_page,
					'total'	=>$total_records,
					'hasNextPage' => $next_page,
					'hasPrevPage' => $previous_page
				];
			
			$sql2 = "SELECT oc.order_id,oc.store_name,oc.total,oc.date_added,ocs.name FROM oc_order oc INNER JOIN oc_order_status ocs ON oc.order_status_id=ocs.order_status_id where date(oc.date_added) Between date('$deliveryDate') and date('$deliveryDate') and ocs.name Like '%$status%' and oc.language_id=ocs.language_id ORDER BY oc.date_added ASC LIMIT $limit OFFSET $offset";
			$sql2_data = mysqli_query($conn,$sql2);
			$sql2_rows = mysqli_num_rows($sql2_data);
			
			if($sql2_rows==0){
				die(showMessage([200,1 ,'Data is not Available']));	
			}

			$rows = mysqli_fetch_all($sql2_data,MYSQLI_ASSOC);
			
			$loopCount = count($rows);

			$items = [];

			for($i=0;$i<$loopCount;$i++){
				$items[]=array(
					'id'=>$rows[$i]['order_id'],
					'code'=>'IND'.$rows[$i]['order_id'],
					'erpCode'=>$rows[$i]['order_id'],
					'status'=>$rows[$i]['name'],
					'vendor'=>$rows[$i]['store_name'],
					'total'=>$rows[$i]['total'],
					'createdAt'=>$rows[$i]['date_added'],
					'deliveryDate'=>$rows[$i]['date_added'],
					); 
			}
			die(showMessage([200,0,['items'=>$items,'pageinfo'=>$page_info]]));
			
		
		}
		else if(strlen(trim(getAddressData(PHP_URL_PATH)))>0)
		{
			$endString  = getAddressData(PHP_URL_PATH);
			if (!preg_match('/^[0-9]+$/', $endString)) 
			{
				die(showMessage([403,1,'Data type of Order id Should Numeric']));	
	 		}

			if(!isset($endString))
			{
				die(showMessage([403,1,'Missing of Arguments : Ordersid']));	
			}

			$orderid =  mysqli_real_escape_string($conn,dataFilter($endString));
			

			$sql1 = "SELECT oc.order_id,oc.store_name,oc.store_id,oc.date_added,oc.comment,oc.user_agent,oc.customer_id,oc.firstname,oc.lastname,oc.email,oc.telephone,oc.commission,oc.total,oc.shipping_method,oc.shipping_address_1,oc.email,oc.shipping_city,oc.shipping_zone,oc.shipping_postcode,oc.payment_method,oc.payment_company,oc.payment_address_1,ocs.name as status,oo.order_product_id
		FROM oc_order as oc INNER JOIN oc_order_status as ocs ON ocs.order_status_id=oc.order_status_id INNER JOIN oc_order_option as oo ON oo.order_product_id=oc.order_id  WHERE oc.language_id=ocs.language_id and oc.order_id=$orderid";
			
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
						],
			'lineItems'=>[
					'id'=>$rows['order_product_id'],
					'quantity'=>null,
					'price'=>null,
					'name'=>null,
					'presentation'=>null,
					'sku'=>null,
					'erpCode'=>null,
					'adjustmentsTotal'=>null,
			],
			'allAdjustments'=>[],
			'pricing'=>[
							'adjustmentsTotal'=>null,
							'subtotal'=>null,
							'tax'=>null,
							'deliveryCost'=>null,
							'total'=>$rows['total'],	
						],
			'shipping'=>[
							'name'=>$rows['shipping_method'],
							'deliveryDate'=>'',
							'deliveryAddress'=>[
													'id'=>null,
													'address'=>$rows['shipping_address_1'],
														'erpCode'=>null,
													'apartment'=>null,
													'reference'=>null,
													'coordinates'=>null,
													'contactPerson'=>$rows['firstname'].' '.$rows['lastname'],
													'contactPhone'=>$rows['telephone'],
													'contactDocumentNumber'=>null,
													'contactEmail'=>$rows['email'],
													'localityTree'=>[
																		'division'=>$rows['shipping_city'],
																		'name'=>$rows['shipping_zone'],
																	],

												],
							'territory'=>[
												'name'=>$rows['shipping_postcode'],
												'metadata'=>[
														'RUTA'=>null,
														'ZONA'=>null,
														'MODULO'=>null,
														'COMPANIA'=>null,
														'SUCURSAL'=>null,
														'DESCOMPAN'=>null,
														'DESUCURSAL'=>null,
										]					

						],
			'payment'=>[
							'name'=>$rows['payment_method'],
							'transactionId'=>null,
						],
			'invoicing'=>[
							'name'=>null,
							'documentNumber'=>null,
							'fiscalName'=>$rows['payment_company'],
							'fiscalAddress'=>$rows['payment_address_1'],
							'email'=>$rows['email'],

						],
			'creator'=>[
							'name'=>null,
							'erpCode'=>null,
					   ]						




				],
				];
				die(showMessage([200,0,$data]));
			}else
			{
				die(showMessage([403,1,'Missing of Arguments']));	
			}
	}else
	{
		die(showMessage([400,1,'Access Denied']));
	}
?>