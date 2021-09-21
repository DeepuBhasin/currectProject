<?php include_once('header.php'); ?>
<link rel=stylesheet type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="content-row">
        <?php include_once('message.php'); ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title"><b>All Sent SMS Report </b>
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive" style="overflow: auto;">
              <table class="table table-hover table-striped table-hover" id="smsReport">
                <thead>
                  <tr>
                    <th>Sri No.</th>
                    <th>Page Type</th>
                    <th>Amount</th>
                    <th>Body</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM sms_history order by created_dt DESC");
                  $c = 0;
                  while ($ab = mysqli_fetch_array($query)) {  ?>

                    <tr>
                      <td><?= ++$c ?></td>
                      <td><?= ucwords($ab['page_type']); ?></td>
                      <td><?= $ab['amount_display'] ?></td>
                      <td><?= $ab['body']; ?></td>
                      <td><?= $ab['message_from'] ?></td>
                      <td><?= $ab['send_to'] ?></td>
                      <td><?= $ab['status']; ?></td>
                      <td><?= $ab['created_dt']; ?></td>
                    </tr>

                  <?php
                  }

                  ?>


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

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#smsReport').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            title: 'All Sent SMS Report',

          },
          {
            extend: 'pdf',
            title: 'All Sent SMS Report',
            orientation: 'landscape',
            pageSize: 'A4'

          },
          {
            extend: 'excel',
            title: 'All Sent SMS Report',

          },
        ],
        "lengthMenu": [
          [50]
        ],
      });
    });
  </script>
  <?php include_once('footer.php'); ?>