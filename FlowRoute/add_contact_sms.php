<?php include_once('header.php'); ?>
<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="content-row">
        <?php include_once('message.php'); ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Add Contact</b>
            </div>
          </div>
          <div class="panel-body">
            <form role="form" action="program_file.php" method="post">
              <div class="form-group">
                <label for="last_name">Select Group *</label>
                <select class="form-control" name="group_id" required="">
                  <option value="">Select Group </option>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM group_table WHERE status=1 ORDER BY group_name ASC");
                  while ($a = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $a['id'] ?>"><?= ucfirst(strtolower($a['group_name'])); ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" class="form-control" name="full_name" id="full_name" required="required" autocomplete="off" placeholder="Enter Full Name *">
              </div>
              <div class="form-group">
                <label for="last_name">Select Country *</label>
                <select class="form-control" name="country_id" required="">
                  <option value="">Select Country </option>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM country ORDER BY name ASC");
                  while ($a = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $a['id'] ?>"><?= ucfirst(strtolower($a['name'])); ?> ( +<?= $a['phonecode']; ?> )</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="mobile_number">Mobile Number *</label>
                <input type="number" class="form-control" name="mobile_number" id="mobile_number" required="required" autocomplete="off" placeholder="Enter Mobile Number *">
              </div>
              <div class="form-group">
                <label for="remarks">Remarks </label>
                <textarea class="form-control" name="remarks" id="remarks" autocomplete="off" placeholder="Enter Remarks "></textarea>
              </div>

              <button type="submit" class="btn btn-success" name="add_sms">SAVE</button> <button type="reset" class="btn btn-info">RESET</button>
            </form>
          </div>
        </div>

      </div>
    </div><!-- content -->
  </div>
</div>
</div>
<!--footer-->
<?php include_once('footer.php'); ?>