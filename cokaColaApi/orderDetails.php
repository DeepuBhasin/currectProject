<?php
include_once '__db.php';	

	if( (!isset($_GET['deliveryDate'])) || (!isset($_GET['status'])) || (!isset($_GET['page'])) || (!isset($_GET['limit']))){

			die(showMessage(['status'=>403,'Error Message'=>'Missing of Arguments: Deivery Date or Status or Page or Limit']));	
	}


	$deliveryDate =  mysqli_real_escape_string($conn,dataFilter($_GET['deliveryDate']));
	$status =  strtolower(mysqli_real_escape_string($conn,dataFilter($_GET['status'])));
	$page =  mysqli_real_escape_string($conn,dataFilter($_GET['page']));
	$limit =  mysqli_real_escape_string($conn,dataFilter($_GET['limit']));

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
?>