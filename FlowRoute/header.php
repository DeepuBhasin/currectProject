<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
include_once('database.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Management System</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" href="favicon_16.ico" />
  <link rel="bookmark" href="favicon_16.ico" />
  <!-- site css -->
  <link rel="stylesheet" href="dist/css/site.min.css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
  <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript" src="dist/js/site.min.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>
  <!--nav-->
  <nav role="navigation" class="navbar navbar-custom">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="dashboard.php" class="navbar-brand">Management System</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="disabled"><a href="#">Link</a></li> -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?= $_SESSION['email_id']; ?> <b class="caret"></b></a>
            <ul role="menu" class="dropdown-menu">
              <li class="dropdown-header">Setting</li>
              <li><a href="my_profile.php">My Profile</a></li>
              <li><a href="update_profile.php">Update Profile</a></li>
              <li><a href="change_password.php">Change Password</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!--header-->
  <div class="container-fluid">
    <!--documents-->
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
        <ul class="list-group panel">
          <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>SIDE PANEL</b></li>
          <li class="list-group-item"><a href="dashboard.php"><i class="glyphicon glyphicon-cloud"></i>Dashboard </a></li>
          <li>
            <a href="#groupMenu" class="list-group-item " data-toggle="collapse"> <i class="glyphicon glyphicon-briefcase"></i> Group <span class="glyphicon glyphicon-chevron-right"></span></a>
          <li class="collapse" id="groupMenu">
            <a href="add_group.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> Add Group </a>
            <a href="view_group.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> View Group</a>
          </li>
          </li>
          <li>
            <a href="#demo4" class="list-group-item " data-toggle="collapse"> <i class=" glyphicon glyphicon-user"></i> Contact <span class="glyphicon glyphicon-chevron-right"></span></a>
          <li class="collapse" id="demo4">
            <a href="add_contact_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> Add Contact </a>
            <a href="view_contact_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> View Contact</a>
          </li>
          </li>
          <li>
            <a href="#message" class="list-group-item " data-toggle="collapse"> <i class=" glyphicon glyphicon-user"></i> Message <span class="glyphicon glyphicon-chevron-right"></span></a>
          <li class="collapse" id="message">
            <a href="send_single_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> Send Single SMS</a>
            <a href="send_contact_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> Send Contact SMS</a>
            <a href="send_group_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i> Send Group SMS</a>
            <a href="sent_sms.php" class="list-group-item"><i class="glyphicon glyphicon-minus"></i>All Sent SMS</a>
          </li>

          </li>
          <li>
            <a href="#demo5" class="list-group-item " data-toggle="collapse"> <i class="glyphicon glyphicon-certificate"></i> Profile <span class="glyphicon glyphicon-chevron-right"></span></a>
          <li class="collapse" id="demo5">
            <a href="my_profile.php" class="list-group-item"><i class=" glyphicon glyphicon-pencil"></i> My Profile</a>
            <a href="update_profile.php" class="list-group-item"><i class=" glyphicon glyphicon-pencil"></i> Update Profile</a>
            <a href="change_password.php" class="list-group-item"><i class="glyphicon glyphicon-wrench"></i>Change Password </a>
          </li>
          </li>
          <li class="list-group-item"><a href="logout.php"><i class="glyphicon glyphicon-off"></i>Logout </a></li>
        </ul>

      </div>