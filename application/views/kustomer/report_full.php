<?php
$pdf = new FPDF('P','mm','A4');
$pdf->addPage();

// Header: Menampilkan Gambar dan Informasi Kontak
$pdf->setFont('Times','B',18);

// Menampilkan Gambar
$pdf->Image('./img/cart.jpg', 30, 5, 27, 24);

// Memberikan spasi
$pdf->Cell(25);

// Menampilkan Judul Koperasi
$pdf->setFont('Times','B',20);
$pdf->Cell(0, 5, 'KOPERASI MANIS BERSATU', 0, 1, 'C');

// Memberikan spasi
$pdf->Cell(25);

// Menampilkan Website dan Email
$pdf->setFont('Times','B',10);
$pdf->Cell(0, 5, 'Website : WWW.HARUMBERSATU.COM / E-Mail : admin@harusbersatu.com', 0, 1, 'C');

// Menampilkan Alamat dan Telp/Fax
$pdf->Cell(25);
$pdf->Cell(0, 5, 'Banjarmasin Utara / Telp. / Fax : 0823xxxxxx / KOPERASIN HARUM MANIS BERSATU', 0, 1, 'C');

// Menambahkan garis pemisah
$pdf->SetlineWidth(1);
$pdf->Line(10, 36, 197, 36);
$pdf->SetlineWidth(0);
$pdf->Line(10, 37, 197, 37);

// Memberikan spasi sebelum konten laporan
$pdf->Cell(30, 17, '', 0, 1);

// Laporan: Judul Laporan
$pdf->setFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA KUSTOMER', 0, 1, 'C');

// Memberikan spasi
$pdf->Cell(30, 8, '', 0, 1);

// Menampilkan Header Tabel
$pdf->setFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(37, 6, 'NIK', 1, 0, 'C');
$pdf->Cell(37, 6, 'NAMA KUSTOMER', 1, 0, 'C');
$pdf->Cell(30, 6, 'TELP', 1, 0, 'C');
$pdf->Cell(45, 6, 'ALAMAT', 1, 1, 'C');

// Menampilkan data dari database
$i = 1;
$data = $this->db->get('kustomer')->result_array();
foreach ($data as $d) {
    $pdf->setFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(37, 6, $d['nik'], 1, 0);
    $pdf->Cell(37, 6, $d['name'], 1, 0);
    $pdf->Cell(30, 6, $d['telp'], 1, 0);
    $pdf->Cell(45, 6, $d['alamat'], 1, 1);
}

// Output PDF
$pdf->setFont('Times', '', 10);
$pdf->Output('laporan_kustomerfull.pdf', 'I');
?>