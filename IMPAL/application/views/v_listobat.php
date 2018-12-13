<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('v_navbar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styleLogin.css">

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/cobalistprod.css">
<style type="text/css">
body{
    background-image: url("<?php echo base_url() ?>image/background.jpg");
    background-size: cover;
}
</style>
</head>
<body >
    
<?php if ($this->session->flashdata('ada')=='ada'){
    echo "<script>alert('BARANG ANDA SUDAH ADA DI KERANJANG')</script>";
}
if ($this->session->flashdata('add')=='add'){
    echo "<script>alert('BERHASIL DITAMBAH KE KERANJANG ')</script>";
}
?>

    <div id="kontenerObat" style="background-color: #c5c9d0; padding-top: 5%; padding-bottom: 5%;">
	   <div class="container"  style="width: 75%; background-color: #c5c9d0; border: 5px solid black; border-radius: 20pt;" id="demo">
        
	       <div class="row" style="padding-top: 2%;">
            <?php foreach ($obat as $listobat) {?>
                <!-- <a href="<?php echo site_url("welcome/getobat/".$listobat['idObat']) ?>">
                <div id="obats" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5%; margin-top: 4%;">
               	    <img class="rounded" style="width: 100%; height: 100%" src="<?php echo base_url() ?>DATAIMAGE/<?php echo $listobat["foto"] ?>">
               		   
                       

               	    </a>

                    <span style="font-weight: 1000;"><?php echo $listobat["namaObat"] ?> <br>Stock Tersedia: <?php echo $listobat["stock"] ?><p style="font-weight: 500; color: #5e6c7d;">Rp.<?php echo $listobat["harga"] ?></p> </span>
                    
                </div>  -->


                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="display: flex;flex-wrap: wrap ;margin-bottom: 3% " >
                
                    <div class="product-grid__product">
                        <div class="product-grid__img-wrapper"> 
                          <a href="<?php echo site_url("welcome/getobat/".$listobat['idObat']) ?>">        
                            <img src="<?php echo base_url() ?>DATAIMAGE/<?php echo $listobat["foto"] ?>" alt="Img" class="product-grid__img" /></a>
                        </div>
                        <span class="product-grid__title"><?php echo $listobat['namaObat'] ?></span>
                        <span class="product-grid__price">IDR <?php echo $listobat['harga'] ?></span>
                        <div class="product-grid__extend-wrapper">
                            <div class="product-grid__extend">
                                <p class="product-grid__description"><?php echo $listobat['stock'] ?></p>
                                <span class=""><i class="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</i></span>
                                <span style="background-color: blue;" id="address" data-toggle="modal" data-target="#barang<?php echo $listobat['idObat'] ?>" class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Tambah</span>


                
                                <!-- <span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</span> -->
                            </div>

                        </div>

                    </div>
                <br><br>
                </div>



                <div class="modal fade" id="barang<?php echo $listobat['idObat']?>">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title"><?php echo $listobat['namaObat'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <form method="post" action="<?php echo site_url("welcome/addkeranjangg/".$listobat['idObat']) ?>" name="data" id="data" class="form-inline">
                        <div class="modal-body">
                          <table>
                            <tr>
                                <td><input type="hidden" class="form-control" id="name" name="nama" style="width: 300px" value="<?php echo $listobat['namaObat'] ?>">
                                  
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" id="name" name="idObat" style="width: 300px" value="<?php echo $listobat['idObat'] ?>">
                                  
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" id="name" name="stock" style="width: 300px" value="<?php echo $listobat['stock'] ?>">
                                  
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" id="pnumber" name="harga" style="width: 300px" value="<?php echo $listobat['harga'] ?>" ></td>
                            </tr>
                            
                            <tr>
                                <td><input type="hidden" class="form-control" id="pnumber" name="pemilik" style="width: 300px" value="<?php echo $this->session->userdata('nama') ?>" ></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" id="pnumber" name="foto" style="width: 300px" value="<?php echo $listobat['foto'] ?>" ></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" class="form-control" id="pnumber" name="khasiat" style="width: 300px" value="<?php echo $listobat['keteranganKhasiat'] ?>" ></td>
                            </tr>
                           
                            <tr>
                                <td height="50px" width="150px">Jumlah</td>
                                <td>
                                  <input type="number" max="100" min="1" id="jumlah" value="1" name="jumlah" class="form-control" pattern="[0-9]+" required>
                                </td>
                                
                            </tr>
                            
                          </table> 
                        </div>
                      
                        <!-- Modal footer -->
                        <div class="modal-footer" style="margin-left: 60%">
                          <input style="font-weight: bold; color: white; font-size: 12px; background-image: " class="btn btn-success" type="submit" value="Pesan">
                          <button style="font-weight: bold; color: white; font-size: 12px; background-image: " type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                        
                    </div>
                  </div>
                </div>

              <?php } ?> 

            </div>
        <br>  
              <br>   
    
        </div>
    </div>
<br><br><br><br><br>
<?php include ("v_footer.php") ?>
</body>
</html>