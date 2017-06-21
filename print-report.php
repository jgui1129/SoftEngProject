<?php

	require('tcpdf/tcpdf.php');
	include('connection.php');

	// $val = $_GET['val'];

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'PDF_FORMAT', true, 'UTF-8',false);

	$pdf->SetAutoPageBreak(true,15);
	$pdf->AddPage();

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

	$htmlheader = "OME | Occasion Made easy ™<br>";
	$pdf->WriteHTML($htmlheader);
	$result = mysqli_query($conn,"SELECT * from reservation");

	$pdf->SetFont('','B',10);
	$htmlContent = '<br/>
	<h2>'.$val.' </h2>
	<table class="table" width="100% border="1">
	<tr>
	<th>Event Name</th>
	<th>Client Name</th>
	<th>Venue</th>
	<th>Package Type</th>
	<th>Total Price</th></tr><br>
	<hr/>';
	
	while($row = mysqli_fetch_array($result)) {
		$temp1 = $row["ID"];
		$temp2 = $row["ENAME"];
		$temp3 = $row["CNAME"];
		$temp4 = $row["VENUE"];
		$temp5 = $row["PACKAGETYPE"];
		$temp6 = $row["TOTALPRICE"];
		$htmlContent .='
		<tr>
		<td>'.$temp1.' </td>
		<td>'.$temp2.' </td>
		<td>'.$temp3.' </td>
		<td>'.$temp4.' </td>
		<td>'.$temp5.' </td>
		<td>'.$temp6.' </td></tr>
		<hr/>'	;

	};

	$pdf->WriteHTML($htmlContent);
	$pdf->Output();




?>	