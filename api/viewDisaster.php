<?php

$myfile = fopen("out.txt", "r");
$disaster=fread($myfile,filesize("out.txt"));
fclose($myfile);

echo $disaster;


?>