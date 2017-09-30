<?php
$t3=0;
$t3++;

 $file="testxxx.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);