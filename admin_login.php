<?php 
session_start();

?>

<html>
 <head>
 <title>Admin Login</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style> 
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #00477e;
}

  li {
    float: left;
    border-right:3px solid #ac7e54
}

  li a {
    display: block;
    color: white;
    text-align: center;
    padding:20px 22px;
    text-decoration: none;
    
  
}

  li a:hover {
    background-color: #f1eaee;
}
  body{
background-color:#f2ebf0; 
}
  h3 {
 color: #0067a7;
 font-weight: bold;
}
  form {
form-align: center-right;
}
  input[type=text] {
    width: 30%;
    padding: 8px 15px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    background-color: white;
    color:black;
}
  button[type=submit] {
    background-color: #0067a7;
    border: none;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    
    margin: 4px 2px;
    cursor: pointer;
}




</style>
 </head>
 <body style="background-color:White;">
<div style="text-align:center;">

<img src="lab.jpg" height="300px" width="1350px" align="center" ></div>

<br>
</body>
</html>


<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "itms";

 

$db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }


if(isset($_POST['login'] )&&(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])) {
  
  $user_id = $_SESSION['user'] = $_POST['User_Id'];
  $password = $_POST['Password'];

  
  
  $query1 = "select * from users where user_id ='$user_id' AND password ='$password'";

$run = mysql_query ($query1);
if(mysql_num_rows($run)>0 ) {
  
  $row = mysql_fetch_array($run);

    if($row['role'] == 'student'){
        header('location:student.php');
    }else if($row['role'] == 'supervisor'){
       $_SESSION['supervisor_id'] = $row['id'];
        header('location:supervisor.php');

    }else{
      //change admin home page name
        header('location:admin.php');

    }






}
    
}
else {
    echo "<script> alert('Password,username or captcha name is incorrect! ') </script>" ;
  }


?> 
