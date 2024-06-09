<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Berita</li>
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
                            <h3 class="card-title">Daftar Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Baru</button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi Berita</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($berita as $pr) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $pr['judul_berita']; ?></td>
                                            <td><?= $pr['isi_berita']; ?></td>
                                            <td><?= $pr['gambar_berita']; ?></td>
                                            <td><?= $pr['tgl_berita']; ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['id_berita']; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['id_berita']; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <div class="modal fade bd-example-modal-lg-<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <object data="<?= base_url('../upload_lampiran/' . $pr['lampiran']); ?>" width="100%" height="400"></object>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="<?= base_url('peraturan/updatelampiran'); ?>" enctype="multipart/form-data">
                                                            <div class="card-body">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
                                                                <input name="file" class="form-control" type="file" required>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Rubah Lampiran</button>
                                                        </form>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade bd-example-modal-lg-del<?= $pr['id_berita']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Judul Berita : </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $pr['judul_berita']; ?></p>
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="<?= base_url('berita/hapus'); ?>" enctype="multipart/form-data">
                                                            <div class="card-body">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_berita']; ?>">
                                                                <input name="img" class="form-control" type="hidden" value="<?= $pr['gambar_berita']; ?>">
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

                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('berita/tambah'); ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="row">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body pad">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Judul Berita</label>
                                                    <input name="judul" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body pad">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Gambar</label>
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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








            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>