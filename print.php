<?php


	require('tcpdf/tcpdf.php');
	include('connection.php');

	$val = $_GET['val'];

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'PDF_FORMAT', true, 'UTF-8',false);

	$pdf->SetAutoPageBreak(true,15);
	$pdf->AddPage();

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

	$htmlheader = "OME | Occasion Made easy ™<br>";
	$pdf->WriteHTML($htmlheader);
	$result = mysqli_query($conn,"SELECT * from tasking WHERE N = '$val'");

	$pdf->SetFont('','B',10);
	$htmlContent = '<br/>
	<h2>'.$val.' </h2>
	<table class="table" border="1">
	<tr>
	<th>Program</th>
	<th>Details</th>
	<th>Assignment</th>
	<th>Coordinator in-charge</th></tr><br>
	<hr>';
	
	while($row = mysqli_fetch_array($result)) {
		$temp1 = $row["FIRST"];
		$temp2 = $row["SECOND"];
		$temp3 = $row["THIRD"];
		$temp4 = $row["FOURTH"];

		$htmlContent .='
		<tr>
		<td>'.$temp1.' </td>
		<td>'.$temp2.' </td>
		<td>'.$temp3.' </td>
		<td>'.$temp4.' </td></tr>
		<hr/>'	;

	};

	$pdf->WriteHTML($htmlContent);
	$pdf->Output();




?>	