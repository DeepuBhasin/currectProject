<?php include_once('header.php'); ?>
<div class="col-xs-12 col-sm-9 content">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="content-row">
                <?php include_once('message.php'); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title"><b>Add Group</b>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="program_file.php" method="post">
                            <div class="form-group">
                                <label for="group_name">Group Name *</label>
                                <input type="text" class="form-control" name="group_name" id="group_name" required="required" autocomplete="off" placeholder="Enter Group Name *">
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks </label>
                                <textarea class="form-control" name="remarks" id="remarks" autocomplete="off" placeholder="Enter Remarks "></textarea>
                            </div>

                            <button type="submit" class="btn btn-success" name="add_group">SAVE</button> <button type="reset" class="btn btn-info">RESET</button>
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