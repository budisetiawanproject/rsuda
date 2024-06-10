<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Input Stok Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Input Stok Barang</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="col-12">
				<!-- /.card -->

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Input Stok Barang</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal_add_stok">Tambah Baru</button>
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>No. Nota Stok</th>
									<th>Tanggal Nota</th>
									<th>Supplier</th>
									<th>Total Harga</th>
									<th>File Nota</th>
									<th>Status Pelunasan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<!-- buat index untuk nomor urut -->
								<?php $no = 1; ?>
								<?php foreach ($stoks as $stok) : ?>
									<tr>
										<td>1</td>
										<td><?= $stok['no_nota'] ?></td>
										<td><?= $stok['tgl_nota'] ?></td>
										<td><?= $stok['supplier'] ?></td>
										<td><?= $stok['total_harga'] ?></td>
										<td><a href="<?= base_url('files/file_nota/') . $stok['file_nota']; ?>" target="_blank">Nota</a></td>
										<td>
											<?= ($stok['is_bayar'] == 1) ? 'Blm Lunas' : 'Lunas' ?>

										</td>
										<td>
											<a href="<?= base_url('pergudangan/rincianbarang/') . $stok['id']; ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-poll-h" title="Rincian"></i></a>
											<a href="" class="btn btn-sm btn-warning mb-2">
												<i class="fas fa-pencil-alt" title="Edit"></i>
											</a>
											<a href="" class="btn btn-sm btn-danger mb-2">
												<i class="fas fa-trash-restore" title="Hapus"></i>
											</a>
											<a href="" class="btn btn-sm btn-danger mb-2">
												<i class="fas fa-check-double" title="Lunas"></i>
											</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach; ?>

							</tbody>
						</table>
						<!-- end tabel -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>




<!-- #####modal -->
<!-- Modal -->
<div class="modal fade" id="modal_add_stok" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- form add data to table restok -->
				<form action="<?= base_url('pergudangan/insert'); ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
					<div class="form-group">
						<label for="no_nota">No. Nota</label>
						<input type="text" class="form-control" id="no_nota" name="no_nota">
					</div>
					<div class="form-group">
						<label for="tgl_nota">Tgl Nota</label>
						<input type="date" class="form-control" id="tgl_nota" name="tgl_nota">
					</div>
					<div class="form-group">
						<label for="supplier">Supplier</label>
						<input type="text" class="form-control" id="supplier" name="supplier">
					</div>
					<div class="form-group">
						<label for="total_harga">Total Harga</label>
						<input type="number" min="1" step="any" class="form-control" id="total_harga" name="total_harga">
						<small id="total_harga" class="form-text text-muted">Input Total Harga tanpa menggunakan titik atau koma</small>
					</div>
					<div class="form-group">
						<label for="total_harga">Foto Nota</label>
						<input class="form-control" id="file_nota" type="file" accept="application/jpg" name="file_nota" required>
						<small id="total_harga" class="form-text text-danger">File Foto yg diterima .JPG</small>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="simpanStok">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- #####end modal -->
<script src="<?= base_url('assets/js/pergudangan.js') ?>"></script>