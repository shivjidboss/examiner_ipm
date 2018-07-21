<?php

include ('mysqli_plug.php');

$isset = $_POST['isset'];

$userid = $_POST["userid"];
$userid = mysqli_real_escape_string($db, $userid);

$name = $_POST["name"];
$name = mysqli_real_escape_string($db, $name);


$email = $_POST["email"];
$email = mysqli_real_escape_string($db, $email);

$phone = $_POST["phone"];
$phone = mysqli_real_escape_string($db, $phone);

$tablename = "user_det";


if($isset==1)
$query ="SELECT * FROM `$tablename` WHERE username = '$userid';";

if($isset==2)
$query ="SELECT * FROM `$tablename` WHERE LOWER(name) LIKE LOWER('%$name%');";

if($isset==3)
$query ="SELECT * FROM `$tablename` WHERE phone = '$phone';";

if($isset==4)
$query ="SELECT * FROM `$tablename` WHERE email LIKE '%$email%';";



$result=mysqli_query($db,$query);

//echo($result);

if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			echo("<table class='tbl'>");
			echo("<tr class='tbl_head'><td>ID</td><td>Name</td><td>Password</td><td>Course</td><td>Trade</td><td>Syllabus</td></tr>");
			while($temp=mysqli_fetch_array($result))
			{
				
				echo("<tr><td class='hyper' onclick='vwprof(this)'>".$temp['username']."</td><td>".$temp['name']."</td><td>".$temp['password']."</td><td>".$temp['course']."</td><td>".$temp['trade']."</td><td>".$temp['syllabus']."</td></tr>");
			}
			
			echo("</table>");
		}
		else echo "Record not found!";
	}
		
else
{
	die('failed'.mysqli_error());
}



/*function  makeFileName($size=8, $path="../upload/prof_pic/", $extension=".jpg")
{
    //if you give a path, don't forget the slash at end

    //$root = $_SERVER["DOCUMENT_ROOT"];   
	global $userid;
    $name = rand(0, str_repeat(9, $size));
    $name = str_pad($name, 8,  0, STR_PAD_LEFT).$extension;
    while(is_file($name))
	{
        makeFileName();
    }
	return $path.$userid.$extension;
}
*/


?>