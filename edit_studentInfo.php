<html>
 <head>
 <title>Student details</title>
<img src="lab.jpg" height="300px" width="1350px" align="center" ></div>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:3px solid #bbb
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 72px;
    text-decoration: none;
    
  
}

li a:hover {
    background-color: #4CAF50;
}
body{
background-color:#ecf5ff; 
}


</style>

 </head>
 
<body>
<ul>
<li><a href=itpdocs.html>Documentions </a></li>
<li><a href=edit_studentInfo.html>Edit Student Information</a></li>
<li><a href=view_all_student.html>View All Student</a></li>
<li><a href=students_of_supervisors.php>View All Student Locations</a></li>
<li><a href=logout.php>Logout</a></li>
</ul>
<br>
</body>
</html>
            
<?php
 $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }

$MID = $_POST['M_id'];   
$Name = $_POST['M_name']; 
$Phone = $_POST['M_phone']; 
$Email = $_POST['M_email'];
$type = $_POST['M_type'];
            
            $sql = "UPDATE member_info
		SET member_name = '$Name',
			member_phone= '$Phone',
			member_email= '$Email',
			member_type= '$type'
			

               WHERE member_id= $MID";
            mysql_select_db('itms');
            $result = mysql_query( $sql );
            
            if(! $result ) {
               die('Could not update data: ' . mysql_error());
            }
            else {echo "<h3 align=center>Updated data successfully</h3>";            
}

//mysql_free_result($result);
            
?>
               
   </body>
</html>