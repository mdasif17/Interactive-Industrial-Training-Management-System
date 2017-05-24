<?php

require('WriteHTML.php');

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


$pdf = new PDF_HTML();
$pdf->AliasNbPages();

////add page page automatically for its true parameter

$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();



$pdf->Image('images/logo.PNG', 18, 13);
//set font style


$pdf->SetFont('Arial', 'B', 14);
$pdf->WriteHTML('<center><br><br><br><br><br><br><br><br><br><br>'
        . '<h1>                 FACULTY OF INFORMATION SCIENCE AND TECHNOLOGY</h1></center>');

//set the form of pdf

$pdf->SetFont('Arial', '', 9);



$sql = "SELECT * FROM users where role = 'student' AND id='".$_REQUEST['userid']."'";

$result = mysql_query($sql);
$row=  mysql_fetch_array($result);

$pdf->WriteHTML('<br><br><br><span>30 November 2015                                                                      '
        . '                                                      Ref No:FIST/ITP/'.$row['semester_no'].'_'.$row['semester_session'].'/'.$row['id'].'  </span><br><br>');
$pdf->WriteHTML('<span>To Whom It May Concern</span><br><br>');
$pdf->WriteHTML('<span>Dear Sir/Madam,</span><br><br>');

$pdf->SetFont('Arial', 'B', 9);
$pdf->WriteHTML('<span >Industrial Training Program, Session '.$row['semester_session'].',Trimester '.$row['semester_no'].'</span><br>');

$pdf->SetFont('Arial', '', 5);
$pdf->WriteHTML('-------------------------------------------------------------------------------------------------------------------------------------------------------------<br>');

$pdf->SetFont('Arial', '', 10);
$pdf->WriteHTML('<span>Multimedia University (MMU) is the first goverment approved private university located in Cyberjaya and Melaka.For your information, we specialize in the fields of Telecommunications, Multimedia and Information technology. MMU aims to develop students,not only to achieve academic excellence,but also to be familiar with the industrial practices and to improve communication skills. As part of our integrated curriculum, our third year students are required to undergo an Industrial Training Program and we would like to kindly invite your organization to participate in this program.</span><br>');

$pdf->SetFont('Arial', '', 10);
//assign the form post value in a variable and pass it. 
    $trimester="";
if($row['semester_no']==1){
    $trimester="1st";
}else if($row['semester_no']==2){
    $trimester="2nd";
}else if($row['semester_no']==3){
    $trimester="3rd";
    
}
$pdf->WriteHTML('<br><span>For the '.$trimester.' Trimester '.$row['semester_session'].' the program is scheduled to comence on 14 February 2017 until 13 May 2017(approxiamately 13 weeks).The final year students are majoring in Information System Engineering, Software Engineering,Data Communication and Networking, Security Technology,Artificial Intelligence, Business Information System and Information Technology Management.They have cimplete courses in programming,Database System, operating systems and data communications as well as System Analysis and Design.</span><br>');

$pdf->WriteHTML('<br><span>This Letter is to confirm that this student, '.$row['name'].'  (ID No. '.$row['user_id'].') is currently a student at MMU and is applying for a training placement at your organization.Should you have any quiries,Please do not hesitate to contact us.</span>');

$pdf->WriteHTML('<br><br><br><span >Thank You</span><br>');

$pdf->WriteHTML('<br><span >Yours Sincerely</span><br>');
$pdf->WriteHTML('<br><br><br><br><span >Assoc. Prof. Dr. Md Shohel Sayeed</span><br>');
$pdf->WriteHTML('<span >Coordinator of Industrial Training Programme</span><br>');
$pdf->WriteHTML('<span >Faculty of Information Science and Technology</span><br>');

//$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial', 'B', 6);
$pdf->Output();
?>