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
  
  
 
  <form method="POST" action=mmuSupEVStore.php>
  
  <div class="form-group">
    <input type="radio" name="code" required value="TIT2311"> TIT2311<br>
    <input type="radio" name="code" required value="HIT3011"> HIT3011<br>
    </div>
    
    
    
    <div class="form-group">
      STUDENT ID:
        <input type="text" name="Student_id" required>
      
      STUDENT NAME:
      <input type="text" name="student_name" required>
       <br><br>
       FACULTY:
       <input type="text" name="major" required>
       
       COMPANY ATTACHED:
       <input type="text" name="org" required>
       <br><br>
       DATE OF VISIT:
       <input type="text" name="vdate" required>
      
       DATE OF PRESENTATION:
       <input type="text" name="prdate" required>
       <br><br>
       DATE OF SUBMISSION:
        <input type="text" name="smdate" required>
       </div>
       
       
    <div class="form-group">
      <p>1. OVERALL COMMENTS ON STUDENT PERFORMANCE:</p>
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" name="comment" required id="comment"></textarea>
    </div>
    
   
 
      
      
      <p>2. PRESENTATION ASSESSMENT:</p>      
    
    <div class="form-group">
     <p>(b1) COMMUNICATION SKILLS (e.g. Verbal and written communications, asking questions, presenting a point to view)</p>
    <input type="radio" name="q1" required value="1"> 1 Poor<br>
    <input type="radio" name="q1" required value="2"> 2<br>
    <input type="radio" name="q1" required value="3"> 3<br>
    <input type="radio" name="q1" required value="4"> 4<br>
    <input type="radio" name="q1" required value="5"> 5 <br> Outstanding<br>
    </div>
    
    <div class="form-group">
     <p>(b2) COMPANY BACKGROUND (e.g. Company history,organisation chart,major products/services clearly given)</p>
    <input type="radio" name="q2" required value="1"> 1 Poor<br>
    <input type="radio" name="q2" required value="2"> 2<br>
    <input type="radio" name="q2" required value="3"> 3<br>
    <input type="radio" name="q2" required value="4"> 4<br>
    <input type="radio" name="q2" required value="5required"> 5 <br> Outstanding<br>
    required
    </div>
    
    <div class="form-group">
     <p>(b3) UNDERSTANDING OF TASK/PROJECTS (e.g. Able to define clearly the objectives and activities of given tasks/projects)</p>
    <input type="radio" name="q3" required value="1"> 1 Poor<br>
    <input type="radio" name="q3" required value="2"> 2<br>
    <input type="radio" name="q3" required value="3"> 3<br>
    <input type="radio" name="q3" required value="4"> 4<br>
    <input type="radio" name="q3" required value="5"> 5 <br> Outstanding<br>
    
    </div>

     <div class="form-group">
     <p>(b4) MOTIVATION, PRESENTATION & FLEXIABILITY (e.g. Adapting well to changing circumtances and taking interest in new opportunities)</p>
    <input type="radio" name="q4" required value="1"> 1 Poor<br>
    <input type="radio" name="q4" required value="2"> 2<br>
    <input type="radio" name="q4" required value="3"> 3<br>
    <input type="radio" name="q4" required value="4"> 4<br>
    <input type="radio" name="q4" required value="5"> 5 <br> Outstanding<br>
    
    </div>
   <div class="form-group">
     <p>(b5)TASK DURATION AND SCHEDULE (e.g. Clear schedule of work, justifies 4-month training in presentation)</p>
    <input type="radio" name="q5" required value="1"> 1 Poor<br>
    <input type="radio" name="q5" required value="2"> 2<br>
    <input type="radio" name="q5" required value="3"> 3<br>
    <input type="radio" name="q5" required value="4"> 4<br>
    <input type="radio" name="q5" required value="5"> 5 <br> Outstanding<br>
    
    </div>

     <p>3. REPORT ASSESSMENT:</p>   

    <div class="form-group">
     <p>(b6)PLANNING & ORGANISING (e.g. Using time and resources effectively, setting priorities and planning for contingencies)</p>
    <input type="radio" name="q6" required value="1"> 1 Poor<br>
    <input type="radio" name="q6" required value="2"> 2<br>
    <input type="radio" name="q6" required value="3"> 3<br>
    <input type="radio" name="q6" required value="4"> 4<br>
    <input type="radio" name="q6" required value="5"> 5 <br> Outstanding<br>
    </div>
   
 <div class="form-group">
     <p>(b7) DESCRIPTION OF TASKS/PROJECTS (e.g. Able to define clearly the objectives and activities of given tasks/projects,weekly logs signed)</p>
    <input type="radio" name="q7" required value="1"> 1 Poor<br>
    <input type="radio" name="q7" required value="2"> 2<br>
    <input type="radio" name="q7" required value="3"> 3<br>
    <input type="radio" name="q7" required value="4"> 4<br>
    <input type="radio" name="q7" required value="5"> 5 <br> Outstanding<br>
    
    </div>

    <div class="form-group">
     <p>(b8) APPLICATION OF LEARNING OF SKILLS (e.g. Able to learn technical and non-technical requirements of given tasks/project)</p>
    <input type="radio" name="q8" required value="1"> 1 Poor<br>
    <input type="radio" name="q8" required value="2"> 2<br>
    <input type="radio" name="q8" required  value="3"> 3<br>
    <input type="radio" name="q8" required value="4"> 4<br>
    <input type="radio" name="q8" required value="5"> 5 <br> Outstanding<br>
    
    </div>

    <div class="form-group">
     <p>(b9)ANALYSING & PROBLEM SOLVING (e.g. Identifing inter-relationships from a wider perspectice and finding practical solutions to problems)</p>
    <input type="radio" name="q9" required value="1"> 1 Poor<br>
    <input type="radio" name="q9" required value="2"> 2<br>
    <input type="radio" name="q9" required value="3"> 3<br>
    <input type="radio" name="q9" required value="4"> 4<br>
    <input type="radio" name="q9" required value="5"> 5 <br> Outstanding<br>
    
    </div>
   
    
    
     <p>4. REPORT ASSESSMENT:</p> 
      <div class="form-group">
     <p>(b10) PROFESSIONALISM (e.g. No absenteeism, adhere to company working hours)</p>
    <input type="radio" name="q10" required value="1"> 1 Poor<br>
    <input type="radio" name="q10" required value="2"> 2<br>
    <input type="radio" name="q10" required value="3"> 3<br>
    <input type="radio" name="q10" required value="4"> 4<br>
    <input type="radio" name="q10" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
      <div class="form-group">
     <p>(b11)DISCIPLINE & ETHICAL BEHAVIOUR (e.g. Adhere to company rules & regulations and professional & ethical in work done)</p>
    <input type="radio" name="q11" required value="1"> 1 Poor<br>
    <input type="radio" name="q11" required value="2"> 2<br>
    <input type="radio" name="q11" required value="3"> 3<br>
    <input type="radio" name="q11" required value="4"> 4<br>
    <input type="radio" name="q11" required value="5"> 5 <br> Outstanding<br>
    
    </div>
    
    
    
    
    
  
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

 












