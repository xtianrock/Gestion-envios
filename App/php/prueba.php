<?php
$datetime1 = date_create('2009-10-11');
$datetime2 = date_create('2009-10-11');
$interval = date_diff($datetime1, $datetime2);
echo $interval->format('%R%a');
if ($interval->format('%R')=="-")
{
    echo "erorr";
}
else{
    echo "ok";
}
?>