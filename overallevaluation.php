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


$sql = "SELECT * FROM overall_evaluation where id='".$_REQUEST['id']."'";

$result = mysql_query($sql);
$row=  mysql_fetch_array($result);


$pdf = new PDF_HTML();
$pdf->AliasNbPages();

////add page page automatically for its true parameter

$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
//add images or logo which you want
$pdf->SetFont('Arial', 'B', 14);
$pdf->WriteHTML('                              ');
$pdf->Image('images/logo.jpg', 36, 14, 133);
//set font style
$pdf->SetFont('Arial', 'B', 14);
$pdf->WriteHTML('<para><br><br><br><br><h1>SUMMARY OF INFORMATION ON EACH COURSE</h1></para>');
$pdf->SetFont('Arial', '', 11);
$pdf->WriteHTML('<para>                        TIT2311 INDUSTRIAL TRAINING</para>');
$pdf->WriteHTML('<para>                             OVERALL EVALUATION</para><br><br><br>');

//set the form of pdf


$sql1 = "SELECT * FROM users where role = 'student' AND user_id='".$row['student_id']."'";

$result1 = mysql_query($sql1);
$row1=  mysql_fetch_array($result1);
$pdf->SetFont('Arial', '', 11);
$pdf->WriteHTML('<h4>Student Name & ID:  '.$row1['name'].', '.$row['student_id'].'</h4><br><br>');
$pdf->WriteHTML('<h4>Student Major:      '.$row1['student_major'].'</h4><br><br>');
$pdf->WriteHTML('<h4>Company Attached:   </h4><br><br>');
$status="";
if($row['overall_result']>50){
    $status="Pass";
}else{
    $status="Fail";
}

$pdf->SetFont('Arial', '', 11);
$htmlTable2 = '<TABLE>';
$htmlTable2.= '<TR>
            <TD>ASSESMENT CRITERIA</TD>
            <TD>Sections</TD>
            <TD>Marks</TD>
            </TR>
            <TR>
            <TD>A.EXTERNAL SUPERVISOR ASSESSMENT (40%)
            -To be assessed by external supervisor
            -external supervisor evaluation form attached
            ( A student must achieve at least 20% r above to pass this section)
            </TD>
            <TD> (a1 + a2 +....+a8)</TD>
            <TD>'.$row['external_supA'].'</TD>
            </TR>
            <TR>
            <TD>B. PRESENTATION ASSESSMENT (25%)
            -To be assessed by MMU supervisor and presentation panel
            -company background presented
            -tasks clearly described
            -justification of the paper 3 months TRAINING
            (A student must acheive at least 12.5% or above to pass this section)
            </TD>
            <TD>(b1 + b2+....+b5)</TD>
            <TD>'.$row['presentation_assessment'].'</TD>
            </TR>
            <TR>
            <TD>C.REPORT ASSESSMENT(25%)
            - To be assessed by MMU supervisor
            - report flow specified format
            - supporting documents/screen shots attached
            - weekly logs attached and signed by the company supervisor
            (A student must acheive at least 12.5% or above to pass this section)
            </TD>
            <TD>(b6+2b7+b8+b9)</TD>
            <TD>'.$row['report_assessment'].'</TD>
            </TR>
            <TR>
            <TD>D. ETHICS & PROFESSIONAL CONDUCT (10%) 
            - EXTERNAL supervisor: attendance,punctuality,discipline,ethics
            -internal supervisor: professionalism,discipline,ethics
            (A student must acheive at least 5% or above to pass this section)
            </TD>
            <TD>(a9+a10+b10+b11)/2</TD>
            <TD>'.$row['ethics'].'</TD>
            </TR>
            <TR>
            <TD>E. OVERALL RESULT
            PASS status- Passed ALL sections A,B,C,D
            </TD>
            <TD>'.$status.'</TD>
            <TD>'.$row['overall_result'].'</TD>
            </TR>
            <TR>';

$htmlTable2.= '</TABLE>';

$pdf->WriteHTML7($htmlTable2);


$pdf->SetFont('Arial', '', 11);
$htmlTable2 = '<TABLE>';
$htmlTable2.= '<TR>
            <TD>
            

(Supervisor\'s signature)
</TD>
            <TD>Sections</TD>
            <TD>Marks</TD>
            </TR>';

$htmlTable2.= '</TABLE>';
$htmlTable2 = '<TABLE>';
$htmlTable2.= '
            <TR>
            <TD>
.            
.            
.      
(Supervisor\'s signature)
            </TD>
            <TD>
.            
.            
.
(Supervisor\'s name)</TD>
            <TD>
.            
.            
.
            (Date)</TD>
            </TR>';

$htmlTable2.= '</TABLE>';
$pdf->WriteHTML7($htmlTable2);


//$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial', 'B', 6);
$pdf->Output();
?>