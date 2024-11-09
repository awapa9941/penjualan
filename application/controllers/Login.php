<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $this->form_validation->set_rules('email','email','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');

		$this->load->view('login/index');
	}
    public function dologin()
    {
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');
        $user = $this->db->get_where('user',['email'=> $user])->row_array();//cari user berdasarkan email
        if($user){
            if(password_verify($pswd,$user['password'])){// periksa password
            $data= [
                'id' => $user ['id'],
                'email' => $user ['email'],
                'username' => $user ['username'],
                'role' => $user ['role'],
            ]; $userid = $user['id'];
            $this->session->set_userdata($data);
            if($user['role'] == 'PEMILIK'){
                $this->_updatelastLogin($userid);
                redirect('menu');
            }else if ($user['role'] == 'ADMIN'){
                $this->_updatelastLogin($userid);
                redirect('user');
            }else if ($user['role'] == 'KASIR'){
                $this->_updatelastLogin($userid);
                redirect('kasir');
        }else {
            redirect('login');
        }
	}else {
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <b>Error :</b>Password Salah</div> ');
    redirect('/');
	}
}else {
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> <b>Error :</b>User Tidak Terdafatar. </div> ');
    redirect('/');
}}

    private function _updatelastLogin($userid){
        $sql = "UPDATE user SET last_login=now() WHERE id=$userid";
        $this->db->query($sql);
    }

    
    public function logout()
    {
        $this->session->session_destroy();
        redirect(site_url('login'));
    }
    public function block()
    {
        $data = array(
        // 'user' => infoLogin(),
        'title' => 'Access Denied!'
    );
    $this->load->view('block/404error', $data);
}}