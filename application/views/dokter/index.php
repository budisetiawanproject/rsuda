<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dokter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dokter</li>
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
                        <h3 class="card-title">Daftar Dokter</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <a style="color: white;" href="<?= base_url('dokter/tambah') ?>" type="button" class="btn btn-sm btn-primary" data-target="#tipe">Tambah Dokter</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dokter as $pr) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $pr['dok_gelar_depan'] . ' ' . $pr['dok_nama'] . ' ' . $pr['dok_gelar_belakang']; ?></td>
                                        <td>
                                            <?php $cek = $this->db->get_where('t_user', ['us_ket' => $pr['dok_id']])->row_array();
                                            if ($cek) {
                                            } else { ?>
                                                <button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['dok_id']; ?>"><i class="fas fa-user"></i></button>
                                            <?php } ?>
                                            <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['id_singkatan']; ?>"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['id_singkatan']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg-<?= $pr['dok_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Membuat User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?= base_url('dokter/useradd'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <label>NIK</label>
                                                        <input name="id" class="form-control" type="hidden" value="<?= $pr['dok_id']; ?>">
                                                        <input name="nik" class="form-control" type="text" value="<?= $pr['dok_nik']; ?>" readonly required>
                                                        <label>Nama Lengkap</label>
                                                        <input name="nama" class="form-control" type="text" value="<?= $pr['dok_gelar_depan'] . ' ' . $pr['dok_nama'] . ' ' . $pr['dok_gelar_belakang']; ?>" readonly>
                                                        <label>Akses</label>
                                                        <select name="role" class="form-control" required>
                                                            <option value="">Pilih Akses</option>
                                                            <?php foreach ($akses as $ak) : ?>
                                                                <option value="<?= $ak['role_id'] ?>"><?= $ak['role_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade bd-example-modal-lg-del<?= $pr['id_singkatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data singkatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="modal-title" id="exampleModalLabel"><?= $pr['singkatan']; ?></h6>
                                                    <h6 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="<?= base_url('singkatan/hapus'); ?>" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_singkatan']; ?>">
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Hapus</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php $no++;
                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Large modal -->
        <div class="modal fade" id="tipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo base_url('singkatan/tambah'); ?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Singkatan</label>
                                <input name="singkatan" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>