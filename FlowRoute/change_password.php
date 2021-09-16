<?php include_once('header.php');?>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-body">
                 <div class="content-row">
                  <?php include_once('message.php');?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title"><b>Change Password </b>
                      </div>
                    </div>
                   <div class="panel-body">
                      <form role="form" action="program_file.php" method="post" onsubmit="return abc();">
                        <div class="form-group">
                          <label for="old_password">Old Password *</label>
                          <input type="password" class="form-control" name="old_password" id="old_password"  required="required" autocomplete="off" placeholder="Enter Old Password *">
                        </div>
                        <div class="form-group">
                          <label for="new_password">New Password *</label>
                          <input type="password" class="form-control" name="new_password" id="new_password"  required="required" autocomplete="off" placeholder="Enter New Password *">
                        </div>
                        <div class="form-group">
                          <label for="confirm_new_password">Confirm New Password *</label>
                          <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password"  required="required" autocomplete="off" placeholder="Enter Confirm New Password *">
                        </div>
                        <button type="submit" class="btn btn-success" name="update_password">Submit</button> <button type="reset" class="btn btn-info">Reset</button>
                      </form>
                    </div>
                  </div>

                </div>
          </div><!-- content -->
        </div>
    </div>
  </div>  
    <!--footer-->
<script type="text/javascript">
  function abc()
  {
    var new_password=document.getElementById('new_password').value.trim();
    var confirm_new_password=document.getElementById('confirm_new_password').value.trim();

    if(new_password===confirm_new_password)
    {
      return true;
    }
    else
    {
      alert("New and Confrim Password Do not Match");
      return false;
    }  

    
  }
</script>    
<?php include_once('footer.php');?> 