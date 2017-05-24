<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Supervisor</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                     <a class="navbar-brand" href="">IITMS (Interactive Industrial Training Management System)</a>
                     
                    
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Log Out <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="itpdocs.html"><i class="fa fa-fw fa-dashboard"></i> Documentions</a>
                        </li>
                        <li>
                            <a href="view_all_student.php "><i class="fa fa-fw fa-bar-chart-o"></i> View All Student</a>
                        </li>
                        <li class="">
                            <a href="students_of_supervisors.php "><i class="fa fa-fw fa-table"></i> View All Student Locations</a>
                        </li>

                        <li class="">
                            <a href="mmuSupEV.php "><i class="fa fa-fw fa-table"></i> MMU Supervisor Evaluation</a>
                        </li>

                       
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                            <h2>Students list </h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">

                                <?php
                                  session_start();
                                  ?>


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

                                  //$member_id = $_POST ['member_id'];
                                  $sql = "SELECT * FROM student_supervisor ss INNER JOIN users u ON ss.student_id=u.id where u.role = 'student' AND ss.supervisor_id='".$_SESSION['supervisor_id']."'";

                                  $result = mysql_query($sql);

                                  if(!$result){
                                     $message = 'Invalid query: ' .mysql_error()."\n";
                                     die($message);
                                     }
                                     

                                  echo "<div class='container'> <table class='table table-bordered'>
                                  <thead>
                                  <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                  </tr>
                                  </thead>";
                                  while($row = mysql_fetch_assoc($result)){ // display result row by row
                                     
                                     echo "<tbody><tr><td>";
                                     echo '<a href="details_student.php?id='.$row['id'].'">'.$row['user_id'].'</a>';
                                     echo "</td>";
                                   
                                     echo "<td>";
                                     echo $row['name'];
                                     echo "</td> ";
                                     
                                     
                                  }
                                    echo "</table>";


                                  mysql_free_result($result);



                                  ?>

                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>

 







