<?php
session_start();
if(isset($_SESSION['id']))
{
  header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | Management System </title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
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
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
  </head>
  <body>
    <div class="container">
    <form class="form-signin" role="form" action="main_function.php" method="post">
    <?php include_once('message.php');?>
      <h3 class="form-signin-heading">Please Sign in</h3>
        <div class="form-group">
          <label>Email Id</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Please Enter Email Id *" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
        <label>Password</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password Enter Password *" autocomplete="off" />
          </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </body>
</html>
