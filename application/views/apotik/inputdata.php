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

<!-- #####end modal -->
<script src="<?= base_url('assets/js/apotik.js') ?>"></script>