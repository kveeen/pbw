<div class="konten">
	<h1>Manajemen Produk</h1>

		<div align="right">
			<a href="<?php echo base_url()?>admin/produk/tambah" class="tambah">Tambah produk</a>
		</div>

		<p>Daftar Produk</p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
		<tr>
		<th scope="col">Judul</th>
		<th scope="col">Isi</th>
		<th scope="col">Tanggal</th>
		<th scope="col">Gambar</th>
		<th scope="col">Action</th>
	</tr>
	<?php
	foreach ($produk as $list) { 
	?>
	<tr>

		<a href="<?php echo base_url() ?>home/read/<?php echo $list['slug'] ?>" target="_blank">
		<td><?php echo $list['judul'];?></a></td>
		<td><?php echo $list['isi'];?></td>
		<td><?php echo $list['tanggal'];?></td>
		<td><img src="<?php echo base_url($list['gambar']); ?>" height="45" width="45"/></td>
		<td>
			<a href="<?php echo base_url(). "admin/produk/edit/".$list['id_produk']; ?>">EDIT</a> | <a href="<?php echo base_url(). "admin/produk/delete/" .$list['id_produk']; ?>">DELETE</a>
		</td>
	</tr>
	<?php } ?>
	</table>
	</div>