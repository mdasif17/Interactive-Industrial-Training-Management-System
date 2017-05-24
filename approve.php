<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "itms";
 $db = mysql_connect("localhost","root",""); 
 $db_select = mysql_select_db("itms",$db);

$query = mysql_query("UPDATE users SET approved = '1' WHERE id='".$_GET['id']."'");

$get_sp = mysql_query("SELECT * FROM users WHERE role = 'supervisor' ORDER BY student_count ASC");
if($get_sp){
	if(mysql_num_rows($get_sp)>0){
		$row = mysql_fetch_array($get_sp);
		echo $row['id'];
		$assign = mysql_query("INSERT INTO student_supervisor (student_id,supervisor_id) 
			VALUES ('".$_GET['id']."','".$row['id']."')");
		$update = mysql_query("UPDATE users SET student_count=".($row['student_count']+1)." WHERE id ='".$row['id']."'");
	}
}

if($query){
	header('location:details.php?id='.$_GET['id']);
}