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
            <div class="panel-title"><b>View Contact </b>
            </div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-hover" id="myTable">
                <thead>
                  <tr>
                    <th>Sri No.</th>
                    <th>Group Name</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Remarks</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT u.*,gt.group_name FROM user as u INNER JOIN group_table as gt ON gt.id=u.group_id where u.mobile_number IS NOT NULL  and u.status=1 order by u.full_name ASC");
                  $c = 0;
                  while ($ab = mysqli_fetch_array($query)) {  ?>

                    <tr>
                      <td><?= ++$c ?></td>
                      <td><?= ucwords($ab['group_name']); ?></td>
                      <td><?= $ab['full_name'] ?></td>
                      <td>+<?= $ab['mobile_number'] ?></td>
                      <td><?= $ab['remarks'] ?></td>
                      <td><?= $ab['created_dt']; ?></td>
                      <td><?= (!empty($ab['updated_dt'])) ? $ab['updated_dt'] : 'Not Available'; ?></td>
                      <td><?= ($ab['status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                      <td><a href="edit_customer.php?id=<?= $ab['user_id'] ?>" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Edit <?= $ab['full_name'] ?> (<?= $ab['mobile_number'] ?>) Contact ?');">Edit</a> <a href="program_file.php?delete_customer_id=<?= $ab['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to Delete <?= $ab['full_name'] ?> (<?= $ab['mobile_number'] ?>) Contact ?');">Delete</a> </td>
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
      $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            title: 'All Customer Information',

          },
          {
            extend: 'pdf',
            title: 'All Customer Information',

          },
          {
            extend: 'excel',
            title: 'All Customer Information',

          },
        ],
        "lengthMenu": [
          [50]
        ],
      });
    });
  </script>
  <?php include_once('footer.php'); ?>