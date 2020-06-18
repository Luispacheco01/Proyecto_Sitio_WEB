<?php

    if($_REQUEST["cotizar"] == ""){
        header("Location:AVISO_Desloguear.php");
    }else{

    $ID = $_REQUEST["cotizar"];

    $n = count($ID);

    $cantidad = $_REQUEST["cantidad"];

    $r = count($cantidad);
    $contador = 0;

    for ($s=0; $s < $r; $s++) { 

        if ($cantidad[$s]>0) {
             $numero[$contador] = $cantidad[$s];
             $contador++;
        }
        
    }

require('librerias/fpdf.php');

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Arial','B',18);
    $this->SetTextColor(8, 115, 198);

    $this->Cell(10);

    $this->Cell(70,10, utf8_decode('Reporte de Cotización'),0,1,'C');

    $this->SetFont('Arial','B',9);
    $this->SetTextColor(128);
    $this->Cell(85,2, utf8_decode('Librería Carolina'),0,0,'C');

    $this->Image('images/logo.png',150,6,43);

    $this->Ln(20);

    $this->SetFont('Arial','B',11);
    $this->SetTextColor(8, 115, 198);

    $this->Cell(35, 6, 'ID_Producto', 1, 0, 'C', 0);
    $this->Cell(90, 6, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(25, 6, 'Precio', 1, 0, 'C', 0);
    $this->Cell(20, 6, 'Cantidad', 1, 0, 'C', 0);
    $this->Cell(20, 6, 'Total', 1, 1, 'C', 0);
     
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
     require_once("BD_conexion.php");
    $objDB=new BaseDatos();

    include("conexion.php");

    $consulta = "SELECT * FROM Productos";
    $resultado = $conexion->query($consulta);    

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while( $row = $resultado->fetch_assoc()){

    for($i=0; $i<$n; $i++)
    {
        if($row['ID_Producto'] == $ID[$i]){
            $total = 0;
            $precio = 0;
            $precio = $row['Precio'];
            $total = $precio * $numero[$i];

            $inicial = $row['Cantidad'];
            $quitar = $numero[$i];

            $resta = $inicial - $quitar;

            if($objDB->ModificarProducto2($ID[$i], $resta)==true){
                    
                }else{
                    
                }

            $inicial = 0;
            $quitar = 0;
            $resta = 0;
            
            $pdf->SetTextColor(128);
            $pdf->Cell(35, 6, $row['ID_Producto'], 1, 0, 'C', 0);
            $pdf->Cell(90, 6, $row['Nombre'], 1, 0, 'C', 0);
            $pdf->Cell(25, 6, '$ '.$row['Precio'], 1, 0, 'C', 0);
            $pdf->Cell(20, 6, $numero[$i], 1, 0, 'C', 0);
            $pdf->Cell(20, 6, '$ '.$total, 1, 1, 'C', 0);
             $total = 0;
             $precio = 0;
        }
    }
}

$pdf->Output();
}

?>