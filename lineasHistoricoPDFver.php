<?php
include("conexion.php");
require "fpdf.php";

if(isset($_POST['historicoLineasPDF'])){

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(200,5,'Ayuntamiento Montellano',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(200,10,'Lineas',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',0);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        
        $this->SetFont('Times','B',12);
        $this->Cell(45,10,'Nombre',1,0,'C');
        $this->Cell(35,10,'TelefonoL',1,0,'C');
        $this->Cell(20,10,'TelefonoC',1,0,'C');
        $this->Cell(20,10,'Tarifa(GB)',1,0,'C');
        $this->Cell(30,10,'Fecha Alta',1,0,'C');
        $this->Cell(40,10,'Fecha Baja',1,0,'C');
        $this->Ln();
    }
    function viewTable($conexion){
    $query = "SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='No'";
    $resultado = $conexion->query($query);
    while($row=$resultado->fetch_assoc())
    {
        
        $this->SetFont('Times','B',12);
        $this->Cell(45,10,$row['nombre'],1,0,'C');
        $this->Cell(35,10,$row['telefonoL'],1,0,'C');
        $this->Cell(20,10,$row['telefonoC'],1,0,'C');
        $this->Cell(20,10,$row['tarifa'],1,0,'C');
        $this->Cell(30,10,$row['fAlta'],1,0,'C');
        $this->Cell(40,10,$row['fBaja'],1,0,'C');
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