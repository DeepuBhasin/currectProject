<?php
require_once('flowApi/vendor/autoload.php');

#Import Message controller and model
use FlowrouteMessagingLib\Controllers\MessagesController;
use FlowrouteMessagingLib\Models\Message;

if (isset($_POST['send_sms'])) {

    $messagebody = mysqli_real_escape_string($con, htmlentities(trim($_POST['message'])));
    $from = $_POST['from'];
    $mobile_number = '+' . $_POST['country_id'] . $_POST['mobile_number'];
    $page_type = $_POST['page_type'];


    /* Demo script*/

    #Instantiate the Controller and pass your API credentials
    $controller = new MessagesController('1e359588', 'b4d85e373de7435f83bac6a912075c09');
    $to_number = $mobile_number;
    $from_number = $from;

    $message = new Message($to_number, $from_number, $messagebody);

    #Print the response
    $response = $controller->createMessage($message);

    if (!isset($response->errors)) {

        $mdr_id = strval($response->data->id);

        $mdr_record = $controller->getMessageLookup($mdr_id); // 'mdr1-b334f89df8de4f8fa7ce377e06090a2e'

        $attributes = $mdr_record->data->attributes;
    }

    $insertArray = [
        $page_type,
        isset($attributes->amount_display) ? $attributes->amount_display : 0,
        $messagebody,
        isset($attributes->direction) ? $attributes->direction : 'NA',
        $from_number,
        isset($attributes->message_type) ? $attributes->message_type : 'NA',
        isset($attributes->timestamp) ? $attributes->timestamp : 'NA',
        $to_number,
        isset($mdr_record->data->id) ? $mdr_record->data->id : 'NA',
        isset($mdr_record->data->type) ? $mdr_record->data->type : 'NA',
        isset($attributes->amount_display) ? 'success' : 'fail',
        $_SESSION['id'],
        $get_time

    ];

    $sqlMessage = "INSERT into sms_history values (null,'{$insertArray[0]}','{$insertArray[1]}','{$insertArray[2]}','{$insertArray[3]}','{$insertArray[4]}','{$insertArray[5]}','{$insertArray[6]}','{$insertArray[7]}','{$insertArray[8]}','{$insertArray[9]}','{$insertArray[10]}','{$insertArray[11]}','{$insertArray[12]}');";
    mysqli_query($con, $sqlMessage);

    $MessageSent = true;
    $color  = isset($attributes->amount_display) ? 'success' : 'danger';
    $smsMessage  = isset($attributes->amount_display) ?
        "Message Successfully Send on $mobile_number "  :  "Message Failed to Deliver on $mobile_number ";
}
