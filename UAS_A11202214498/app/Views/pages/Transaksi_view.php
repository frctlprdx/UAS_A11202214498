<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
if(session()->getFlashData('success')){
?> 
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(session()->getFlashData('failed')){
?> 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('failed') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
	<tr>
	<th scope="col">#</th>
	<th scope="col">username</th>
	<th scope="col">Harga</th>
	<th scope="col">ongkir</th> 
	<th scope="col">status</th> 
	<th scope="col">tanggal</th> 
	<th scope="col"></th> 
	</tr>
</thead>
<tbody>
	<?php foreach($transaksi as $index=>$trans): ?>
	<tr>
	<th scope="row"><?php echo $index+1?></th>
	<td><?php echo $trans['username'] ?></td> 
	<td><?php echo $trans['total_harga'] ?></td> 
	<td><?php echo $trans['ongkir'] ?></td> 
	<td><?php echo $trans['status'] ?></td> 
	<td><?php echo $trans['created_date'] ?></td> 
	<td>
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $trans['id'] ?>">
			Ubah
		</button>
		<a href="<?= base_url('transaksi/delete/'.$trans['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
			Hapus
		</a>
	</td>
	</tr>
	<!-- Edit Modal Begin -->
	<div class="modal fade" id="editModal-<?= $trans['id'] ?>" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('transaksi/edit/'.$trans['id']) ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="name">username</label>
					<input type="text" name="username" class="form-control" id="username" value="<?= $trans['username'] ?>" placeholder="username" required>
				</div>
				<div class="form-group">
					<label for="name">Harga</label>
					<input type="text" name="harga" class="form-control" id="harga" value="<?= $trans['total_harga'] ?>" placeholder="Harga Barang" required>
				</div>
				<div class="form-group">
					<label for="name">ongkir</label>
					<input type="text" name="ongkir" class="form-control" id="ongkir" value="<?= $trans['ongkir'] ?>" placeholder="ongkir Barang" required>
				</div>
				<div class="form-group">
					<label for="name">status</label>
					<input type="text" name="status" class="form-control" id="status" value="<?= $trans['status'] ?>" placeholder="status Barang" required>
				</div>
				<div class="form-group">
					<label for="name">tanggal</label>
					<input type="text" name="tanggal" class="form-control" id="tanggal" value="<?= $trans['created_date'] ?>" placeholder="tanggal Barang" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal End -->
	<?php endforeach ?>   
</tbody>
</table>
<!-- End Table with stripped rows -->
<!-- Add Modal Begin -->
<!-- Add Modal End -->
<?= $this->endSection() ?>