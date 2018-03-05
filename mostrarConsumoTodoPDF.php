<?php
session_start();
include("conexion.php");
require "fpdf.php";

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(200,5,'Ayuntamiento Montellano',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(200,10,'Consumo de personas activas',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',0);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetX(22);
        $this->SetFont('Times','B',12);
        $this->Cell(60,10,'Nombre',1,0,'C');
        $this->Cell(40,10,'TelefonoC',1,0,'C');
        $this->Cell(40,10,'Consumo(Euros)',1,0,'C');
        $this->Cell(25,10,'Fecha',1,0,'C');
        $this->Ln();
    }
    function viewTable($conexion){
    $fechainicio = $_GET['fechainicio3'];
    $fechafinal = $_GET['fechafinal3'];
    
    $fechainicio2 = explode('-', $fechainicio);
    $fechainicio3 = $fechainicio2[0]."-".$fechainicio2[1]."-".$fechainicio2[2];
    
    $fechafinal2 = explode('-', $fechafinal);
    $fechafinal3 = $fechafinal2[0]."-".$fechafinal2[1]."-".$fechafinal2[2];
        
    $query = "select * from linea a, lineapersona b, consumo c, persona d where a.idLinea=b.idLinea and b.idLinea =c.idLinea and d.idPersona = b.idPersona and b.idPersona=c.idPersona and c.fecha BETWEEN '$fechainicio3' AND '$fechafinal3' and b.activo='Si'";
        
    $resultado = $conexion->query($query);
    while($row=$resultado->fetch_assoc())
    {
        $this->SetX(22);
        $this->SetFont('Times','B',12);
        $this->Cell(60,10,$row['nombre'],1,0,'C');
        $this->Cell(40,10,$row['telefonoC'],1,0,'C');
        $this->Cell(40,10,$row['consumo'],1,0,'C');
        $this->Cell(25,10,$row['fecha'],1,0,'C');
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






?>