<?php 
include 'config.php';

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    
    $username = mysqli_real_escape_string($db,$_POST['uname']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $password1 = mysqli_real_escape_string($db,$_POST['password1']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $tel = mysqli_real_escape_string($db,$_POST['tel']);
    $addres = mysqli_real_escape_string($db,$_POST['address']);
        
    if($username == ""){
   ?>
        <script>alert('Please Enter User Name ');</script>
        <?php
    }
    else if(($password == "") || ($password1 == "") || ($password != $password1))
    {
    ?>
        <script>alert('Please Enter Correct Password ');</script>
        <?php
 
    }
    else if((!is_numeric($tel)) || ($tel == "")){
         ?>
        <script>alert('Please Enter Correct Contact No  <?php echo $tel ?>');</script>
        <?php
    }   
        
    else{
      
        if(isset($username)){
  $sql1 = "SELECT * FROM reseacher WHERE resname = '$username'";
    $result = mysqli_query($db,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $st = mysqli_num_rows($result);

if($st >= 1){ ?>
  <script>if(alert('Username Exists ') == true){
        }
        else {window.location.href='register.php';}
        
        
        </script> <?php
die();
}
else{

$sql = "insert into reseacher (resname,respw,resemail,restel,resaddres) values ('$username','$password','$email','$tel','$addres')";
    
if(mysqli_query($db, $sql))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
   }
    }
    }
    }
    
?>
        
        <title>Register</title>
<body bgcolor = "#FFFFFF">
	
      <?php include 'header.php';?>
    <br />
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
				
            <div style = "margin:30px">
        <form name="reg" action = "" method = "post">
            <table>
                <tr>
                    <td> UserName  </td><td>:</td>
                    <td><input type = "text" name = "uname" class = "box" /></td>
                </tr>
                
                <tr>
                    <td> Password  </td><td>:</td>
                    <td><input type = "password" name = "password" class = "box" /></td>
                </tr>
                <tr>
                    <td> Re-type Password  </td><td>:</td>
                    <td><input type = "password" name = "password1" class = "box" /></td>
                </tr>
                <tr>
                    <td> Email</td><td>:</td>
                    <td><input type = "email" name = "email" class = "box" /></td>
                </tr>
                
                <tr>
                    <td> Contact.No</td><td>:</td>
                    <td><input type = "text" name = "tel" class = "box" /></td>
                </tr>
                
                <tr>
                    <td> Address   </td><td>:</td>
                    <td><input type = "text" name = "address" class = "box" /></td>
                </tr>
                <tr><td> <input type = "submit"  value="Submit">    
                 
               </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error  ?></div>  


