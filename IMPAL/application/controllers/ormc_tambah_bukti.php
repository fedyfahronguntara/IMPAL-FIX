<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ormc_tambah_bukti extends CI_Controller {

    //    FUNGSI LOAD FORM UPLOAD GALERY
    public function index()
    {
        $this->load->view('form_tambah_bukti');
    }
//    ---FUNGSI LOAD FORM UPLOAD GALERY
//  ===============================================================================================
//    FUNGSI UPLOAD GALERY
    public function upload()
    {
         $config['upload_path']          = './DATAIMAGE/';
                $config['allowed_types']        = 'jpg||png||jpeg';
                $config['max_size']             = 8388608;

                $this->load->library('upload', $config);
                
        if ( ! $this->upload->do_upload())
        {
            $data['asd']= $this->upload->display_errors();
            //redirect('welcome/pembayaran');
        }
        else
        {
            $this->load->model('apotek');
            $file_data= $this->upload->data();
                $datat=array(
                        'idTransaksi'=>$this->input->post('idtransaksi'),
                        'idKonsumen'=>"",
                        'idObat'=>"",
                        'statusPesanan'=>"",
                        'statusPembayaran'=>"",
                        'tglTransaksi'=>"",
                        'totalBiaya'=>"",
                        'buktitf'=>$file_data['file_name']
                        
                         
             
                    );

            }
            $id=$this->input->post('idtransaksi');
            $this->apotek->transaksi($datat);
            $this->session->set_flashdata('alert','sukses_upload');
            redirect('welcome/listobat');
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
