<?php

include('includes/config.php');


echo $graph_url=$_SESSION['fb_user'];
echo '<br>';
//echo $user = json_decode(file_get_contents($graph_url));
echo '<br>';
echo "file:". $_SESSION['file_get'];

echo $user->first_name;
