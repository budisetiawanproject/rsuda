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
						<?= $this->session->flashdata('message'); ?>
						<button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#tipe">Tambah Baru</button>
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>No. Nota Stok</th>
									<th>Tanggal Input</th>
									<th>Supplier</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>1</td>
									<td>71111X</td>
									<td>21/08/2024</td>
									<td>PT. Bahagia Sentosa</td>
									<td>
										test dulu
									</td>
								</tr>
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