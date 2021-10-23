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
    <title>Edit Customer</title>
    <link rel="stylesheet" href="rentals.css">
</head>

<body>
    <div class="topnav">
        <a href="default.php">Home</a>
        <a href="newcustomer.php">Add Customer</a>
        <a class="active" href="viewcustomer.php">View Customers</a>
        <a href="">Add nominated driver to existing customer</a>
    </div>

    <div class="container-fluid">
        <h1>EDIT CUSTOMER</h1>
        <h3>Please Fill All Information</h3>

        <form name="newCustomerForm" action="updatecustomer.php" method="POST">
            <div class="container">
                <h3>Please Enter Customer Details</h3>
                <div class="sub-container">
                    <label for="customer_title">Title: </label>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="text" id="customer_title" name="customer_title" placeholder="Enter Title" value="<?= $data->name->title; ?>" />
                    <br>
                    <label for="customer_firstname">First Name * : </label>
                    <input type="text" id="customer_firstname" name="customer_firstname" required="required" placeholder="Enter First Name" value="<?= $data->name->firstname; ?>" />
                    <br>
                    <label for="custonmer_middlename">Middle Name: </label>
                    <input type="text" id="custonmer_middlename" name="custonmer_middlename" placeholder="Enter Middle Name" value="<?= $data->name->middlename; ?>" />
                    <br>
                    <label for="customer_lastname">Last Name * : </label>
                    <input type="text" id="customer_lastname" name="customer_lastname" required="required" placeholder="Enter Last Name" value="<?= $data->name->lastname; ?>" />
                    <br />
                    <label for="customer_street">Street * : </label>
                    <input type="text" id="customer_street" name="customer_street" required="required" placeholder="Enter Street" value="<?= $data->address->street; ?>" />
                    <br>
                    <label for="customer_suburb">Suburb * : </label>
                    <input type="text" id="customer_suburb" name="customer_suburb" required="required" placeholder="Enter Suburb Name" value="<?= $data->address->suburb; ?>" />

                    <label for="customer_postcode">Postcode * : </label>
                    <input type="number" id="customer_postcode" name="customer_postcode" required="required" placeholder="Enter Postcode" value="<?= $data->address->postcode; ?>" />
                    <br>
                    <label for="customer_state">State * : </label>
                    <input type="text" id="customer_state" name="customer_state" required="required" placeholder="Enter State" value="<?= $data->address->state; ?>" />
                    </br>
                    <label for="customer_phoneNo">Phone Number * : </label>
                    <input type="number" id="customer_phoneNo" name="customer_phoneNo" required="required" placeholder="Enter Phone Number" value="<?= $data->phone; ?>" />
                    <br>
                    <label for="customer_phoneNo1">Secondary Phone Number: </label>
                    <input type="number" id="customer_phoneNo1" name="customer_phoneNo1" placeholder="Enter Secondary Phone Number" value="<?= $data->phone1; ?>" />
                    <br>
                    <label for="customer_phoneNo2">Emergency Phone Number: </label>
                    <input type="number" id="customer_phoneNo2" name="customer_phoneNo2" placeholder="Enter Emergency Phone Number" value="<?= $data->phone2; ?>" />
                    <br>
                    <button name="add" type="submit">Update</button>
                </div>
            </div>


        </form>
    </div>
</body>

</html>