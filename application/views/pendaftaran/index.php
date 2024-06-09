<style>
    .tab1 {
        tab-size: 2;
    }

    .tab2 {
        tab-size: 4;
    }

    .tab4 {
        tab-size: 8;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pasien</li>
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
                        <h3 class="card-title">Daftar Pasien</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <a style="color: white;" href="<?= base_url('pendaftaran/addpasien') ?>" type="button" class="btn btn-sm btn-primary" data-target="#tipe">Tambah Pasien Baru</a>
                        <table class="table">
                            <tr>
                                <td>
                                    <form method="POST" action="<?= base_url('pendaftaran'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cari Pasien</label>
                                            <input class="form-control" name="key" placeholder="Masukkan No BPJS/NIK/NoRM/Nama Pasien" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"> Tampilkan</i></button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pasien as $pr) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $pr['pas_no_rm']; ?></td>
                                        <td><?= $pr['pas_nama']; ?></td>
                                        <td><?= $pr['pas_tempat_lahir']; ?></td>
                                        <td><?= $pr['pas_tgl_lahir']; ?></td>
                                        <td><?php
                                            $birthDate = new DateTime($pr['pas_tgl_lahir']);
                                            $today = new DateTime("today");
                                            if ($birthDate > $today) {
                                                exit("0 tahun 0 bulan 0 hari");
                                            }
                                            $y = $today->diff($birthDate)->y;
                                            $m = $today->diff($birthDate)->m;
                                            $d = $today->diff($birthDate)->d;
                                            echo $y . " tahun " . $m . " bulan " . $d . " hari"; ?></td>
                                        <td>
                                            <a href="<?= base_url('pendaftaran/editpasien/') . $this->secure->encrypt_url($pr['pas_id']) ?>" class="btn btn-success btn-sm mr-1" type="button"><i class="fas fa-edit"></i></a>
                                            <?php
                                            $cek = $this->db->get_where('t_registrasi', ['pas_id' => $pr['pas_id']])->row_array();
                                            if ($cek) {
                                            } else {
                                            ?>
                                                <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['pas_id']; ?>"><i class="fas fa-trash"></i></button>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg-del<?= $pr['pas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="modal-title" id="exampleModalLabel"><?= $pr['poli_nama']; ?></h6>
                                                    <h6 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="<?= base_url('pendaftaran/delpasien'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <div class="card-body">
                                                            <input name="kode" class="form-control" type="hidden" value="<?= $pr['pas_id']; ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Role User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo base_url('role/tambah'); ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Role</label>
                                <input name="nama" class="form-control" required>
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