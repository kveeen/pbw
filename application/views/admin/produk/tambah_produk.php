<div class="konten">
<h1>Menambah produk</h1>
<?php require_once('tinymce.php')?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('admin/produk/tambah');?>
<!-- <form name="form1" method="post" action="<?php echo base_url()?>admin/produk/tambah" class="myform"> -->
<p>
	<label for="judul">Judul produk</label>
	<input name="judul" type="text" id="judul" size="70">
</p>
<p>
	<label for="isi">Isi produk</label>
	<textarea name="isi" id="isi" cols="45" rows="5"></textarea>
</p>
<p> Gambar Produk
<br>
	

	<input type="file" name="gambar" required>

	<br /><br />
</p>
<p>
	<input name="id_user" type="hidden" id="id_user
	" value="1">
</p>
<p>
	<input type="submit" name="submit" id="submit" value="Submit">
	<input type="reset" name="submit2" id="submit2" value="Reset">
</p>
</form>	
<p>&nbsp;</p>
</div>