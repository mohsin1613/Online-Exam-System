<?php 
	session_start();
 include("../conn.php");
 extract($_POST);

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['name'];
    $course=$_POST['course'];
    $stdid=$_POST['stdid'];
    $semester=$_POST['semester'];
 	$insFedd = $conn->query("INSERT INTO enroll_tbl(name,course,stdid,semester) VALUES('$name','$course','$stdid','$semester') ");

     if($insFedd)
 	{
 		echo "Enroll Successful!!";
 	}
 	else
 	{
 		echo "Enroll No Successful!";
 	}
}
else {
    echo "NoT found Server Request!!";
}

 ?>