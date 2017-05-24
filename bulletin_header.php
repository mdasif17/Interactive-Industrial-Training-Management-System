<!DOCTYPE html>
<html>
<title>IITMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
      
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}



</style>
<body>
 





<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
<img src="lab.jpg" height="450px" width="1550px" align="center" >
  <div class="w3-display-left w3-padding-xxlarge w3-text-white">
    <span class="w3-jumbo w3-hide-small">INTERACTIVE INDUSTRIAL TRAINING MANAGEMENT SYSTEM</span><br>

    
  </div>
</header>


</body>
</html>
<?php
                                    $username = "root";
                                    $password = "";
                                    $server = "localhost";
                                    $db = "itms";



                                    $db = mysql_connect("localhost", "root", "");
                                    if (!$db) {
                                        die("Database connection failed  " . mysql_error());
                                    }

                                    $db_select = mysql_select_db("itms", $db);
                                    if (!$db_select) {
                                        die("Database selection failed " . mysql_error());
                                    }

//$member_id = $_POST ['member_id'];
                                    $sql = "SELECT * FROM bulletin";

                                    $result = mysql_query($sql);

                                    if (!$result) {
                                        $message = 'Invalid query: ' . mysql_error() . "\n";
                                        die($message);
                                    }

?>
<ul>
<?php

                                    while ($row = mysql_fetch_assoc($result)) { // display result row by row
                                        ?>
<li style="font-size: 30px" align="center"> <a href="news.php?id=<?php echo $row['id'];?>"><?php echo $row['day'].' - '.$row['heading'];?> </a></li>
                                        <?php

                                    }


                                    mysql_free_result($result);
                                    ?>
                                    </ul>

