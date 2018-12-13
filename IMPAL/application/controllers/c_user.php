<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('apotek');
        $this->load->helper('download');
    }
public function user(){
	$this->load->view('v_registrasi');
}
public function registrasi(){
	$user = $this->db->get_where('konsumen', array('username' => $this->input->post('username')));
        if ($user->num_rows() > 0  )
        {
            $data = array();
            $this->session->set_flashdata('ada','ada');
            //$data['dataobat'] = $this->apotek->getobat($id);
           $this->load->view('v_registrasi'); 
        }
        else
        {
		$data = array(
			'username'=>$this->input->post('username'),
			'namaKonsumen'=>$this->input->post('nama'),
			'noHP'=>$this->input->post('noHP'),
			'Alamat'=>$this->input->post('alamat'),
			'password'=>$this->input->post('password')
		);
		$this->load->model('apotek');
		$this->apotek->addUser($data);
		$this->session->set_flashdata('info','Registrasi berhasil');
		redirect('welcome');
	}
}
}

