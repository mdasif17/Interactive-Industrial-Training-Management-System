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
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                  <?php
  if(isset($_SESSION['success']))
  if($_SESSION['success'] ==1 ){
    echo '<h3>Successfully evaluated.</h3>';
    $_SESSION['success'] = 0;
  }
  ?>

<div class="container">
  <h3>FACULTY OF INFORMATION SCIENCE AND TECHNOLOGY</h3>


  
 
  <form method="POST" action=companySupEVStore.php>
  
  <div class="form-group">
    <input type="radio" name="course" required value="TIT2311"> TIT2311<br>
    <input type="radio" name="course" required value="HIT3011"> HIT3011<br>
    </div>
    
    
    
    <div class="form-group">
      STUDENT ID:
        <input type="text" name="st_id" required>
      
      STUDENT NAME:
      <input type="text" name="St_Name" required>
       <br><br>
       STUDENT MAJOR:
       <input type="text" name="major" required>
       <br><br>
       ORGANIZATION:
       <input type="text" name="org" required>
       <br><br>
       ADDRESS:
       <input type="text" name="location" required>
       <br><br>
       TRAINING PERIOD<br>
       START DATE:
       <input type="text" name="stdate" required>
       COMPLETION DATE:
        <input type="text" name="cmdate" required>
       </div>
       
        
       <h5>To the Supervisor/Manager:<br>Kindly please complete the following sections:<h5>
       <h6> 1. Overall Project Execution And Outcome.</h6>
       <h6> 2. Student's Assessmnet: 10 Assessment Criteria</h6>
       <h6> 3. Other General Comments </h6><br>
       
    
   
    <div class="form-group">
      <p>1. OVERALL PROJECT EXECUTION AND OUTCOME:</p>
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" name="comment" required id="comment"></textarea>
    </div>
    
   
 
      
      
      <p>2. STUDENT'S ASSESSMENT:</p>
     <div class="form-group">
     <p>(a1)PLANNING & ORGANISING (e.g. Using time and resources effectively, setting priorities and planning for contingencies)</p>
    <input type="radio" name="q1" required  value="1"> 1 Poor<br>
    <input type="radio" name="q1" required  value="2"> 2<br>
    <input type="radio" name="q1" required   value="3"> 3<br>
    <input type="radio" name="q1" required value="4"> 4<br>
    <input type="radio" name="q1" required  value="5"> 5 <br> Outstanding<br>
    </div>
   
    
    <div class="form-group">
     <p>(a2)COMMUNICATION SKILLS (e.g. Verbal and written communications, asking questions, presenting a point to view)</p>
    <input type="radio" name="q2" required  value="1"> 1 Poor<br>
    <input type="radio" name="q2" required  value="2"> 2<br>
    <input type="radio" name="q2" required  value="3"> 3<br>
    <input type="radio" name="q2" required  value="4"> 4<br>
    <input type="radio" name="q2" required  value="5"> 5 <br> Outstanding<br>
    </div>
    
    <div class="form-group">
     <p>(a3)UNDERSTANDING OF TASKS/PROJECTS (e.g. Able to define clearly the objectives and activities of given tasks/projects)</p>
    <input type="radio" name="q3" required value="1"> 1 Poor<br>
    <input type="radio" name="q3" required value="2"> 2<br>
    <input type="radio" name="q3" required value="3"> 3<br>
    <input type="radio" name="q3" required value="4"> 4<br>
    <input type="radio" name="q3" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
    <div class="form-group">
     <p>(a4)TEACHING SKILLS (e.g. Have adequate technical ability to apply in given task/projects)</p>
    <input type="radio" name="q4" required value="1"> 1 Poor<br>
    <input type="radio" name="q4" required value="2"> 2<br>
    <input type="radio" name="q4" required value="3"> 3<br>
    <input type="radio" name="q4" required value="4"> 4<br>
    <input type="radio" name="q4" required value="5"> 5 <br> Outstanding<br>
    
    </div>
   <div class="form-group">
     <p>(a5)LEARNING SKILLS (e.g. Able to learn technical and non-technical requirements of the given tasks/projects)</p>
    <input type="radio" name="q5" required value="1"> 1 Poor<br>
    <input type="radio" name="q5" required value="2"> 2<br>
    <input type="radio" name="q5" required value="3"> 3<br>
    <input type="radio" name="q5" required value="4"> 4<br>
    <input type="radio" name="q5" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    <div class="form-group">
     <p>(a6)ANALYSING & PROBLEM SOLVING (e.g. Identifing inter-relationships from a wider perspectice and finding practical solutions to problems)</p>
    <input type="radio" name="q6" required value="1"> 1 Poor<br>
    <input type="radio" name="q6" required value="2"> 2<br>
    <input type="radio" name="q6" required value="3"> 3<br>
    <input type="radio" name="q6" required value="4"> 4<br>
    <input type="radio" name="q6" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    <div class="form-group">
     <p>(a7)MOTIVATION, PRESENTATION & FLEXIABILITY (e.g. Adapting well to changing circumtances and taking interest in new opportunities)</p>
    <input type="radio" name="q7" required value="1"> 1 Poor<br>
    <input type="radio" name="q7" required value="2"> 2<br>
    <input type="radio" name="q7" required value="3"> 3<br>
    <input type="radio" name="q7" required value="4"> 4<br>
    <input type="radio" name="q7" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
     <div class="form-group">
     <p>(a8)INNOVATION & ENTREPRENEUSHIP (e.g. Creative Thinking in work,extra effort in given tasks/projects)</p>
    <input type="radio" name="q8" required value="1"> 1 Poor<br>
    <input type="radio" name="q8" required value="2"> 2<br>
    <input type="radio" name="q8" required value="3"> 3<br>
    <input type="radio" name="q8" required value="4"> 4<br>
    <input type="radio" name="q8" required value="5"> 5 <br> Outstanding<br>
    
    </div>
      <div class="form-group">
     <p>(a9)ATTENDANCE & PUNCTUALITY (e.g. No absenteeism, adhere to company working hours)</p>
    <input type="radio" name="q9" required value="1"> 1 Poor<br>
    <input type="radio" name="q9" required value="2"> 2<br>
    <input type="radio" name="q9" required value="3"> 3<br>
    <input type="radio" name="q9" required value="4"> 4<br>
    <input type="radio" name="q9" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
      <div class="form-group">
     <p>(a10)DISCIPLINE & ETHICAL BEHAVIOUR (e.g. Adhere to company rules & regulations and professional & ethical in work done)</p>
    <input type="radio" name="q10" required value="1"> 1 Poor<br>
    <input type="radio" name="q10" required value="2"> 2<br>
    <input type="radio" name="q10" required value="3"> 3<br>
    <input type="radio" name="q10" required value="4"> 4<br>
    <input type="radio" name="q10" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
    <p> Note: For student to pass, total of a1-a8 must be 20 or more, and total of a9-a10 must be 5 or more.</p>
     <div class="form-group">
      <p>3. OTHER GENERAL COMMENTS(including areas for improvement)
      <label for="opinion"></label>
      <textarea class="form-control" rows="5" name="opinion" required id="opinion"></textarea>
    </div>
    
    <div class="form-group">
      Supervisor/Manager's Name:
        <input type="text" name="name" required>
        <br><br>
      
      Date:
      <input type="text" name="date" required>
        <br><br><br><br><br><br> 
        <p> Signature & Stamp: ------------------------- </p>
        
    
    
  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
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



                            
                            
                             
                             
                              


