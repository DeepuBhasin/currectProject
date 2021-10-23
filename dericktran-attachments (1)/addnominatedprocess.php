<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("customers.xml");
$id = (int)$_POST['id'];
$check = $xmlDoc->getElementsByTagName('customerInfo')[$id];

if (!isset($_POST['add'])) {
    header('location:newcustomer.php?status=success&&message=' . urlencode('Access Denined'));
    exit;
}



//NOMINATED DRIVER
$licValue = isset($_POST['nominated_lic']) ? addslashes($_POST['nominated_lic']) : '';
$ndfirstnameValue = isset($_POST['nominated_firstname']) ? addslashes($_POST['nominated_firstname']) : '';
$ndlastnameValue = isset($_POST['nominated_lastname']) ? addslashes($_POST['nominated_lastname']) : '';
$ndstreetValue = isset($_POST['nominated_street']) ? addslashes($_POST['nominated_street']) : '';
$ndsuburbValue = isset($_POST['nominated_suburb']) ? addslashes($_POST['nominated_suburb']) : '';
$ndpostcodeValue = isset($_POST['nominated_postcode']) ? addslashes($_POST['nominated_postcode']) : '';
$ndstateValue = isset($_POST['nominated_state']) ? addslashes($_POST['nominated_state']) : '';
$ndphoneNoValue = isset($_POST['nominated_phone_number']) ? addslashes($_POST['nominated_phone_number']) : '';

$nominatedDriverElement = $xmlDoc->createElement('nominatedDriver');
$nominatedNameElmement = $xmlDoc->createElement('name');
$nominatedFirstnameElement = $xmlDoc->createElement('firstname');
$nominatedLastnameElement = $xmlDoc->createElement('lastname');
$nominatedAddressElement = $xmlDoc->createElement('address');
$nominatedStreetElement = $xmlDoc->createElement('street');
$nominatedSuburbElement = $xmlDoc->createElement('suburb');
$nominatedPostcodeElement = $xmlDoc->createElement('postcode');
$nominatedStateElement = $xmlDoc->createElement('state');
$nominatedPhoneElement = $xmlDoc->createElement('phone');




$check->appendChild($nominatedDriverElement);
$nominatedDriverElement->appendChild($nominatedNameElmement);
$nominatedNameElmement->appendChild($nominatedFirstnameElement);
$nominatedNameElmement->appendChild($nominatedLastnameElement);
$nominatedDriverElement->appendChild($nominatedAddressElement);
$nominatedAddressElement->appendChild($nominatedStreetElement);
$nominatedAddressElement->appendChild($nominatedSuburbElement);
$nominatedAddressElement->appendChild($nominatedPostcodeElement);
$nominatedAddressElement->appendChild($nominatedStateElement);
$nominatedDriverElement->appendChild($nominatedPhoneElement);


$ndfirstnameText = $xmlDoc->createTextNode($ndfirstnameValue);
$ndlastnameText = $xmlDoc->createTextNode($ndlastnameValue);
$ndstreetText = $xmlDoc->createTextNode($ndstreetValue);
$ndsuburbText = $xmlDoc->createTextNode($ndsuburbValue);
$ndpostcodeText = $xmlDoc->createTextNode($ndpostcodeValue);
$ndstateText = $xmlDoc->createTextNode($ndstateValue);
$ndphoneNoText = $xmlDoc->createTextNode($ndphoneNoValue);




$nominatedDriverElement->setAttribute('lic', $licValue);
$nominatedFirstnameElement->appendChild($ndfirstnameText);
$nominatedLastnameElement->appendChild($ndlastnameText);
$nominatedStreetElement->appendChild($ndstreetText);
$nominatedSuburbElement->appendChild($ndsuburbText);
$nominatedPostcodeElement->appendChild($ndpostcodeText);
$nominatedStateElement->appendChild($ndstateText);
$nominatedPhoneElement->appendChild($ndphoneNoText);

if ($xmlDoc->save(realpath('customers.xml'))) {
    header('location:viewcustomer.php?status=success&&message=' . urlencode('Data Added Successfully'));
} else {
    header('location:viewcustomer.php?status=success&&message=' . urlencode('Technical Error'));
}
?>