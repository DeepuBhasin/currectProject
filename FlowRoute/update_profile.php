<?php include_once('header.php');
$query=mysqli_query($con,"SELECT * FROM login where id=".$_SESSION['id']);
while($ab=mysqli_fetch_array($query))
{
  $first_name=$ab['first_name'];
  $last_name=$ab['first_name'];
}

?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-body">
                 <div class="content-row">
                  <?php include_once('message.php');?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title"><b>Update Profile </b>
                      </div>
                    </div>
                   <div class="panel-body">
                      <form role="form" action="program_file.php" method="post">
                        <div class="form-group">
                          <label for="first_name">First Name *</label>
                          <input type="text" class="form-control" name="first_name" id="first_name"  required="required" autocomplete="off" placeholder="Enter First Name *" value="<?= ucfirst($first_name);?>">
                        </div>
                        <div class="form-group">
                          <label for="last_name">Last Name *</label>
                          <input type="text" class="form-control" name="last_name" id="last_name"  required="required" autocomplete="off" placeholder="Enter Last Name *" value="<?= ucfirst($last_name);?>">
                        </div>
                       <button type="submit" class="btn btn-success" name="update">Update</button>
                      </form>
                    </div>
                  </div>

                </div>
          </div><!-- content -->
        </div>
    </div>
  </div>  
    <!--footer-->
<?php include_once('footer.php');?> 