<?php


require_once 'mandrill-api-php/src/Mandrill.php'; 


function mailman ($to,$sub,$mess,$username,$from ,$fromname)
{
try {
    //$mandrill = new Mandrill('GT4QoD0OVAjKkWgCzJEhvA');
    $mandrill = new Mandrill('cbfrNp-f5Bw4ZTbFsus-nw');
    $message = array(
       'html' => '<p>'.$mess.'</p>',
        //'text' => '.'$mess'.',
        'subject' => $sub,
        'from_email' => $from,
        'from_name' => $fromname,
        'to' => array(
            array(
                'email' => $to,
                'name' => $username,
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $from),
        'important' => true,
        
        //'bcc_address' => 'message.bcc_address@example.com',
        
        
        
    );
    $async = false;
    
    
    $result = $mandrill->messages->send($message, $async);
    //print_r($result);
    
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
}
?>