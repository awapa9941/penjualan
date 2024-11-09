<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat library FPDF
        $this->load->library("pdf");
        // Memuat model atau database jika diperlukan
        $this->load->database();
    }

    // Fungsi untuk menampilkan form laporan
    public function index()
    {
        // Memuat form dengan tombol cetak laporan
        $this->load->view('report/report_form');
    }

    // Fungsi untuk mencetak laporan data kustomer
    public function kustomerkustom()
    {
        // Inisialisasi objek PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->addPage();
        
        // Menyertakan header laporan
        $this->generate_header($pdf);

        // Menambahkan judul laporan
        $pdf->setFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KUSTOMER', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);  // Memberikan spasi

        // Menampilkan Header Tabel
        $pdf->setFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NIK', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAMA KUSTOMER', 1, 0, 'C');
        $pdf->Cell(30, 6, 'TELP', 1, 0, 'C');
        $pdf->Cell(45, 6, 'ALAMAT', 1, 1, 'C');

        // Menampilkan data kustomer dari database
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

        // Output PDF ke browser
        $pdf->setFont('Times', '', 10);
        $pdf->Output('laporan_kustomerkustom.pdf', 'I');
    }

    // Fungsi untuk generate header laporan
    private function generate_header($pdf)
    {
        // Menambahkan gambar logo
        $pdf->Image('./img/cart.jpg', 30, 5, 27, 24);

        // Menambahkan spasi
        $pdf->Cell(25);

        // Menambahkan nama koperasi
        $pdf->setFont('Times', 'B', 20);
        $pdf->Cell(0, 5, 'KOPERASI MANIS BERSATU', 0, 1, 'C');

        // Menambahkan website dan email
        $pdf->setFont('Times', 'B', 10);
        $pdf->Cell(0, 5, 'Website: WWW.HARUMBERSATU.COM / E-Mail: admin@harusbersatu.com', 0, 1, 'C');

        // Menambahkan alamat dan kontak
        $pdf->Cell(25);
        $pdf->setFont('Times', 'B', 10);
        $pdf->Cell(0, 5, 'Banjarmasin Utara / Telp. / Fax: 0823xxxxxx / KOPERASI HARUM MANIS BERSATU', 0, 1, 'C');

        // Garis pemisah
        $pdf->SetlineWidth(1);
        $pdf->Line(10, 36, 197, 36);
        $pdf->SetlineWidth(0);
        $pdf->Line(10, 37, 197, 37);

        // Memberikan spasi setelah header
        $pdf->Cell(30, 17, '', 0, 1);
    }
}