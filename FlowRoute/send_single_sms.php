<?php include_once('header.php'); ?>


<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="content-row">
        <?php
        include_once('message.php');
        include_once('send_sms.php');
        if (isset($MessageSent)) { ?>

          <div class="alert alert-<?= $color ?>">
            <strong><?= $smsMessage ?></strong>
          </div>

        <?php
        }

        ?>


        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>Send SMS Message </b>
            </div>
          </div>
          <div class="panel-body">
            <form role="form" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
              <input type="hidden" name="page_type" value="send single sms">
              <input type="hidden" name="checkCountryStatus" value="1">

              <div class="form-group">
                <label for="country_id">Select Country *</label>
                <select class="form-control" name="country_id" required="" id="country_id">
                  <option value="">Select Country </option>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM country ORDER BY name ASC");
                  while ($a = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $a['phonecode'] ?>"><?= ucfirst(strtolower($a['name'])); ?> ( +<?= $a['phonecode']; ?> )</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="mobile_number">Mobile Number *</label>
                <input type="number" class="form-control" name="mobile_number" id="mobile_number" required="required" autocomplete="off" placeholder="Enter Mobile Number *" maxlength="15">
              </div>
              <div class="form-group">
                <label for="from">From *</label>
                <select name="from" required="" class="form-control" id="from">
                  <option value="">Select From</option>
                  <?php for ($i = 0; $i < count($from_list); $i++) { ?>
                    <option value="<?= $from_list[$i] ?>"><?= $from_list[$i] ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group">
                <label for="message">Enter Message *</label>
                <textarea id="message" name="message" placeholder="Enter Message" required="" class="form-control"></textarea>
              </div>

              <button type="submit" class="btn btn-success" name="send_sms">Send</button> <button type="reset" class="btn btn-info">Reset</button>
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