<?php include_once('header.php');?>


          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-body">
                 <div class="content-row">
                 <?php include_once('message.php');?>
                  <?php 
                  if(isset($_POST['send']))
                   {

                     $message=mysqli_real_escape_string($con,htmlentities(trim($_POST['message'])));
                     $from=$_POST['from'];
                     $mobile_number='+'.$_POST['mobile_number'];
                    
                   
                    $api = curl_init("https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json");
                    curl_setopt_array($api, array(
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_POST => 1,
                        CURLOPT_HTTPHEADER => array("Authorization: Basic ".base64_encode($sid.':'.$auth)),
                        CURLOPT_POSTFIELDS => array(
                            'Body' =>$message,
                            'To' => $mobile_number,
                            'From' =>$from
                        )
                    ));
                
                    $resp = curl_exec($api);
                    $resp=json_decode($resp,true);
                    
                    if(isset($resp['sid']))
                     {
                        $account_sid=$resp['account_sid'];
                        $sid=$resp['sid'];
                        $type='Contact';
                        $send_to=$mobile_number;
                        $message_from=$from;
                        $body=$message;
                        $num_segments=$resp['num_segments'];
                        $created_by=$_SESSION['id'];
                        $created_dt=$get_time;
                        $status="Sent";
                        $method="out";
                        $remarks="Message Sent Successfully";
                         $x=mysqli_query($con,"INSERT into sms_history(account_sid,sid,type,send_to,message_from,body,num_segments,status,remarks,method,created_by,created_dt) values('$account_sid','$sid','$type','$send_to','$message_from','$body',$num_segments,'$status','$remarks','$method',$created_by,'$created_dt')");
                        ?>
                          <div class="alert alert-success">
                            <strong>Message Sent Successfully to <?= $mobile_number ?></strong>
                          </div>

                   <?php
                     }
                     else
                     {  
                        $account_sid="Not Availabe";
                        $sid="Not Availabe";
                        $type='Contact';
                        $send_to=$mobile_number;
                        $message_from=$from;
                        $body=$message;
                        $num_segments=0;
                        $created_by=$_SESSION['id'];
                        $created_dt=$get_time;
                        $status="Failed";
                        $method="out";
                        $remarks=mysqli_real_escape_string($con,stripslashes(htmlentities(trim($resp['message']))));
                         $x=mysqli_query($con,"INSERT into sms_history(account_sid,sid,type,send_to,message_from,body,num_segments,status,remarks,method,created_by,created_dt) values('$account_sid','$sid','$type','$send_to','$message_from','$body',$num_segments,'$status','$remarks','$method',$created_by,'$created_dt')");
                      ?>
                         <div class="alert alert-danger">
                            <strong>Message Failed to Deliver on <?= $mobile_number ?></strong>
                          </div>   
                  <?php
                     } 
                   } 
                  ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title"><b>Send SMS To Contact </b>
                      </div>
                    </div>
                   <div class="panel-body">
                      <form role="form" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="form-group">
                          <label for="mobile_number">Select User *</label>
                          <select class="form-control" name="mobile_number" required="" id="mobile_number">
                          <option value="">Select User </option>
                          <?php
                          $query=mysqli_query($con,"SELECT full_name,mobile_number FROM user where status=1 order by full_name ASC");
                          while($a=mysqli_fetch_array($query))
                          {?>
                          <option value="<?= $a['mobile_number']?>"><?= ucfirst($a['full_name']);?> ( <?= $a['mobile_number']?> )</option>
                          <?php
                          } 
                          ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="from">From *</label>
                          <select name="from" required="" class="form-control" id="from">
                            <option value="">Select From</option>
                            <?php for($i=0;$i<count($from_list);$i++){?>
                              <option value="<?= $from_list[$i]?>"><?= $from_list[$i]?></option>
                            <?php }?>
                          </select>
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="message">Enter Message *</label>
                          <textarea id="message" name="message" placeholder="Enter Message" required="" class="form-control">Time to take your medication. Select 1 to confirm or Select 2 to skip a dose.</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success" name="send">Send</button> <button type="reset" class="btn btn-info">Reset</button>
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