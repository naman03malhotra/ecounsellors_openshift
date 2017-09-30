<?php








function mailman2 ($email,$sub,$html,$username,$from ,$fromname)
{  

$from=$fromname.' <'.$from.'>';
//Naman Malhotra <naman03malhotra@gmail.com>
$to=$username.' <'.$email.'>';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, 'api:key-585423af5349541764454a6b4c758a9e');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_URL, 
              'https://api.mailgun.net/v3/ecounsellors.in/messages');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 
                array('from' => $from,
                      'to' => $to,
                      'subject' => $sub,
                      'html' => $html
                      ));



  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
