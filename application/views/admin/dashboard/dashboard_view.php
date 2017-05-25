<div class=”konten”>
<h1>Halaman Dashboard Kinari </h1>
</div>
<div class="konten">
	<h1>Daftar Rekomendasi Pelanggan</h1>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="myform">
		<tr>
		<th scope="col">No</th>
		<th scope="col">Nama</th>
		<th scope="col">Alamat</th>
		<th scope="col">Email</th>
		<th scope="col">Pesan</th>
		<th scope="col">Action</th>
	</tr>
	<?php
	foreach ($recommendation as $a) { 
	?>
	<tr>
		<td><?php echo $a['no'];?></td>
		<td><?php echo $a['nama'];?></td>
		<td><?php echo $a['alamat'];?></td>
		<td><?php echo $a['email'];?></td>
		<td><?php echo $a['pesan'];?></td>
		<td>
			<a href="<?php echo base_url(). "admin/dashboard/delete_ide/" .$a['no']; ?>">DELETE</a>
		</td>
	</tr>
	<?php } ?>
	</table>
	</div>