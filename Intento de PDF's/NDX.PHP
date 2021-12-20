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
    $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
}

}

require'../php/conexion.php';
$sql = "SELECT * FROM usuario where ID_USUARIO = '$ID_USUARIO' and CONTRASEÑA = '$Contrasena'";

$check = mysqli_query($conexion, $sql);
$info = mysqli_fetch_row($check);
$nomCom= $info[1]."".$info[2]."".$info[3];


// Creación del objeto de la clase heredada
$pdf = new FPDF('P', 'mm', 'letter', true);
$title = 'Encuesta A Alumnos Sobre la Percepcion De Sus Clases Semestre 2021-2022';
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(20,5,'Alumno:',0,0,'L');
$pdf->Cell(20,5,$nomCom,0,1,'R');
$pdf->Cell(20,5,'Boleta:',0,1,'R');
$pdf->Cell(20,5,'Preguntas:',0,1,'L');
$pdf->Cell(20,5,'1.¿Como consideras que ha sido la impartición de los temas de tu clase?!',0,1,'L');
$pdf->Cell(20,5,'2.¿Como consideras que han atendido las preguntas que han planteado al docente?',0,1,'L');
$pdf->Cell(20,5,'3.¿Como consideras que ha sido el seguimiento del docente a tus tareas, examenes, proyectos, practica, etc?',0,1,'L');
$pdf->Cell(20,5,'4.¿Las sesiones de tu clase se han impartido en los horarios oficiales y con la duracion establecida?',0,1,'L');
$pdf->Cell(20,5,'5.¿Como consideras que se han atendido las distintas problematicas relacionadas con tu clase',0,1,'L');
$pdf->SetFont('Times','',20);
$pdf->Cell(20,10,'Tus respuestas de la encuesta:',0,1,'L');
$SetTextColor(255,255,255);
$SetFillColor(49,108,244);
$pdf->SetFont('Times','B',12);  
$pdf->Cell(50, 5, 'Unidades de aprendizaje', 1,0,'C',1);
$pdf->Cell(25, 5, 'P1', 0,0,'C', 1);
$pdf->Cell(25, 5, 'P2', 0,0,'C', 1);
$pdf->Cell(25, 5, 'P3', 0,0,'C', 1);
$pdf->Cell(25, 5, 'P4', 0,0,'C', 1);
$pdf->Cell(25, 5, 'P5', 0,0,'C', 1);



$pdf->Output();
?>
