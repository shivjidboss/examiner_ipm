<?php
$n=$_POST['name'];
$v=$_POST['value'];
setcookie($n, $v, 0, "/");
if(!isset($_COOKIE[$n])) 
{
    echo "Cookie named '" . $n . "' is not set!";
} 
else 
{
    echo "Cookie '" . $n . "' is set!<br>";
}
?>