<?php 
    require('../fpdf/fpdf.php');
    $ano="20";

    class PDF extends FPDF
    {
        function Footer()
        {
            // Go to 1.5 cm from bottom
            $this->SetY(-15);
            // Select Arial italic 8
            $this->SetFont('Arial','I',8);
            // Print centered page number
            $this->Cell(0,10,utf8_decode('Estado 279, CURICÓ'),0,0,'L');
            $this->Cell(-185,10,utf8_decode('www.curico.cl - PÁGINA ').$this->PageNo(),0,0,'C');
            $this->Cell(0,10,'+56 75 54 7500 ANEXO: 7601 ',0,0,'R');
        }
    }

    $pdf = new FPDF();
    $pdf ->AddPage();
    $pdf ->SetFont('Arial','',8);
    $pdf ->Image('../imagenes/escudog.png',20,8,15,15,'png');
    $pdf ->Image('../imagenes/cuabierto.gif',170,8,17,17,'gif');
    $pdf ->SetFont('Arial','',9);
    $pdf ->Cell(135,10,'',0);
    $pdf ->Cell(40,10,'Impreso: '.date("d/m/".$ano."y").'',0);
    $pdf ->Ln(10);
    $pdf ->SetFont('Arial','',8);
    $pdf ->Cell(123,10,utf8_decode('I. Municipalidad de Curicó'),0);
    $pdf ->Ln(3);
    $pdf ->SetFont('Arial','',8);
    $pdf ->Cell(123,11,'DIDECO - Org. Comunitarias',0);
    $pdf ->Ln(15);
    $pdf ->SetFont('Arial','B',16);
    $pdf ->Cell(50,8,'',0);
    $pdf ->MultiCell(100,8,'INFORME RECIBO SISTEMA NAVIDAD ',0, 'C');

    $pdf ->Ln(15);
    $pdf ->SetFont('Arial','B',13);
    $pdf ->Cell(20,6,'',0);
    $pdf ->Cell(150,6,'YO: ____________________________ R.U.T: _____________ DELEGADO',0, 0, 'C');
    $pdf ->Ln(7);
    $pdf ->Cell(20,6,'',0);
    $pdf ->Cell(150,6,' DE LA JUNTA DE VECINOS _______________________________________  ',0, 0, 'C');
    $pdf ->Ln(7);
    $pdf ->Cell(20,6,'',0);
    $pdf ->Cell(150,6,'DECLARO QUE EN CONFORMIDAD RECIBO ',0, 0, 'C');
    $pdf ->Ln(7);
    $pdf ->Cell(20,6,'',0);
    $pdf ->Cell(150,6,'UNA CANTIDAD DE: _____  JUGUETES PROVENIENTES ',0, 0, 'C');
    $pdf ->Ln(7);
    $pdf ->Cell(20,6,'',0);
    $pdf ->Cell(150,6,utf8_decode('DE LA MUNICIPALIDAD DE CURICÓ. '),0, 0, 'C');
    $pdf ->Ln(55);
    $pdf ->Cell(60,6,'',0);
    $pdf ->Cell(70,6,'________________________',0, 0, 'C');
    $pdf ->Ln(5);
    $pdf ->SetFont('Arial','B',9);
    $pdf ->Cell(60,6,'',0);
    $pdf ->Cell(70,6,'FIRMA DELEGADO',0, 0, 'C');
    $pdf ->Ln(105);
    $pdf ->SetFont('Arial','B',9);
    $pdf ->Cell(10,6,'',0);
    $pdf ->Cell(170,6,'_______________________________________________________________________',0, 0, 'C');
    $pdf ->Ln(5);
    $pdf ->SetFont('Arial','B',9);
    $pdf ->Cell(60,6,'',0);
    $pdf ->Cell(70,6,'DICIEMBRE '.date("d/m/".$ano."y").'',0, 0, 'C');

    $pdf ->Output();
?>