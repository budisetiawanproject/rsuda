<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

<?php
setlocale(LC_MONETARY, "ID");

$harga_nota = $stok[0]['total_harga'];
$harga_rinci = $sum_rs[0]['total'];
$sisa = $harga_nota - $harga_rinci
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Input Rincian Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Input Rincian Barang</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="col-12">


				<section class="content">
					<div class="container-fluid">
						<!-- Small boxes (Start box) -->
						<div class="row">
							<!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-primary">
									<div class="inner">
										<h3>Rp. <?= number_format($harga_nota, 0, ",", "."); ?>
										</h3>
										<p>Total Harga Nota</p>
									</div>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
									<div class="inner">
										<h3>Rp. <?= number_format($harga_rinci, 0, ",", ".") ?></h3>
										<p>Sudah Input</p>
									</div>
								</div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-danger">
									<div class="inner">
										<h3>Rp. <?= number_format($sisa, 0, ",", ".") ?></h3>
										<p>Belum Input</p>
									</div>
								</div>
							</div>
							<!-- ./col -->

							<!-- ./col -->
						</div>
						<!-- /.row -->
						<!-- Main row -->

						<!-- /.row (main row) -->
					</div><!-- /.container-fluid -->
				</section>

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Input Barang Nota Nomor <?= $stok[0]['no_nota'] ?> </h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<?php if ($sisa <= 0) : ?>
							<button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal_add_stok" disabled>Tambah Baru</button>
						<?php else : ?>
							<button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal_add_stok">Tambah Baru</button>
						<?php endif; ?>
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($rincian_barang as $r) : ?>
									<tr>
										<th><?= $i ?></th>
										<th><?= $r['nama_barang'] ?></th>
										<th><?= $r['jumlah'] ?></th>
										<th><?= $r['harga'] ?></th>
										<th><?= $r['total'] ?></th>
										<th>test</th>
									</tr>
									<?php $i++ ?>
								<?php endforeach ?>
								<!-- buat index untuk nomor urut -->


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
				<form action="<?= base_url('pergudangan/insertRinciStok'); ?>" method="POST">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
					<input type="hidden" name="id_nota" id="id_nota" value="<?= $stok[0]['id'] ?>">

					<div class="form-group">
						<label for="id_barang">Nama Barang
							<a href="#" class="badge badge-primary" id="tambahBarang">Tambah Nama Barang</a>
						</label>
						<select class="form-control select2" id="selectnamabarang" name="id_barang" style="width: 100%;">

						</select>
					</div>


					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="num" class="form-control" id="jumlah" name="jumlah">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="num" class="form-control" id="harga" name="harga">
						<small id="harga" class="form-text text-muted">Input Harga tanpa menggunakan titik atau koma</small>
					</div>
					<div class="form-group">
						<label for="total">Total</label>
						<input type="num" class="form-control" id="total" value="0" name="total">
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

<script src="<?= base_url('assets/js/rincianbarang.js') ?>"></script>