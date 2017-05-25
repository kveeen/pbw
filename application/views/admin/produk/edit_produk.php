<div class="konten">
	<h1>Mengubah produk</h1>
	<?php require_once('tinymce.php') ?>
	<form name="form1" method="post" action="<?php echo base_url('admin/produk/edit/' . $detail['id_produk']); ?> " class="myform">
	<p>
	<label for="judul">Judul produk</label>
	<input name="judul" type="text" id="judul" size="70" value="<?php echo $detail['judul']?>">
	</p>
		<p>
		<label for="isi">Isi produk</label>
		<textarea name="isi" id="isi" cols="45" rows="5"><?php echo $detail['isi']?>;</textarea>
		</p>
		<p>
			<input type="hidden" name="id_user" id="id_user" value="1">
			<input type="hidden" name="id_produk" id="id_produk" value="<?php echo $detail['id_produk']?>">
		</p>
		<p>
			<input type="submit" name="submit" id="submit" value="Submit">
			<input type="reset" name="submit2" id="submit2" value="Reset">
		</p>
	</form>	
	</div>