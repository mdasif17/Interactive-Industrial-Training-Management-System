<?php 
$html = 
'<!DOCTYPE html>
<html>

<body>
<table>
	<tr>
<h2 > FACULTY OF INFORMATION SCIENCE AND TECHNOLOGY</h2>
	</tr>
	</table>
<table height="100px">
	<tr>
		<td><h4> 30 November 2015</h4> </td>
		<td>Ref No:</td>
		
	</tr>
	</table>
<table>
	<tr>
		<td colspan="2"><h4>To Whom It May Concern</h4></td>
	</tr>
	</table>
<table>


	<tr>
		<td><h4>Dear Sir/Madam,<h4></td>
		</tr>
		<tr><td><h3>Industrial Training Program, Session 2016/2017,Trimester 2</h3></td>
	</tr>
	
	<tr>
		<td colspan="2">Multimedia University (MMU) is the first goverment approved private university located in Cyberjaya and Melaka.For your information, we specialize in the fields of Telecommunications, Multimedia and Information technology. MMU aims to develop students,not only to achieve academic excellence,but also to be familiar with the industrial practices and to improve communication skills. As part of our integrated curriculum, our third year students are required to undergo an Industrial Training Program and we would like to kindly invite your organization to participate in this program.</td>
	</tr>
	</table>

	<table>
		
	<tr >
		<td style="padding-top:30px" colspan="2">For the 2nd Trimester 2016/2017 the program is scheduled to comence on 14 February 2017 until 13 May 2017(approxiamately 13 weeks).The final year students are majoring in Information System Engineering, Software Engineering,Data Communication and Networking, Security Technology,Artificial Intelligence, Business Information System and Information Technology Management.They have cimplete courses in programming,Database System, operating systems and data communications as well as System Analysis and Design.</td>
	</tr>
	
	</table>

	<table>

	<tr style="padding-top:30px">
		<td colspan="2"> This Letter is to confirm that this student, MD ASIF MUSTABA  (ID No. 1141123591) is currently a student at MMU and is applying for a training placement at your organization.Should you have any quiries,Please do not hesitate to contact us.</td>
	</tr>
	

	<tr>
		<td>
		Thank You.	
		</td>
	</tr>

	<tr>
		<td></td>
	</tr>	
	<tr>
		<td></td>
	</tr>
	<tr>
		<td>
			Yours Sincerely
		</td>
	</tr>
	
</table>

</body>
</html>'; 

require_once('html2fpdf.php');
// Create new HTML2PDF class for an A4 page, measurements in mm
$pdf = new HTML2FPDF('P','mm','A4');

// Optional top margin
$pdf->SetTopMargin(1);
$pdf->AddPage();
// Control the x-y position of the html
$pdf->SetXY(0,0);
        $attr=array();
        $attr['HEIGHT']=1;
$pdf->WriteHTML($html);

// The 'D' arg forces the browser to download the file 
$pdf->Output('MyFile.pdf','D');
?>