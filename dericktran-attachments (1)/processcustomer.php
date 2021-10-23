<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("customers.xml");

if (!isset($_POST['add'])) {
    header('location:newcustomer.php?status=error&&message=' . urlencode('Access Denined'));
    exit;
}

//CUSTOMER
$noValue = isset($_POST['customer_id']) ? addslashes($_POST['customer_id']) : '';
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
$licenseValue = isset($_POST['cusomer_license']) ? addslashes($_POST['cusomer_license']) : '';
$emailValue = isset($_POST['customer_email']) ? addslashes($_POST['customer_email']) : '';

//NOMINATED DRIVER
$licValue = isset($_POST['nominated_lic']) ? addslashes($_POST['nominated_lic']) : '';
$ndfirstnameValue = isset($_POST['nominated_firstname']) ? addslashes($_POST['nominated_firstname']) : '';
$ndlastnameValue = isset($_POST['nominated_lastname']) ? addslashes($_POST['nominated_lastname']) : '';
$ndstreetValue = isset($_POST['nominated_street']) ? addslashes($_POST['nominated_street']) : '';
$ndsuburbValue = isset($_POST['nominated_suburb']) ? addslashes($_POST['nominated_suburb']) : '';
$ndpostcodeValue = isset($_POST['nominated_postcode']) ? addslashes($_POST['nominated_postcode']) : '';
$ndstateValue = isset($_POST['nominated_state']) ? addslashes($_POST['nominated_state']) : '';
$ndphoneNoValue = isset($_POST['nominated_phone_number']) ? addslashes($_POST['nominated_phone_number']) : '';

//creating Customer Elements 
$customerInfoElement = $xmlDoc->createElement('customerInfo');
$customerNameElement = $xmlDoc->createElement('name');
$customerTitleElement = $xmlDoc->createElement('title');
$customerFirstnameElement = $xmlDoc->createElement('firstname');
$customerMiddleElement = $xmlDoc->createElement('middlename');
$customerLastnameElement = $xmlDoc->createElement('lastname');
$customerAddressElement = $xmlDoc->createElement('address');
$customerStreetElement = $xmlDoc->createElement('street');
$customerSuburbElement = $xmlDoc->createElement('suburb');
$customerPostcodeElement = $xmlDoc->createElement('postcode');
$customerStateElement = $xmlDoc->createElement('state');
$customerPhoneElement = $xmlDoc->createElement('phone');
$customerPhone1Element = $xmlDoc->createElement('phone1');
$customerPhone2Element = $xmlDoc->createElement('phone2');
$customerLicenceElement = $xmlDoc->createElement('licence');
$customerEmailElement = $xmlDoc->createElement('email');

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



//setting elements under nodes (adding elements to inheritence)
$customerInfoElement->appendChild($customerNameElement);
$customerNameElement->appendChild($customerTitleElement);
$customerNameElement->appendChild($customerFirstnameElement);
$customerNameElement->appendChild($customerMiddleElement);
$customerNameElement->appendChild($customerLastnameElement);
$customerInfoElement->appendChild($customerAddressElement);
$customerAddressElement->appendChild($customerStreetElement);
$customerAddressElement->appendChild($customerSuburbElement);
$customerAddressElement->appendChild($customerPostcodeElement);
$customerAddressElement->appendChild($customerStateElement);
$customerInfoElement->appendChild($customerPhoneElement);
$customerInfoElement->appendChild($customerPhone1Element);
$customerInfoElement->appendChild($customerPhone2Element);
$customerInfoElement->appendChild($customerLicenceElement);
$customerInfoElement->appendChild($customerEmailElement);

$customerInfoElement->appendChild($nominatedDriverElement);
$nominatedDriverElement->appendChild($nominatedNameElmement);
$nominatedNameElmement->appendChild($nominatedFirstnameElement);
$nominatedNameElmement->appendChild($nominatedLastnameElement);
$nominatedDriverElement->appendChild($nominatedAddressElement);
$nominatedAddressElement->appendChild($nominatedStreetElement);
$nominatedAddressElement->appendChild($nominatedSuburbElement);
$nominatedAddressElement->appendChild($nominatedPostcodeElement);
$nominatedAddressElement->appendChild($nominatedStateElement);
$nominatedDriverElement->appendChild($nominatedPhoneElement);

//adding values to the customer Elements
$noAttribute = $xmlDoc->createAttribute('no');
$titleText = $xmlDoc->createTextNode($titleValue);
$firstNameText = $xmlDoc->createTextNode($firstnameValue);
$middleNameText = $xmlDoc->createTextNode($middlenameValue);
$lastNameText = $xmlDoc->createTextNode($lastnameValue);
$streetText = $xmlDoc->createTextNode($streetValue);
$suburbText = $xmlDoc->createTextNode($suburbValue);
$postcodeText = $xmlDoc->createTextNode($postcodeValue);
$stateText = $xmlDoc->createTextNode($stateValue);
$phoneNoText = $xmlDoc->createTextNode($phoneNoValue);
$phoneNo1Text = $xmlDoc->createTextNode($phoneNo1Value);
$phoneNo2Text = $xmlDoc->createTextNode($phoneNo2Value);
$licenceText = $xmlDoc->createTextNode($licenseValue);
$emailText = $xmlDoc->createTextNode($emailValue);

$ndfirstnameText = $xmlDoc->createTextNode($ndfirstnameValue);
$ndlastnameText = $xmlDoc->createTextNode($ndlastnameValue);
$ndstreetText = $xmlDoc->createTextNode($ndstreetValue);
$ndsuburbText = $xmlDoc->createTextNode($ndsuburbValue);
$ndpostcodeText = $xmlDoc->createTextNode($ndpostcodeValue);
$ndstateText = $xmlDoc->createTextNode($ndstateValue);
$ndphoneNoText = $xmlDoc->createTextNode($ndphoneNoValue);



//setting values for ements
$customerInfoElement->appendChild($noAttribute);
$customerInfoNode = $xmlDoc->documentElement->appendChild($customerInfoElement);
$customerInfoNode->setAttribute('no', $noValue);
$customerTitleElement->appendChild($titleText);
$customerFirstnameElement->appendChild($firstNameText);
$customerMiddleElement->appendChild($middleNameText);
$customerLastnameElement->appendChild($lastNameText);
$customerStreetElement->appendChild($streetText);
$customerSuburbElement->appendChild($suburbText);
$customerPostcodeElement->appendChild($postcodeText);
$customerStateElement->appendChild($stateText);
$customerPhoneElement->appendChild($phoneNoText);
$customerPhone1Element->appendChild($phoneNo1Text);
$customerPhone2Element->appendChild($phoneNo2Text);
$customerLicenceElement->appendChild($licenceText);
$customerEmailElement->appendChild($emailText);

$nominatedDriverElement->setAttribute('lic', $licValue);
$nominatedFirstnameElement->appendChild($ndfirstnameText);
$nominatedLastnameElement->appendChild($ndlastnameText);
$nominatedStreetElement->appendChild($ndstreetText);
$nominatedSuburbElement->appendChild($ndsuburbText);
$nominatedPostcodeElement->appendChild($ndpostcodeText);
$nominatedStateElement->appendChild($ndstateText);
$nominatedPhoneElement->appendChild($ndphoneNoText);;

if ($xmlDoc->save(realpath('customers.xml'))) {
    header('location:newcustomer.php?status=success&&message=' . urlencode('Data Added Successfully'));
} else {
    header('location:newcustomer.php?status=error&&message=' . urlencode('Technical Error'));
}
?>