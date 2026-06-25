<?php

include("../db.php");

require("../fpdf/fpdf.php");

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont(
'Arial',
'B',
16
);

$pdf->Cell(
0,
10,
'ErrandPal Task Report',
0,
1
);

$pdf->Ln(5);

$result=mysqli_query(
$conn,
"SELECT *
FROM tasks"
);

while(
$row=mysqli_fetch_assoc($result)
){

$pdf->SetFont(
'Arial',
'',
12
);

$pdf->Cell(
0,
10,
"Task : ".
$row['title'].
" | Status : ".
$row['status'],
0,
1
);

}

$pdf->Output();

?>