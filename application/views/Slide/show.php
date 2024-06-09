<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slide</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slide</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Slide</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Baru</button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>No</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($slide as $pr) : ?>
                                        <tr>
                                            <td style="width: 50px; text-align: center;"><?= $no; ?></td>
                                            <td><?= $pr['judul']; ?></td>
                                            <td style="width: 50px;"><img width="90%" src="img/upload_gambar/<?= $pr['gambar']; ?>"></td>
                                            <td style="width: 150px;">
                                                <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['id_slide']; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['id_slide']; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <div class="modal fade bd-example-modal-lg-<?= $pr['id_slide']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLongTitle">Rubah Slide</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('slide/edit'); ?>">
                                                            <div class="row col-md-12">
                                                                <section class="content">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="card-body pad">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Baris Pertama</label>
                                                                                    <input name="kode" type="hidden" class="form-control" value="<?= $pr['id_slide']; ?>" required>
                                                                                    <input name="satu" class="form-control" value="<?= $pr['judul']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Baris Kedua</label>
                                                                                    <input name="dua" class="form-control" value="<?= $pr['sub_judul']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Baris Ketiga</label>
                                                                                    <input name="tiga" class="form-control" value="<?= $pr['deskripsi']; ?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card-body pad">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Gambar</label>
                                                                                    <input type="file" name="file" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.col-->
                                                                    </div>
                                                                    <!-- ./row -->
                                                                </section>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade bd-example-modal-lg-del<?= $pr['id_slide']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Judul : <?= $pr['judul']; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="<?= base_url('show/hapus'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                            <div class="card-body">
                                                                <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_slide']; ?>">
                                                                <input name="img" class="form-control" type="hidden" value="<?= $pr['gambar']; ?>">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Hapus</button>
                                                        </form>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Slide</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('show/tambah'); ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="row col-md-12">
                                <section class="content">
                                    <div class="row">
                                        <div class="card-body pad">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi 200 Karakter</label>
                                                <textarea name="judul" class="form-control" maxlength="200" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Gambar Harus Landscape (800x400)</label>
                                                <input type="file" name="gambar" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                    <!-- ./row -->
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>








        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>