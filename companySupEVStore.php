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

                             $Course = $_POST['course'];
                              $ID = $_POST['st_id'];
                              $Name = $_POST['St_Name'];
                              $Major = $_POST['major']; 
                              $Company = $_POST['org'];
                               $Address = $_POST['location'];
                              $Start = $_POST['stdate'];
                              $Pdate = $_POST['cmdate'];
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
                              $OP = $_POST['opinion'];
                               $SP = $_POST['name'];
                                $DT = $_POST['date'];

$query = "INSERT INTO  companysupev (CourseCode, StudentID, StudentName, major, organisation, address, Sdate, Cdate, comment, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, Gcomments, SupervisorName,dateC)
         VALUES('$Course', $ID,'$Name', '$Major', '$Company', '$Address','$Start','$Pdate', '$Com', '$Q1',
                              '$Q2', '$Q3', '$Q4', '$Q5', '$Q6','$Q7','$Q8', '$Q9', '$Q10',
                              '$OP', '$SP', '$DT')";

                              $result = mysql_query($query);

                               
                                          
                              


                       $check = mysql_query("SELECT * FROM overall_evaluation WHERE student_id = '$ID'");
                       if(mysql_num_rows($check)>0){
                              $externalSuAss = $Q1 + $Q2 + $Q3 + $Q4 + $Q5 + $Q6 + $Q7 + $Q8; 

                              $query = mysql_query("SELECT * FROM mmusupervisor_evaluation WHERE studentID ='$ID'");
                              if($query){
                                    while($row = mysql_fetch_array($query)){
                                          $presentationAss = $row['b1'] + $row['b2'] + $row['b3'] + $row['b4'] + $row['b5'];
                                          $reportAss = $row['b6'] + (2*$row['b7']) + $row['b8'] + $row['b9'];
                                          $ethPRof = ($Q9 + $Q10 + $row['b10'] + $row['b11'])/2; 
                                          $sum = $externalSuAss + $presentationAss + $reportAss + $ethPRof;
                                    }
                              }
                              $update = mysql_query("UPDATE overall_evaluation SET external_supA='$externalSuAss' , presentation_assessment ='$presentationAss' , report_assessment='$reportAss' , ethics = '$ethPRof' , overall_result ='$sum' WHERE student_id='$ID'");
                       }else{

                              $externalSuAss = $Q1 + $Q2 + $Q3 + $Q4 + $Q5 + $Q6 + $Q7 + $Q8; 
                        $query = mysql_query("INSERT INTO overall_evaluation (student_id,external_supA) VALUES ('$ID','$externalSuAss')"); 
                       }
if($result){
      $_SESSION['success'] = 1;
      header('location:mmuSupEV.php');
}
                              ?>