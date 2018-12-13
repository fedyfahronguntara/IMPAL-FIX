<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>OBAT</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>
	<div class="header" style="width: 100%; height: 400px;">
		<ul>
			<center><label>IMAGE</label><br><br>
			<?php echo form_open_multipart('formc_tambah_pemasokan/upload');?>
            	<form method="post">
                	<div class="row">
                    	<div class="col-md-8">
				            <label for="name">ID PEMASOKAN</label>
				            <input type="text" name="id" value="<?php echo rand(0,99999) ?>" class="form-control" required>
							
							<label for="name">NAMA OBAT</label>
				            <input type="text" name="nama" class="form-control" required>
							
							<label for="name">ID SUPLIER</label>
				            <input type="text" name="suplier" class="form-control" required>
							
							<label for="name">TANGGAL PEMASOKAN</label>
				            <input type="text" name="tgl" class="form-control" required>
							
							<label for="name">JUMLAH PEMASOKAN</label>
				            <input type="text" name="jumlah" class="form-control" required>
							<input type="submit" value="ADD" class="btn btn-primary" name="upload" /><br>
                    	</div>
							
                    	</div>
                	</div>
					</center>
        		</form>
			<?php echo form_close(); ?>
		</ul>
	</div>

	
</body>
</html>