<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include ('v_navbar.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="styleLogin.css">

      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
      <link rel="stylesheet" type="text/css" href="footer.css">
      <link rel="stylesheet" type="text/css" href="body.css">
      <link rel="stylesheet" type="text/css" href="detail_obat.css">
<style type="text/css">
    body{
    background-image: url("<?php echo base_url() ?>image/background.jpg");
    background-size: cover;
}
</style>
</head>
<body>
  <div class="container" style="width: 100%;background-color: rgb(247, 247, 247, 0.5)">
    <div class="row" style="">         
      <div class="col-md-2" style="background-color: white;margin-left: 5%;margin-top: 1%">
          <center>  <p style="padding-top: 5%">Pembayaran</p></center>
      </div>
    </div>
    <br>    
    <div class="row" style="height:  100%; margin-left: 0.5%;margin-right: 0.5%; background-color: white;padding-bottom: 2%;padding-top: 2%; ">
        <div style="margin-left: 4%">
          <div style="width: 95%;height: 50px;background-color: white;box-shadow: 5px 5px 10px">
       	    <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-9"><img src="<?php echo base_url() ?>image/bri.png" style="width: 10%;margin-top: 2%"></div>
              <div class="col-md-2" style="width: 10%;margin-top: 1%">23456798765</div>
            </div>
          </div><br>
          <div style="width: 95%;height: 50px;background-color: white;box-shadow: 5px 5px 10px">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-9"><img src="<?php echo base_url() ?>image/bca.png" style="width: 9%;margin-top: 0%"></div>
              <div class="col-md-2" style="width: 10%;margin-top: 1%">23456798765</div>
            </div>
          </div><br> 
           <div style="width: 95%;height: 50px;background-color: white;box-shadow: 5px 5px 10px">
           	  <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-9"><img src="<?php echo base_url() ?>image/mandiri.png" style="width: 10%;margin-top: 0%"></div>
               <div class="col-md-2" style="width: 10%;margin-top: 1%">23456798765</div>
           </div>
           </div><br> 

          <div style="width: 43%;height: 100px;background-color: white;box-shadow: 5px 5px 10px;margin-left: 52%">
          <br><br>
            <div class="row">
              <div class="col-md-6" style="border-right: solid black; "><center>Input Bukti Pembayaran</center></div>
              
              <div class="col-md-6" >
                <?php echo form_open_multipart('welcome/addkonsumen');?>
                <form method="post" >
                <input type="file" name="userfile"  >
              </div>
            </div>
          </div><br>
       <div class="row">
          <div class="col-md-7" ></div> 
          <div class="col-md-3" >
           
              

              <input type="hidden" name="nama" value="<?php echo $konsumen['namaKonsumen'] ?>">
              <input type="hidden" name="noHP" value="<?php echo $konsumen['noHP'] ?>">
              <input type="hidden" name="alamat" value="<?php echo $konsumen['Alamat'] ?>">
              <input type="hidden" name="idtransaksi" value="<?php $a=rand(0,1000) ?>">
              <input type="hidden" name="idtransaksii" value="<?php echo $a ?>">
              <?php $jumtotal=0; ?>
              <?php foreach ($keranjang as $datak) {?>
               <input type="hidden" name="idobat" value="<?php echo $datak['obat'] ?>">
               <input type="hidden" name="idkon" value="<?php echo $konsumen['namaKonsumen'] ?>">
               <input type="hidden" name="statusp" value="belum siap">
               <input type="hidden" name="statuspem" value="l">
               <input type="hidden" name="tgl" value="<?php echo date('D-m-Y');?>">
               <input type="hidden" name="tot" value="<?php echo $datak['total'] ?>">
               <?php 
                $jumtotal=$datak['total']+$jumtotal;
                $config['upload_path']          = './DATAIMAGE/';
                $config['allowed_types']        = 'jpg||png||jpeg';
                $config['max_size']             = 8388608;

                $this->load->library('upload', $config);
                $datat=array(
                        'idTransaksi'=>$a,
                        'idKonsumen'=>$konsumen['namaKonsumen'],
                        'idObat'=>$datak['obat'],
                        'statusPesanan'=>"belum siap",
                        'statusPembayaran'=>0,
                        'tglTransaksi'=>date('D-m-Y'),
                        'buktitf'=>"",
                        'totalBiaya'=>$datak['total']
                        
                         
             
                    );
               $this->db->insert('transaksi',$datat);
                     ?>


<?php } ?>
            <input type="submit" value="SIMPAN" class="btn btn-primary" data-toggle="modal" data-target="#bukti<?php echo $a;?>" id="login" style="margin-left: 23%; width: 100%;">

            </form>  
            <input type="submit" value="VIEW DETAIL" class="btn btn-primary" data-toggle="modal" data-target="#bukti<?php echo $a;?>" id="login" style="margin-left: 23%; width: 100%;">

            <div id="bukti<?php echo $a;?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                         <label>  ID Pesanan : <?php echo $a?></label><br> 
                                        <label> Tanggal Pemesanan : <?php echo date('D-m-Y') ?></label><br>  
                                        <label> Atas Nama : <?php echo $konsumen['namaKonsumen']?></label><br>    
                                        <label> Status Pesanan : <?php echo "belum siap"?><br>
                                         <label> Total : <?php echo $jumtotal;?></label><br> 
                                         
                                             
                                          </div>
                                      </div>
                                  </div>



<?php echo form_close(); ?>
          </div>
          <div class="col-md-2" ></div> 
        </div>
      </div>    
    </div>
    <br>
  </div>
  <br>  
<?php include ("v_footer.php") ?>        
</body>
</html>