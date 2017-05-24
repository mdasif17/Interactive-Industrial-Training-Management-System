<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

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
                     <a class="navbar-brand" href="">Admin Module</a>
                    
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

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                            <h2>Bordered Table</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">

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

                                if(isset($_GET['id'])){
                                  $id = $_GET['id'];
                                  $query = mysql_query("SELECT * FROM users WHERE id='$id'");
                                  if($query){
                                    $row = mysql_fetch_array($query);
                                  }
                                }

                                $get_sp = mysql_query("SELECT * FROM student_supervisor ss INNER JOIN users u ON 
                                 ss.supervisor_id=u.id WHERE student_id='".$row['id']."'");

                                 if($get_sp){
                                  $sp = mysql_fetch_array($get_sp);
                                 }
                                ?>

                                <div class="col-md-6 col-md-offset-3" style="background-color: white;">
                                <table class="table  table-bordered ">
                                <tr>
                                  <td colspan="2">
                                    <h3 style="color: <?php echo $row['approved']==1? 'green':'red'; ?>;"><?php echo $row['approved']==1? 'Approved':'Pending'; ?></h3>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Supervisor</td><td><?php 
                                    echo $sp['name'];
                                  ?></td>
                                </tr>
                                <tr>
                                  <td>Student id</td><td><?php echo $row['user_id'];?></td>
                                </tr>
                                <tr>
                                  <td>Student Name</td><td><?php echo $row['name'];?></td>
                                </tr>
                                <tr>
                                  <td>Faculty</td><td><?php echo $row['student_faculty'];?></td>
                                </tr>
                                <tr>
                                  <td>Major</td><td><?php echo $row['student_major'];?></td>
                                </tr>
                                <tr>
                                  <td>Email</td><td><?php echo $row['email'];?></td>
                                </tr>
                                <tr>
                                  <td>Phone</td><td><?php echo $row['phone'];?></td>
                                </tr>
                                <tr>
                                  <td>Campus</td><td><?php echo $row['student_campus'];?></td>
                                </tr>
                                <tr>
                                  <td>Completed credit hours</td><td><?php echo $row['completed_credit_hours'];?></td>
                                </tr>
                                <tr>
                                  <td>Current Semester Credit hours</td><td><?php echo $row['current_sem_credit_hours'];?></td>
                                </tr>
                                <tr>
                                  <td>Is that last semester?</td><td><?php echo $row['is_last_sem'];?></td>
                                </tr>
                                
                                </table>
                                </div>


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












