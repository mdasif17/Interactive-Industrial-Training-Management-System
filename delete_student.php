<html>
   
   <head>
      <title>Remove Student</title>
   </head>
   
   <body>
            
<?php
 $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }

            
$ID = $_POST['member_id']; 

            
            $sql = "DELETE from member_info
               WHERE member_id = $ID";
            mysql_select_db('itms');
            $result = mysql_query( $sql );
            
            if(! $result ) {
               die('Could not update data: ' . mysql_error());
            }
            else {echo "Updated data successfully\n";
            
            
}

//mysql_free_result($result);
            
?>
               
   </body>
</html>