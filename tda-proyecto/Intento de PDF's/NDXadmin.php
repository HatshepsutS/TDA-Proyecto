<?php
require('fpdf.php');

class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('LogoIPN.png',10,8,30);
    $this->Image('escudoESCOM.png',40,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título

    $this->SetTextColor(49,108,244);
    $this->Cell(100,10,'ESCOM',0,0,'R');
    // Salto de línea
    $this->Ln(20);

    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Calculamos ancho y posición del título.
    $w = $this->GetStringWidth($title)+10;
    $this->SetX((210-$w)/2);
    // Colores de los bordes, fondo y texto

    $this->SetFillColor(196,196,196);
    $this->SetTextColor(0,0,0);
    
    // Título
    $this->Cell($w,9,$title,0,1,'C',true);
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$title = 'Encuesta A Alumnos Sobre la Percepcion De Sus Clases Semestre 2021-2022';
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(150,5,'Encuestas realizadas:',0,2,'R');
$pdf->Cell(20,5,'Preguntas:',0,1,'L');
$pdf->Cell(20,5,'1.¿Como consideras que ha sido la imparticion de los temas de tu clase?!',0,1,'L');
$pdf->Cell(20,5,'2.¿Como consideras que han atendido las preguntas que han planteado al docente?',0,1,'L');
$pdf->Cell(20,5,'3.¿Como consideras que ha sido el seguimiento del docente a tus tareas, examenes, proyectos, practica, etc?',0,1,'L');
$pdf->Cell(20,5,'4.¿Las sesiones de tu clase se han impartido en los horarios oficiales y con la duracion establecida?',0,1,'L');
$pdf->Cell(20,5,'5.¿Como consideras que se han atendido las distintas problematicas relacionadas con tu clase',0,1,'L');
    
$pdf->Output();
?>