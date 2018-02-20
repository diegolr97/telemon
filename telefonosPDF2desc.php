<?php
include("conexion.php");
require "fpdf.php";

if(isset($_POST['export3'])){

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(200,5,'Ayuntamiento Montellano',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(200,10,'Telefonos',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',0);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetX(21);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(40,10,'TelefonoC',1,0,'C');
        $this->Cell(60,10,'TelefonoL',1,0,'C');
        $this->Cell(20,10,'EnUso',1,0,'C');
        $this->Cell(25,10,'Tarifa(GB)',1,0,'C');
        $this->Ln();
    }
    function viewTable($conexion){
    $query = "SELECT * FROM linea";
    $resultado = $conexion->query($query);
    while($row=$resultado->fetch_assoc())
    {
        $this->SetX(21);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,$row['idLinea'],1,0,'C');
        $this->Cell(40,10,$row['telefonoC'],1,0,'C');
        $this->Cell(60,10,$row['telefonoL'],1,0,'C');
        $this->Cell(20,10,$row['enUso'],1,0,'C');
        $this->Cell(25,10,$row['tarifa'],1,0,'C');
        $this->Ln();
        
    }
    }
    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($conexion);
$pdf->Output('telefonos.pdf','D');
}


?>