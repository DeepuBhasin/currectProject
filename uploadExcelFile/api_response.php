<?php
require('__db.php');
header('Content-type:application/json');
$sql = "SELECT asset_number,major_category,minor_catory,existing_asset_number,asset_location,asset_description,asset_name,far_qty FROM api_table";
$row = mysqli_query($con,$sql);
$row = mysqli_fetch_all($row);
if(count($row)){
	echo json_encode(['status'=>http_response_code(200),'message'=>$row]);
}else{
	echo json_encode(['status'=>http_response_code(404),'message'=>[]]);
}
?>