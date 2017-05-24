<?php
session_start();
?>

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
                            <a href="add_member.html"><i class="fa fa-fw fa-dashboard"></i> Add Member</a>
                        </li>
                        <li>
                            <a href="edit_memberInfo.html"><i class="fa fa-fw fa-bar-chart-o"></i> Edit Member Information</a>
                        </li>
                        <li class="">
                            <a href="delete_member.html"><i class="fa fa-fw fa-table"></i> Remove Member</a>
                        </li>

                        <li>
                            <a href="view_all_member.php"><i class="fa fa-fw fa-edit"></i> View Student List</a>
                        </li>

                         <li>
                            <a href="assignSUP.php"><i class="fa fa-fw fa-desktop"></i> Assign Supervisor</a>
                        </li>
                       
                        <li>
                            <a href="view_offer_letter.html"><i class="fa fa-fw fa-wrench"></i> View Student Offer Letter</a>
                        </li>
                        <li>
                            <a href="student_location.php"><i class="fa fa-fw fa-file"></i> Check Students Location</a>
                        </li>
                        <li>
                            <a href="bulletin.html"><i class="fa fa-fw fa-file"></i> Bulletin Board</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                            <h2>Assign Supervisor for Students</h2>
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

                                if(isset($_POST['submit'])){
                                $query = mysql_query("UPDATE users SET approved = '1' WHERE id='".$_POST['student_id']."'");


                                    $assign = mysql_query("INSERT INTO student_supervisor (student_id,supervisor_id) 
                                      VALUES ('".$_POST['student_id']."','".$_POST['supervisor_id']."')");
                                   if($assign)
                                      $_SESSION['success'] = 1;

                                }


                                $query = mysql_query("SELECT * FROM company_registration cr INNER JOIN users u ON cr.student_id=u.user_id WHERE u.approved = 0 ORDER BY postcode ASC");

                                $supervisors = mysql_query("SELECT * FROM  users  WHERE role='supervisor'");
                                ?>



                                  <div class="container">
                                
                                <form  method="POST" action=>

                                 

                                   <div class="form-group">
                                      <label>Select Student*</label>
                                      <div>
                                      <select class="selectpicker" name="student_id" class="form-control">
                                        <option value="">Select </option>
                                        <?php if($query){
                                          if(mysql_num_rows($query)>0){
                                            while ($row = mysql_fetch_array($query)) {
                                             ?>
                                 <option value="<?php echo $row['id'];?>"> <?php echo $row['name'].', '.$row['company_name'].', '.$row['area'].', '.$row['city'];?></option>
                                             <?php
                                            }
                                          }
                                          } ?>
                                       
                                        <option value= ""> </option>
                                      </select>
                                      </div>

                                <div class="form-group">
                                      <label>Select Supervisor*</label>
                                <div>
                                      <select class="selectpicker" name="supervisor_id" class="form-control">
                                        <option value="">Select </option>
                                        <?php if($supervisors){
                                          if(mysql_num_rows($supervisors)>0){
                                            while ($row = mysql_fetch_array($supervisors)) {
                                             ?>
                                 <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>
                                             <?php
                                            }
                                          }
                                          } ?>
                                       
                                        <option value= ""> </option>
                                      </select>
                                      </div>
                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                      </div>
                                      </div>

                                


                                </table>
                            </div>
                        </div>
                        <?php 
                          if(isset($_SESSION['success'])){
                            if($_SESSION['success'] == 1){
                              ?>
                              <h3 style="text-align: center; color: green;">Successfully assigned.</h3>
                              <?php
                              $_SESSION['success'] = 0;
                            }
                          }
                        ?>

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








