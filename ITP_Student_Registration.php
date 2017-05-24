<?php

  $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }


$ID = $_POST['student_id'];
$role = $_POST['Role'];   
$Name = $_POST['student_name'];
$phone = $_POST['student_phone_no'];
$email = $_POST['student_email'];
$Password = $_POST['student_password'];

$Faculty = $_POST['student_faculty']; 
$Major = $_POST['student_major']; 
$Campus = $_POST['student_campus']; 
$Number_of_Credit_Hours_Completed_Excluding_Arts_and_Humanities_Subject = 
$_POST['Num_of_Credit_Hours_Completed']; 
$Number_of_Credit_Hours_Taken_in_Trimester_2_Excluding_Arts_and_Humanities_Subject= $_POST['Num_of_Credit_Hours_Taken'];
$Last_Trimester = $_POST['last_semester'];
$Trimester = $_POST['semester_no'];

$query = "INSERT INTO  users (user_id, role, name, phone, email, password,student_faculty,
student_major,student_campus,completed_credit_hours,current_sem_credit_hours,is_last_sem,
semester_session) 
VALUES ('$ID','$role', '$Name', '$phone', '$email','$Password','$Faculty', '$Major', '$Campus', 
'$Number_of_Credit_Hours_Completed_Excluding_Arts_and_Humanities_Subject', 
'$Number_of_Credit_Hours_Taken_in_Trimester_2_Excluding_Arts_and_Humanities_Subject',
'$Last_Trimester', '$Trimester')";

$result = mysql_query($query);

 //if($result){
     header('location:home.html');


?>