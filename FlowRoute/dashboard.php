<?php include_once('header.php'); ?>
<div class="col-xs-12 col-sm-12 content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="content-row">
        <?php include_once('message.php'); ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Dashboard </b>
            </div>
          </div>
          <div class="panel-body">
            <div class="col-md-4">
              <div class="alert alert-info alert-dismissable">
                <h4>Last Login Details </h4>
                <hr>
                <p>
                <h6>Date : <?= date("d D/m/Y", strtotime($_SESSION['login_time'])); ?></h6>
                <h6>Time : <?= date("H:i:s ", strtotime($_SESSION['login_time'])); ?></h6>
                <strong>IpAddress <?= $_SESSION['login_address']; ?></strong>
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="alert alert-success alert-dismissable">
                <h4>Total Groups : <?php $group_count = mysqli_query($con, "SELECT count(id) as group_count FROM group_table");
                                    $row = mysqli_fetch_object($group_count);
                                    echo $row->group_count;
                                    ?></h4>
                <hr>
                <p>Total Active Groups : <?php $group_count = mysqli_query($con, "SELECT count(id) as group_count  FROM group_table where status=1");
                                          $row = mysqli_fetch_object($group_count);
                                          echo $row->group_count;
                                          ?></p>
                <p>Total Inactive Groups : <?php $group_count = mysqli_query($con, "SELECT count(id) as group_count  FROM group_table where status=0");
                                            $row = mysqli_fetch_object($group_count);
                                            echo $row->group_count;
                                            ?></p>
                <p> <a href="view_group.php" class="btn-warning btn"> View </a></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="alert alert-warning alert-dismissable">
                <h4>Total Contacts : <?php $user_count = mysqli_query($con, "SELECT count(user_id) as user_count FROM user");
                                      $row = mysqli_fetch_object($user_count);
                                      echo $row->user_count;
                                      ?></h4>
                <hr>
                <p>Total Active Contact : <?php $user_count = mysqli_query($con, "SELECT count(user_id) as user_count FROM user where status=1");
                                          $row = mysqli_fetch_object($user_count);
                                          echo $row->user_count;
                                          ?></p>
                <p>Total Inactive Contact : <?php $user_count = mysqli_query($con, "SELECT count(user_id) as user_count FROM user where status=0");
                                            $row = mysqli_fetch_object($user_count);
                                            echo $row->user_count;
                                            ?></p>
                <p> <a href="view_contact_sms.php" class="btn-warning btn"> View </a></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="alert alert-warning alert-dismissable">
                <h4>Sent Message Report</h4>
                <p>Total Number of SMS Sent : <?php $total_sms_count = mysqli_query($con, "SELECT count(sms_id) as sms_count FROM sms_history");
                                              $row = mysqli_fetch_object($total_sms_count);
                                              echo $row->sms_count;
                                              ?></p>
                <p>Total Number of SMS Sent Successfully : <?php $sent_count = mysqli_query($con, "SELECT count(sms_id) as sms_count FROM sms_history where status='success'");
                                                            $row = mysqli_fetch_object($sent_count);
                                                            echo $row->sms_count;
                                                            ?></p>
                <p>Total Number of SMS Failed to Deliver : <?php $failed_count = mysqli_query($con, "SELECT count(sms_id) as sms_count FROM sms_history where status='fail'");
                                                            $row = mysqli_fetch_object($failed_count);
                                                            echo $row->sms_count;
                                                            ?></p>
                <p><a class="btn btn-warning" href="sent_sms.php">View</a></p>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- content -->
</div>
</div>
</div>
<!--footer-->
<?php include_once('footer.php'); ?>