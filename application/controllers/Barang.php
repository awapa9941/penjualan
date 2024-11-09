<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            // 'userlog' => infoLogin(),
            'barang' => $this->Barang_model->getAll(),
            'content' => 'barang/index'
        );
        $this->load->view('template/main', $data);
    }
    public function add()
    {
        $data= array(
            'title'=> 'Tambah Data Barang',
            'kategori'=> $this->db->get('kategori')->result_array(),
            'satuan'=> $this->db->get('satuan')->result_array(),
            'supplier'=> $this->db->get('supplier')->result_array(),
			'content'=> 'barang/add_form'
		);
		$this->load->view('template/main',$data);
	}
    public function save()
    {
        $this->Barang_model->Save();
        if ($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data user Berhasil Disimpan");
        }
        redirect('barang');
	}
    public function getedit($id)
    {
        $data= array(
            'title'=> 'Update Data Barang',
            'kategori'=> $this->db->get('kategori')->result_array(),
            'satuan'=> $this->db->get('satuan')->result_array(),
            'supplier'=> $this->db->get('supplier')->result_array(),
            'barang'=> $this->Barang_model->getByid($id),
			'content'=> 'barang/edit_form'
		);
		$this->load->view('template/main',$data);
	}
}
