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
                    <a class="navbar-brand" href="index.html">IITMS</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Options <b class="caret"></b></a>
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
                         <li>
                            <a href="companySupEv.php"><i class="fa fa-fw fa-file"></i> Company Supervisor Evaluation</a>
                        </li>
                        <li>
                            <a href="report.php"><i class="fa fa-fw fa-file"></i> Report</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row" style="min-height: 700px">
                        <div class="col-lg-12">
                            <h2>Report checking</h2>
                            <div class="table-responsive">
                                <form method="post" action="pdf/overallevaluation.php">
                                    <div class="form-group">
                                        <label>Student ID:</label>

                                        <input type="text" class="form-control" name="student_id" placeholder="Enter id">


                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </form>
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