<?php include_once('header.php');?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-body">
                 <div class="content-row">
                  <?php include_once('message.php');?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title"><b>My Profile </b>
                      </div>
                    </div>
                   <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped table-hover">
                          <tbody>
                            <tr><td>First Name</td><td><?= ucfirst($_SESSION['first_name']);?></td></tr>
                            <tr><td>Last Name</td><td><?= ucfirst($_SESSION['last_name']);?></td></tr>
                            <tr><td>Email Id</td><td><?= $_SESSION['email_id'];?></td></tr>
                            <tr><td>Last Login Time</td><td><?= $_SESSION['login_time'];?></td></tr>
                            <tr><td>Login IPAdderss</td><td><?= $_SESSION['login_address'];?></td></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
          </div><!-- content -->
        </div>
    </div>
  </div>  
    <!--footer-->
<?php include_once('footer.php');?> 