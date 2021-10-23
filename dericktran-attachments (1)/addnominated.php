<?php
$xml = simplexml_load_file("customers.xml");
if (!isset($_GET['id'])) {
    header('location:newcustomer.php?status=error&&message' . urlencode('Access Denined'));
}
$id = (int) $_GET['id'];
$data = $xml->customerInfo[$id];



?>
<!DOCTYPE html>
<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<html>

<head>
    <title>Add New Nominated Customer</title>
    <link rel="stylesheet" href="rentals.css">
</head>

<body>
    <div class="topnav">
        <a href="default.php">Home</a>
        <a href="newcustomer.php">Add Customer</a>
        <a href="viewcustomer.php">View Customers</a>
        <a class="active" href="addnominated.php">Add nominated driver to existing customer</a>
    </div>

    <div class="container-fluid">
        <h1>ADD NEW NOMINATED CUSTOMER</h1>
        <h3>Please Fill All Information</h3>

        <form name="newCustomerForm" action="addnominatedprocess.php" method="POST">
            <div class="container">
                <h3>Please Enter Nominated Customer Details</h3>
                <div class="sub-container">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label for="nominated_lic">License Number * : </label>
                    <input type="text" id="nominated_lic" name="nominated_lic" required="required" placeholder="Enter Nominated License Number">
                    <br>
                    <label for="nominated_firstname">First Name * : </label>
                    <input type="text" id="nominated_firstname" name="nominated_firstname" required="required" placeholder="Enter Nominated First Name">
                    <br>
                    <label for="nominated_lastname">Last Name * : </label>
                    <input type="text" id="nominated_lastname" name="nominated_lastname" required="required" placeholder="Enter Nominated Last Name">
                    <br>
                    <label for="nominated_street">Street * : </label>
                    <input type="text" id="nominated_street" name="nominated_street" required="required" placeholder="Enter Nominated Street">
                    <br>
                    <label for="nominated_suburb">Suburb * : </label>
                    <input type="text" id="nominated_suburb" name="nominated_suburb" required="required" placeholder="Enter Nominated Suburb">
                    <br>
                    <label for="nominated_postcode">Postcode * : </label>
                    <input type="number" id="nominated_postcode" name="nominated_postcode" required="required" placeholder="Enter Nominated Postcode">
                    <br>
                    <label for="nominated_state">State * : </label>
                    <input type="text" id="nominated_state" name="nominated_state" required="required" placeholder="Enter Nominated State">
                    <br>
                    <label for="nominated_phone_number">Phone Number * : </label>
                    <input type="number" id="nominated_phone_number" name="nominated_phone_number" required="required" placeholder="Enter Nominated Phone Number">

                    <button name="add" type="submit">Add Nominated</button>
                    <button type="reset">Clear</button>
                </div>
            </div>


        </form>
    </div>
</body>

</html>