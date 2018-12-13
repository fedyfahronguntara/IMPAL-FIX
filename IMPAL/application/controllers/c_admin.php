<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin extends CI_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->model('apotek');
        $this->load->helper('download');
    }
public function admin()
	{
        if ($this->session->userdata('admin')=='adminlogin'){
		$data=array(
                'obat'=>$this->apotek->getallobat(),
                'sup'=>$this->apotek->getallsup(),
                'pemasokan'=>$this->apotek->getallpemasokan(),
                'transaksi'=>$this->apotek->getalltransaksi()
            );
		$this->load->view('v_tabeladmin',$data);
    }else {
        $this->session->set_flashdata('logindulu','logiadmin');
        redirect('Welcome');
    }
	}


public function tambah()
    {
                     
                    $data=array(
                        'idSupplier'=>$this->input->post('nama'),
                        'namSupplier'=>$this->input->post('nik')
             
                    );
                    $this->load->model('apotek');
                    $this->apotek->pemasok($data);
                    $this->load->view('v_admin',$data);
    }

public function del_obat()
    {
        $idobat=$this->input->post('idobat');
        $hapus=$this->apotek->delobat($idobat);
        if ($hapus){
            $this->session->set_flashdata('alert','sukses_hapus');
            redirect('c_admin/admin');
        }else {
            echo "<script>alert('gagal hapus data')</script>";
        }
    }

    

    public function del_pemasok()
    {
        $idpemasok=$this->input->post('idpemasok');
        $hapus=$this->apotek->delpemasok($idpemasok);
        if ($hapus){
            $this->session->set_flashdata('alert','sukses_hapus');
            redirect('c_admin/admin');
        }else {
            echo "<script>alert('gagal hapus data')</script>";
        }
    }

    public function del_transaksi()
    {
        $idtransaksi=$this->input->post('idtransaksi');
        $hapus=$this->apotek->deltransaksi($idtransaksi);
        if ($hapus){
            $this->session->set_flashdata('alert','sukses_hapus');
            redirect('c_admin/admin');
        }else {
            echo "<script>alert('gagal hapus data')</script>";
        }
    }

    public function del_pemasokan()
    {
        $idpemasokan=$this->input->post('idpemasokan');
        $hapus=$this->apotek->delpemasokan($idpemasokan);
        if ($hapus){
            $this->session->set_flashdata('alert','sukses_hapus');
            redirect('c_admin/admin');
        }else {
            echo "<script>alert('gagal hapus data')</script>";
        }
    }


public function edit_transaksi (){
    $data = array(
                       
                        'statusPesanan'=>$this->input->post('sp'),
                        
        );
         $this->load->model('apotek');
        $this->apotek->updtransaksi($data,$this->input->post('idtransaksi') );
         redirect('c_admin/admin');
}

public function edit_pemasokan (){
    $data=array(
                'idPemasokan'=>$this->input->post('id'),
                'idObat'=>$this->input->post('nama'), 
                'idSupplier'=>$this->input->post('suplier'), 
                'tglPemasokan'=>$this->input->post('tgl'), 
                'jumlahPemasokan'=>$this->input->post('jumlah')
                
               

            );
         $this->load->model('apotek');
        $this->apotek->updpemasokan($data,$this->input->post('id') );
         redirect('c_admin/admin');
}


public function edit_pemasok (){
    $data=array(
                'idSupplier'=>$this->input->post('idpemasok'),
                'namSupplier'=>$this->input->post('namapemasok'), 
                'alamat'=>$this->input->post('alamatpemasok'), 
                'kontak'=>$this->input->post('cp') 
                
                
               

            );
         $this->load->model('apotek');
        $this->apotek->updpemasok($data,$this->input->post('idpemasok') );
         redirect('c_admin/admin');
}


public function edit_Obat (){
    $data=array(
                'idObat'=>$this->input->post('idObat'),
                'namaObat'=>$this->input->post('nama'), 
                'stock'=>$this->input->post('stock'), 
                'keteranganKhasiat'=>$this->input->post('ket'), 
                'harga'=>$this->input->post('harga'),
                'foto'=>$this->input->post('foto')
                
               

            );
         $this->load->model('apotek');
        $this->apotek->updobat($data,$this->input->post('idObat') );
         redirect('c_admin/admin');
}


}

