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
        <a href="newcustomer.php">Add Customer</a>
        <a class="active" href="viewcustomer.php">View Customers</a>
        <a href="">Add nominated driver to existing customer</a>
    </div>

    <div class="container-fluid">
        <h1>VIEW CUSTOMERS</h1>
        <?php
        if (isset($_GET['status'])) {
        ?>
            <div class="message">
                <h2><?= $_GET['message']; ?></h2>
            </div>
            <br />
            <br />
        <?php
        }
        ?>

        <?php
        $xml = simplexml_load_file("customers.xml");
        $srno = 0;
        $node = 0;
        foreach ($xml->customerInfo as $key1 => $value1) {
        ?>
            <div class="container">
                <div class="sub-container">
                    <a href="editcustomer.php?id=<?= $node ?>" class="edit_link">Edit Customer Details</a>
                    <a href="addnominated.php?id=<?= $node ?>" class="edit_link">Add Nominated Customer</a>
                    <br />
                    <br />
                    <br />

                    <table>
                        <tr>
                            <td>Customer Sri No </td>
                            <td><strong><?= ++$srno; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Customer Id : </td>
                            <td><strong><?= $value1['no'] ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Title : </td>
                            <td><strong><?= $value1->name->title; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer First Name : </td>
                            <td><strong><?= $value1->name->firstname; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Middle Name : </td>
                            <td><strong><?= $value1->name->middlename; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer last Name : </td>
                            <td><strong><?= $value1->name->lastname; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer street : </td>
                            <td><strong><?= $value1->address->street; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Suburb : </td>
                            <td><strong><?= $value1->address->suburb; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Postcode : </td>
                            <td><strong><?= $value1->address->postcode; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer State : </td>
                            <td><strong><?= $value1->address->state; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Phone Number 1 : </td>
                            <td><strong><?= $value1->phone; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Phone Number 2 : </td>
                            <td><strong><?= $value1->phone1; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Phone Number 3 : </td>
                            <td><strong><?= $value1->phone2; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer License Number : </td>
                            <td><strong><?= $value1->licence; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Customer Email : </td>
                            <td><strong><?= $value1->email; ?></strong></td>
                        </tr>

                        <?php
                        $nominatedDriverCount = count($value1->nominatedDriver);
                        if ($nominatedDriverCount == 1) {
                        ?>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td>Nominated Sri no : </td>
                                <td><strong>1</strong></td>
                            </tr>
                            <tr>
                                <td>Nominated License Number : </td>
                                <td><strong><?= $value1->nominatedDriver['lic'] ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated First Name : </td>
                                <td><strong><?= $value1->nominatedDriver->name->firstname ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated Last Name : </td>
                                <td><strong><?= $value1->nominatedDriver->name->lastname ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated street : </td>
                                <td><strong><?= $value1->nominatedDriver->address->street; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated Suburb : </td>
                                <td><strong><?= $value1->nominatedDriver->address->suburb; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated Postcode : </td>
                                <td><strong><?= $value1->nominatedDriver->address->postcode; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated State : </td>
                                <td><strong><?= $value1->nominatedDriver->address->state; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nominated Phone Number : </td>
                                <td><strong><?= $value1->nominatedDriver->phone; ?></strong></td>
                            </tr>
                            <?php
                        } else {
                            $nominatedsri = 0;
                            foreach ($value1->nominatedDriver as $key2 => $value2) {
                            ?>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td>Nominated Sri no : </td>
                                    <td><strong><?= ++$nominatedsri; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated License Number : </td>
                                    <td><strong><?= $value2['lic'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated First Name : </td>
                                    <td><strong><?= $value2->name->firstname ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated Last Name : </td>
                                    <td><strong><?= $value2->name->lastname ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated street : </td>
                                    <td><strong><?= $value2->address->street; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated Suburb : </td>
                                    <td><strong><?= $value2->address->suburb; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated Postcode : </td>
                                    <td><strong><?= $value2->address->postcode; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated State : </td>
                                    <td><strong><?= $value2->address->state; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Nominated Phone Number : </td>
                                    <td><strong><?= $value2->phone; ?></strong></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
            <br />
            <br />
        <?php
            $node++;
        }
        ?>
    </div>
</body>

</html>