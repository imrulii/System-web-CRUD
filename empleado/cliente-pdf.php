<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFont('Helvetica','',15);
    $this->Image('../imagenes/Vector-PNG-Images-HD.png',0,0,118);
    $this->Image('../imagenes/UNLAR.png',163,-12,50);
    $this->setXY(72,22);
    $this->Cell(10,8,'Nacionalidad de los Clientes',0,1,'c',0);
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    
    $this->SetY(-15);

    $this->SetFont('Arial','B',8);
    
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

include ('../db.php');
$consulta = "SELECT  Nacionalidad, Ciudad, count(*) as registro  FROM clientes GROUP BY  Ciudad";
$resultado = $conexion->query($consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(223, 223, 223 );
$pdf->SetDrawColor(61,61,61);
$pdf->setX(25);
$pdf->Cell(55,8,'Cantidad',1,0,'C',1);
$pdf->Cell(55,8,'Nacionalidad',1,0,'C',1);
$pdf->Cell(55,8,'Ciudad',1,1,'C',1);
$pdf->SetfillColor(255,255,255);
while($row = $resultado->fetch_assoc()){
    $pdf->setX(25);
    $pdf->Cell(55,8,$row['registro'],1,0,'C',1);
    $pdf->Cell(55,8,utf8_decode($row['Nacionalidad']),1,0,'C',1);
    $pdf->Cell(55,8,utf8_decode($row['Ciudad']),1,1,'C',1);
}
$pdf->Output();
?>