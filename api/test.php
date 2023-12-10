<?php
set_time_limit(0);
//$python=`C:\\python_venv\\venv38_tf_212\\Scripts\\python.exe ML_TEST/test.py`;
//echo exec('dir');
$python="C:\\ProgramData\\Anaconda3\\python.exe";
$file="C:\\xampp\\htdocs\\disaster\\api\\test.py";
$output=exec($python . " " . $file);

echo $output;

?>