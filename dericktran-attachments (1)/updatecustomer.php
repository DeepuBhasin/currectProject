<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<?php
$xml = simplexml_load_file('customers.xml');
if (!isset($_POST['add'])) {
    header('location:newcustomer.php?status=error&&message=' . urlencode('Access Denined'));
}

//CUSTOMER
$id = (int) $_POST['id'];
$titleValue =  isset($_POST['customer_title']) ? addslashes($_POST['customer_title']) : '';
$firstnameValue = isset($_POST['customer_firstname']) ? addslashes($_POST['customer_firstname']) : '';
$middlenameValue = isset($_POST['custonmer_middlename']) ? addslashes($_POST['custonmer_middlename']) : '';
$lastnameValue = isset($_POST['customer_lastname']) ? addslashes($_POST['customer_lastname']) : '';
$streetValue = isset($_POST['customer_street']) ? addslashes($_POST['customer_street']) : '';
$suburbValue = isset($_POST['customer_suburb']) ? addslashes($_POST['customer_suburb']) : '';
$postcodeValue = isset($_POST['customer_postcode']) ? addslashes($_POST['customer_postcode']) : '';
$stateValue = isset($_POST['customer_state']) ? addslashes($_POST['customer_state']) : '';
$phoneNoValue = isset($_POST['customer_phoneNo']) ? addslashes($_POST['customer_phoneNo']) : '';
$phoneNo1Value = isset($_POST['customer_phoneNo1']) ? addslashes($_POST['customer_phoneNo1']) : '';
$phoneNo2Value = isset($_POST['customer_phoneNo2']) ? addslashes($_POST['customer_phoneNo2']) : '';


$data = $xml->customerInfo[$id];

$data->name->title = $titleValue;
$data->name->firstname = $firstnameValue;
$data->name->middlename = $middlenameValue;
$data->name->lastname = $lastnameValue;

$data->address->street = $streetValue;
$data->address->suburb = $suburbValue;
$data->address->postcode = $postcodeValue;
$data->address->state = $stateValue;

$data->phone = $phoneNoValue;
$data->phone1 = $phoneNo1Value;
$data->phone2 = $phoneNo2Value;

if ($xml->asXML('customers.xml')) {
    header('location:viewcustomer.php?status=success&&message=' . urlencode('Data Updated Successfully'));
} else {
    header('location:viewcustomer.php?status=error&&message=' . urlencode('Technical Error'));
}
?>