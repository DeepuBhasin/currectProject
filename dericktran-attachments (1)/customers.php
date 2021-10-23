<!DOCTYPE html>
<!-- 
    ID: 18329328
    Name: Derick Tran
-->
<?php 
    $customersDoc= new DOMDocument();
    $customersDoc->load("customers.xml");
    $root = $customersDoc->documentElement;
?>

<html>

    <head>
        <title>Customer Management</title>
        <link rel="stylesheet" href="rentals.css">
    </head>

    <body>
        <div class="topnav">
            <a href="default.php">Home</a>
            <a href="newcustomer.php">Add a New Customer</a>
            <a href="search.php">Update/Change customer details</a>
            <a href="">Add nominated driver to existing customer</a>
        </div>
    </body>
</html>