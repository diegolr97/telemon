<?php
include("conexion.php");
require "fpdf.php";

if(isset($_POST['personaVerPDF'])){

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(200,5,'Ayuntamiento Montellano',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(200,10,'Personas',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',0);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetX(79);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(40,10,'Nombre',1,0,'C');
        $this->Ln();
    }
    function viewTable($conexion){
    $query = "SELECT * FROM persona";
    $resultado = $conexion->query($query);
    while($row=$resultado->fetch_assoc())
    {
        $this->SetX(79);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,$row['idPersona'],1,0,'C');
        $this->Cell(40,10,$row['nombre'],1,0,'C');
        $this->Ln();
        
    }
    }
    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($conexion);
$pdf->Output();
}



?>