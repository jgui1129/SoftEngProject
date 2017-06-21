<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require("fpdf.php");

//Connect to your database
include("connection.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30, 6, 'ID', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'EVENT NAME', 1, 0, 'L', 1);
$pdf->Cell(100, 6, 'CLIENT', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'VENUE', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'PACKAGETYPE', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'TOTALPRICE', 1, 0, 'R', 1);


// $y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysql_query('select ID, ENAME, CNAME, VENUE, PACKAGETYPE, TOTALPRICE from reservation ORDER BY ID', $link);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(25);
        $pdf->Cell(30, 6, 'EVENT NAME', 1, 0, 'L', 1);
        $pdf->Cell(100, 6, 'CLIENT', 1, 0, 'L', 1);
        $pdf->Cell(30, 6, 'VENUE', 1, 0, 'R', 1);
        $pdf->Cell(30, 6, 'PACKAGETYPE', 1, 0, 'R', 1);
        $pdf->Cell(30, 6, 'TOTALPRICE', 1, 0, 'R', 1);
        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $id = $row['ID'];
    $cname = $row['CNAME'];
    $ename = $row['ENAME'];
    $venue = $row['VENUE'];
    $ptype = $row['PACKAGETYPE'];
    $tprice = $row['TOTALPRICE'];

    $pdf->SetY($y_axis);
    $pdf->SetX(25);
    $pdf->Cell(30, 6, $code, 1, 0, 'L', 1);
    $pdf->Cell(100, 6, $cname, 1, 0, 'L', 1);
    $pdf->Cell(30, 6, $ename, 1, 0, 'R', 1);
    $pdf->Cell(30, 6, $venue, 1, 0, 'R', 1);
    $pdf->Cell(30, 6, $ptype, 1, 0, 'R', 1);
    $pdf->Cell(30, 6, $tprice, 1, 0, 'R', 1);

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

mysql_close($link);

//Send file
$pdf->Output();
?>