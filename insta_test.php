<?php
require "insta/instamojo.php";

//$api = new Instamojo('aff823f809fe3eed241a1edc139afd01', '715f8ce37289c1bece9d7234f424d68f');

$api = new Instamojo('c88e1d662da293bc9d571b50190fff19', '3b0a55f334396e56e963ab9a0dfedc93');

try {
    $response = $api->linkCreate(array(
        'title'=>'EcounCare',
        'slug'=>'abc',
        'description'=>'Create a new Link easily',
        'data_name'=>'Naman Malhota',
        'data_email'=>'me.nm@mail.ru',
        'data_phone'=>'9898989898',
        'base_price'=>100,
        'redirect_url'=>'https://ecounsellors.in/Payment Redirect Page/redirect.php',
        'currency'=>'INR',
        'cover_image'=>'img/1.jpg'
        ));
    print_r($response);
    echo $response['url'];
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>