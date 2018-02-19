<?php 
	include("conexion.php");	
	$telefono = 'SELECT * FROM linea ORDER BY idLinea';	
	$telefonos=$conexion->query($telefono);

if(isset($_POST['export2'])){
	require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Administrador');
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';

	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">REPORTE TELEFONOS</h1>

      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>ID</th>
            <th>telefonoC</th>
            <th>telefonoL</th>
            <th>enUso</th>
            <th>Tarifa</th>
          </tr>
        </thead>
	';

	while ($tel=$telefonos->fetch_assoc()) { 
//			if($user['activo']=='A'){  $color= '#f5f5f5'; }else{ $color= '#fbb2b2'; }
	$content .= '
		<tr>
            <td>'.$tel['idLinea'].'</td>
            <td>'.$tel['telefonoC'].'</td>
            <td>'.$tel['telefonoL'].'</td>
            <td>'.$tel['enUso'].'</td>
            <td>'.$tel['tarifa'].' GB</td>
        </tr>
	';
	}

	$content .= '</table>';

	

	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>