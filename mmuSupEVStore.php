<?php
session_start();

                               $db = mysql_connect("localhost","root",""); 
                               if (!$db) {
                               die("Database connection failed  " . mysql_error());
                               }

                               $db_select = mysql_select_db("itms",$db);
                               if (!$db_select) {
                               die("Database selection failed " . mysql_error());
                               }

                             $Course = $_POST['code'];
                              $ID = $_POST['Student_id'];
                              $Name = $_POST['student_name'];
                              $Major = $_POST['major']; 
                              $Company = $_POST['org'];
                              $Visit = $_POST['vdate'];
                              $Pdate = $_POST['prdate'];
                              $Sdate = $_POST['smdate'];
                              $Com = $_POST['comment'];
                              $Q1 = $_POST['q1'];
                              $Q2 = $_POST['q2'];
                              $Q3 = $_POST['q3'];
                              $Q4 = $_POST['q4'];
                              $Q5 = $_POST['q5'];
                              $Q6 = $_POST['q6'];
                              $Q7 = $_POST['q7'];
                              $Q8 = $_POST['q8'];
                              $Q9 = $_POST['q9'];
                              $Q10 = $_POST['q10'];
                              $Q11 = $_POST['q11'];

$query = "INSERT INTO  mmusupervisor_evaluation (course_code, studentID, studentName, faculty, companyName, dateV, dateP, dateS, comment, b1, b2,b3, b4, b5, b6, b7, b8, b9, b10, b11)
         VALUES('$Course', $ID,'$Name', '$Major', '$Company', '$Visit','$Pdate','$Sdate', '$Com', '$Q1',
                              '$Q2', '$Q3', '$Q4', '$Q5', '$Q6','$Q7','$Q8', '$Q9', '$Q10',
                              '$Q11')";

                              $result = mysql_query($query);

                              



                              $check = mysql_query("SELECT * FROM overall_evaluation WHERE student_id = '$ID'");
                       if(mysql_num_rows($check)>0){
                              $presentationAss = $Q1 + $Q2 + $Q3 + $Q4 + $Q5; 
                              $reportAss = $Q6 + (2*$Q7) + $Q8 + $Q9;

                              $query = mysql_query("SELECT * FROM companysupev WHERE StudentID ='$ID'");
                              if($query){
                                    while($row = mysql_fetch_array($query)){
                                          $externalSuAss = $row['a1'] + $row['a2'] + $row['a3'] + $row['a4'] + $row['a5'] + $row['a6'] + $row['a7'] + $row['a8'];
                                          $ethPRof = ($Q11 + $Q10 + $row['a10'] + $row['a9'])/2; 
                                          $sum = $externalSuAss + $presentationAss + $reportAss + $ethPRof;
                                    }
                              }
                              $update = mysql_query("UPDATE overall_evaluation SET presentation_assessment ='$presentationAss' , report_assessment='$reportAss' , ethics = '$ethPRof' , overall_result ='$sum' WHERE student_id='$ID'");
                       }else{

                              $presentationAss = $Q1 + $Q2 + $Q3 + $Q4 + $Q5; 
                              $reportAss = $Q6 + (2*$Q7) + $Q8 + $Q9;
                        $query = mysql_query("INSERT INTO overall_evaluation (student_id,report_assessment,presentation_assessment) VALUES ('$ID','$reportAss','$presentationAss')"); 
                       }

if($result){
      $_SESSION['success'] = 1;
      header('location:mmuSupEV.php');
}
                              ?>