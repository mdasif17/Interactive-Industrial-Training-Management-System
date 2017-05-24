
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Student</title>

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
                            <a href="itpdocST.html"><i class="fa fa-fw fa-dashboard"></i> Documentations for Students</a>
                        </li>
                        <li>
                            <a href="offer_letter_upload.html"><i class="fa fa-fw fa-bar-chart-o"></i> Submit Offer Letter</a>
                        </li>
                        <li class="">
                            <a href="edit_studentInfo_st.html"><i class="fa fa-fw fa-table"></i> Edit Student Information</a>
                        </li>

                        <li>
                            <a href="company_registration.html"><i class="fa fa-fw fa-edit"></i> Company Registration</a>
                        </li>

                         
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                            <h2>Students Module</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">

                                   <?php

  $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed  " . mysql_error());
 }

 $db_select = mysql_select_db("itms",$db);
 if (!$db_select) {
 die("Database selection failed " . mysql_error());
 }


$Name = $_POST['student_name']; 
$ID = $_POST['student_id'];
$HP = $_POST['handphone_no'];
$Email = $_POST['student_Email'];
$Major = $_POST['student_major']; 
$AttachedCompanyName = $_POST['company_name']; 
$Lat = $_POST['latitude'];
$Long = $_POST['longitude'];
$Area = $_POST['area']; 
$City = $_POST['city']; 
$Postcode= $_POST['postcode'];
$CompanyTelephone = $_POST['company_telephone'];
$TitleCompanySupervisor = $_POST['title_of_company_supervisor'];
$FirstnameCompanySuervisor = $_POST['firstName_of_company_suervisor'];
$LastnameCompanySuervisor = $_POST['lastName_of_company_suervisor'];
$CompanySupervisorDesignation = $_POST['company_supervisor_designation'];
$DepartmentCompanySupervisor = $_POST['department_of_company_supervisor'];
$CompanySupervisorContactNumber = $_POST['company_supervisor_contactNumber'];
$CompanySupervisorEmail = $_POST['company_supervisor_email'];

$query = "INSERT INTO  Company_Registration (student_name, student_id, phone_num, student_email, student_major, company_name,latitude,longitude, area, city, postcode,company_telephone,title_of_company_supervisor, firstName_of_company_supervisor,lastName_of_company_supervisor, company_supervisor_designation, department_of_company_supervisor, company_supervisor_contactNumber, company_supervisor_email )
VALUES('$Name', '$ID', '$HP', '$Email','$Major', '$AttachedCompanyName','$Lat','$Long', '$Area','$City', '$Postcode','$CompanyTelephone', '$TitleCompanySupervisor', '$FirstnameCompanySuervisor', '$LastnameCompanySuervisor', '$CompanySupervisorDesignation', '$DepartmentCompanySupervisor', '$CompanySupervisorContactNumber', '$CompanySupervisorEmail')";

$result = mysql_query($query);

 if($result){
            
echo 
"<h3 align=center> Company Registration has been done successfully</h3>";



   
            }
 else       {
               die('Error: '.mysql_error($db));
             }

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



