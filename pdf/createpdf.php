<?php
require('fpdf.php');
$pdf=new PDF_HTML();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
$pdf->Image('images/logo.png',18,13,33);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>Click4Knowledge Web Programming Blog, Tutorials, jQuery, Ajax, PHP, MySQL and Demos</h1><br>
Website: <u>www.click4knowledge.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');
$pdf->SetFont('Arial','B',7); 
$htmlTable='<TABLE>
<TR>
<TD>Name:</TD>
</TR>
<TR>
<TD>Email:</TD>
</TR>
<TR>
<TD>Phone:</TD>
</TR>
</TABLE>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>