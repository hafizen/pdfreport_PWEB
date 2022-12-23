<?php

$path =  $_SERVER['DOCUMENT_ROOT'] . '/pdfreport/phpfpdf/fpdf.php';

require($path);

$pdf = new FPDF('l', 'mm', 'A5');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 7, 'DAFTAR SISWA PENDAFTAR', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 20);

$pdf->Ln(7);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 15, 'ID', 1, 0,  'C');
$pdf->Cell(30, 15, 'Foto', 1, 0,  'C');
$pdf->Cell(30, 15, 'Nama', 1, 0,  'C');
$pdf->Cell(30, 15, 'Alamat', 1, 0,  'C');
$pdf->Cell(30, 15, 'Jenis Kelamin', 1, 0,  'C');
$pdf->Cell(30, 15, 'Agama', 1, 0,  'C');
$pdf->Cell(35, 15, 'Sekolah Asal', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

include 'config.php';

$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);

while ($siswa = mysqli_fetch_array($query)) {
    $pdf->Cell(8, 15, $siswa['id'], 1, 0);
    $pdf->Cell(
        30,
        15,
        $pdf->Image('image/' . $siswa['foto'], $pdf->GetX() + 9, $pdf->GetY() + 2, 12, 0),
        1,
        0,
        'C',
        false
    );
    $pdf->Cell(30, 15, $siswa['nama'], 1, 0);
    $pdf->Cell(30, 15, $siswa['alamat'], 1, 0);
    $pdf->Cell(30, 15, $siswa['jenis_kelamin'], 1, 0);
    $pdf->Cell(30, 15, $siswa['agama'], 1, 0);
    $pdf->Cell(35, 15, $siswa['sekolah_asal'], 1, 1);
}

$pdf->Output();
