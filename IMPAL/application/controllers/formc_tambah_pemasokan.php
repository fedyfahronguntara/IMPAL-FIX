<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formc_tambah_pemasokan extends CI_Controller {

    //    FUNGSI LOAD FORM UPLOAD GALERY
    public function index()
	{
		$this->load->view('form_tambah_obat');
	}
//    ---FUNGSI LOAD FORM UPLOAD GALERY
//  ===============================================================================================
//    FUNGSI UPLOAD GALERY
	public function upload()
	{
	   
	        $this->load->model('apotek');
	        
	        $data=array(
	            'idPemasokan'=>$this->input->post('id'),
	            'idObat'=>$this->input->post('nama'), 
	            'idSupplier'=>$this->input->post('suplier'), 
	            'tglPemasokan'=>$this->input->post('tgl'), 
	            'jumlahPemasokan'=>$this->input->post('jumlah')
	            
               

            );
	        $this->apotek->addpemasokan($data);
	        redirect('c_admin/admin',$data);
	    }
	
//    ---FUNGSI  UPLOAD GALERY
//  ===============================================================================================
//      FUNGSLI LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome');
    }
 //      ---FUNGSLI LOGOUT
//  ===============================================================================================
}
