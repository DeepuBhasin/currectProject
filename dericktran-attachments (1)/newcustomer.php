<!DOCTYPE html>
<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<html>

<head>
    <title>Add A New Customer</title>
    <link rel="stylesheet" href="rentals.css">
</head>

<body>
    <div class="topnav">
        <a href="default.php">Home</a>
        <a class="active" href="newcustomer.php">Add Customer</a>
        <a href="viewcustomer.php">View Customers</a>
        <a href="">Add nominated driver to existing customer</a>
    </div>

    <div class="container-fluid">
        <h1>ADD NEW CUSTOMER</h1>
        <h3>Please Fill All Information</h3>

        <form name="newCustomerForm" action="processcustomer.php" method="POST">
            <div class="container">
                <?php
                if (isset($_GET['status'])) {
                ?>
                    <div class="message">
                        <h2><?= $_GET['message']; ?></h2>
                    </div>
                <?php
                }
                ?>
                <h3>Please Enter Customer Details</h3>
                <div class="sub-container">
                    <label for="customer_id">Customer ID * : </label>
                    <input type="text" id="customer_id" name="customer_id" required="required" placeholder="Enter Customer Id" />
                    <br>
                    <label for="customer_title">Title: </label>
                    <input type="text" id="customer_title" name="customer_title" placeholder="Enter Title">
                    <br>
                    <label for="customer_firstname">First Name * : </label>
                    <input type="text" id="customer_firstname" name="customer_firstname" required="required" placeholder="Enter First Name">
                    <br>
                    <label for="custonmer_middlename">Middle Name: </label>
                    <input type="text" id="custonmer_middlename" name="custonmer_middlename" placeholder="Enter Middle Name">
                    <br>
                    <label for="customer_lastname">Last Name * : </label>
                    <input type="text" id="customer_lastname" name="customer_lastname" required="required" placeholder="Enter Last Name">
                    <br />
                    <label for="customer_street">Street * : </label>
                    <input type="text" id="customer_street" name="customer_street" required="required" placeholder="Enter Street">
                    <br>
                    <label for="customer_suburb">Suburb * : </label>
                    <input type="text" id="customer_suburb" name="customer_suburb" required="required" placeholder="Enter Suburb Name">

                    <label for="customer_postcode">Postcode * : </label>
                    <input type="number" id="customer_postcode" name="customer_postcode" required="required" placeholder="Enter Postcode">
                    <br>
                    <label for="customer_state">State * : </label>
                    <input type="text" id="customer_state" name="customer_state" required="required" placeholder="Enter State">
                    </br>
                    <label for="customer_phoneNo">Phone Number * : </label>
                    <input type="number" id="customer_phoneNo" name="customer_phoneNo" required="required" placeholder="Enter Phone Number">
                    <br>
                    <label for="customer_phoneNo1">Secondary Phone Number: </label>
                    <input type="number" id="customer_phoneNo1" name="customer_phoneNo1" placeholder="Enter Secondary Phone Number">
                    <br>
                    <label for="customer_phoneNo2">Emergency Phone Number: </label>
                    <input type="number" id="customer_phoneNo2" name="customer_phoneNo2" placeholder="Enter Emergency Phone Number">
                    <br>
                    <label for="cusomer_license">License Number * : </label>
                    <input type="text" id="cusomer_license" name="cusomer_license" required="required" placeholder="Enter License Number">
                    <br>
                    <label for="customer_email">Email *: </label>
                    <input type="email" id="customer_email" name="customer_email" required="required" placeholder="Enter Email">
                </div>

                <h3>Please Enter Nominated Customer Details</h3>
                <div class="sub-container">
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

                    <button name="add" type="submit">Add Customer</button>
                    <button type="reset">Clear</button>
                </div>
            </div>


        </form>
    </div>
</body>

</html>