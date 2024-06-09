<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Produk Hukum</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuanproduk</li>
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
                            <h3 class="card-title">Daftar Pengajuan Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>


                            <?php if ($session == '1') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Unit Kerja</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Lam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="fa fa-upload"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload File Autentikasi Produk Hukum</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="<?= base_url('prosesaut/upload'); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <input type="hidden" name="kode" class="form-control" value="<?= $pr['pengajuan_id']; ?>">
                                                                <input type="hidden" name="iduser" class="form-control" value="<?= $dec; ?>">
                                                                <input type="hidden" name="namauser" class="form-control" value="<?= $user['nama']; ?>">
                                                                <input type="hidden" name="role" class="form-control" value="7">
                                                                <label>Judul Produk Hukum</label>
                                                                <textarea class="form-control" readonly><?= $pr['judul_produk']; ?></textarea>
                                                                <label>File Produk Hukum (*.pdf)</label>
                                                                <input name="file" class="form-control" type="file" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit">Upload</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-timeline-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Pengusulan Produk Hukum : <?= $pr['judul_produk']; ?></h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/hapus'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
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

                            <?php }
                            if ($session == '5') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tgl Kirim</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Unit Kerja</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Surat</th>
                                            <th>Cetak</th>
                                            <th>Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($terkirim as $pr) : ?>
                                            <tr>
                                                <td><?= $pr['created_at']; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm mr-1" target="blank" href="<?= base_url('detailpengajuan/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>"><i class="fas fa-desktop"></i></a>
                                                </td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['lam_surat']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/updatelampiran'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
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

                                            <div class="modal fade bd-example-modal-timeline-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Pengusulan Produk Hukum : <?= $pr['judul_produk']; ?></h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/hapus'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
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





                            <?php }
                            if ($session == '3' || $session == '4') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tgl Kirim</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Unit Kerja</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Surat</th>
                                            <th>Cetak</th>
                                            <th>Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $pr['created_at']; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm mr-1" target="blank" href="<?= base_url('detailpengajuan/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>"><i class="fas fa-desktop"></i></a>
                                                </td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['lam_surat']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/updatelampiran'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
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

                                            <div class="modal fade bd-example-modal-timeline-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Pengusulan Produk Hukum : <?= $pr['judul_produk']; ?></h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/hapus'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
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
                            <?php } else if ($session == '6') { ?>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Baru</button>
                                <hr>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Surat & Judul</th>
                                            <th>Tgl Surat</th>
                                            <th>Jenis Peraturan</th>
                                            <th>Status</th>
                                            <th>Lampiran</th>
                                            <th>Cetak</th>
                                            <th>Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><a style="color: white;" href="#" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['no_surat']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['no_surat']; ?></span><?php } ?></a>
                                                    <br><?= $pr['judul_produk']; ?>
                                                </td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['jenis_peraturan']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><a style="color: white;" class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-upload-<?= $pr['pengajuan_id']; ?>"><?php if ($pr['lam_1'] == '') {
                                                                                                                                                                                                                                echo '( 0 )';
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if ($pr['lam_2'] == '') {
                                                                                                                                                                                                                                    echo '( 1 )';
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    if ($pr['lam_3'] == '') {
                                                                                                                                                                                                                                        echo '( 2 )';
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        if ($pr['lam_4'] == '') {
                                                                                                                                                                                                                                            echo '( 3 )';
                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                            if ($pr['lam_5'] == '') {
                                                                                                                                                                                                                                                echo '( 4 )';
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                echo '( 5 )';
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } ?> &nbsp; <i class="fa fa-upload"></i></a></td>
                                                <td><?php if ($pr['file_selesai'] == '') {
                                                    } else { ?><button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-cetak-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button><?php } ?></td>
                                                <td><?php if ($pr['autentikasi'] == '') {
                                                    } else { ?><button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-terbit-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button><?php } ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-edit-<?= $pr['pengajuan_id']; ?>"><i class="fas fa-edit"></i></button>
                                                    <?php if ($pr['status'] == 'Terkirim') { ?>
                                                        <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['pengajuan_id']; ?>"><i class="fas fa-trash"></i></button>
                                                    <?php } else {
                                                    } ?>
                                                </td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['lam_surat']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('usulproduk/updatesurat'); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                    <input name="file" class="form-control" type="file" id="file" onchange="return validasiEkstensi()" required>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Rubah Surat</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-terbit-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['file_ttd_aut']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-cetak-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['file_selesai']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="modal fade bd-example-modal-lg-upload-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran yang terupload</h5>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Lampiran 1</label><br>
                                                                <?php if ($pr['lam_1'] == '') { ?>
                                                                    <a class="form-control btn btn-danger"></a>
                                                                <?php } else { ?>
                                                                    <a class="col-10 btn btn-success" href="<?= base_url($pr['log_file'] . $pr['lam_1']); ?>"><?= $pr['lam_1']; ?></a>
                                                                    <a class="col-1 btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Lampiran 2</label><br>
                                                                <?php if ($pr['lam_2'] == '') { ?>
                                                                    <a class="form-control btn btn-danger"></a>
                                                                <?php } else { ?>
                                                                    <a class="col-10 btn btn-success" href="<?= base_url($pr['log_file'] . $pr['lam_2']); ?>"><?= $pr['lam_2']; ?></a>
                                                                    <a class="col-1 btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Lampiran 3</label><br>
                                                                <?php if ($pr['lam_3'] == '') { ?>
                                                                    <a class="form-control btn btn-danger"></a>
                                                                <?php } else { ?>
                                                                    <a class="col-10 btn btn-success" href="<?= base_url($pr['log_file'] . $pr['lam_3']); ?>"><?= $pr['lam_3']; ?></a>
                                                                    <a class="col-1 btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Lampiran 4</label><br>
                                                                <?php if ($pr['lam_4'] == '') { ?>
                                                                    <a class="form-control btn btn-danger"></a>
                                                                <?php } else { ?>
                                                                    <a class="col-10 btn btn-success" href="<?= base_url($pr['log_file'] . $pr['lam_4']); ?>"><?= $pr['lam_4']; ?></a>
                                                                    <a class="col-1 btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Lampiran 5</label><br>
                                                                <?php if ($pr['lam_5'] == '') { ?>
                                                                    <a class="form-control btn btn-danger"></a>
                                                                <?php } else { ?>
                                                                    <a class="col-10 btn btn-success" href="<?= base_url($pr['log_file'] . $pr['lam_5']); ?>"><?= $pr['lam_5']; ?></a>
                                                                    <a class="col-1 btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                            <hr>
                                                            <form method="POST" action="<?= base_url('usulproduk/uploadlampiran'); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <input name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                <input name="id" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                <div class="card-body">
                                                                    <label for="exampleInputEmail1">Tambah File Lampiran ( pdf, doc, docx, xlsx, xls ) max zise 8 Mb</label>
                                                                    <input name="file" class="form-control" type="file"><br>
                                                                    <button class="btn btn-primary" type="submit">Upload</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('usulproduk/hapus'); ?>">
                                                                <div class="card-body">
                                                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Hapus</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Edit -->
                                            <div class="modal fade bd-example-modal-lg-edit-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Pengajuan Produk Hukum</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('usulproduk/rubahdata'); ?>">
                                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                <input name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">No. Surat Pengantar</label>
                                                                                <input name="no" class="form-control" value="<?= $pr['no_surat']; ?>"></input>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Tanggal Surat Pengantar</label>
                                                                                <input type="date" name="tgl" class="form-control" value="<?= $pr['tgl_surat']; ?>" required></input>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Jenis Peraturan</label>
                                                                                <select name="jns" class="form-control" required>
                                                                                    <option value=""><?= $pr['jenis_peraturan']; ?></option>
                                                                                    <?php foreach ($jns as $j) : ?>
                                                                                        <option value="<?= $j['jns_peraturan']; ?>"><?= $j['jns_peraturan']; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Judul Produk</label>
                                                                                <textarea style="height: 210px;" name="judul" class="form-control" required><?= $pr['judul_produk']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="card-body pad">
                                                                            <label for="exampleInputEmail1">Abstraksi Tentang Produk yang di Ajukan (Wajib diisi)</label>
                                                                            <div class="mb-3">
                                                                                <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $pr['abstraksi']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col-->
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



                                        <?php $no++;
                                        endforeach; ?>

                                    </tbody>
                                </table>

                            <?php } else if ($session == '2') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Jenis Peraturan</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Lam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $pr['created_at']; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><button class="btn btn-warning btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm mr-1" target="blank" href="<?= base_url('detailpengajuan/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>"><i class="fas fa-desktop"></i></a>
                                                </td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lampiran Surat : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['lam_surat']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/updatelampiran'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
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

                                            <div class="modal fade bd-example-modal-timeline-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Pengusulan Produk Hukum : <?= $pr['judul_produk']; ?></h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('peraturan/hapus'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
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
                                </table>
                            <?php } ?>


                            <?php if ($session == '7') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Perangkat Daerah</th>
                                            <th>Judul Produk</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <th>Terbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if ($pr['status'] == 'Disposisi') { ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Selesai') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Terkirim') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($pr['status'] == 'Proses') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Paraf') { ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Tanda Tangan') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($pr['status'] == 'Terbit') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($pr['status'] == 'Autentikasi') { ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button></td>
                                                <td><?php if ($pr['file_ttd_aut'] == '') {
                                                    } else { ?><button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="far fa-file-pdf"></i></button><?php } ?></td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">File Produk Hukum : <?= $pr['judul_produk']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <object data="<?= base_url($pr['log_file'] . $pr['file_selesai']); ?>" width="100%" height="400"></object>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('usulproduk/download'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Download</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade bd-example-modal-timeline-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Pengusulan Produk Hukum : <?= $pr['judul_produk']; ?></h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade bd-example-modal-lg-del<?= $pr['id_peraturan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Judul Peraturan : <?= $pr['judul']; ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= base_url('usulproduk/hapus'); ?>" enctype="multipart/form-data">
                                                                <div class="card-body">
                                                                    <input name="kode" class="form-control" type="hidden" value="<?= $pr['id_peraturan']; ?>">
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
                                </table>
                            <?php } ?>


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

                        <h5 class="modal-title" id="exampleModalLongTitle">Pengajuan Produk Hukum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('usulproduk/tambah'); ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <input type="hidden" name="kode" class="form-control" value="<?= $user['user_id']; ?>"></input>
                            <input type="hidden" name="pd" class="form-control" value="<?= $user['skpd']; ?>"></input>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No. Surat Pengantar</label>
                                            <input name="no" class="form-control" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Surat Pengantar</label>
                                            <input type="date" name="tgl" class="form-control" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Upload Surat Pengantar ( pdf )</label>
                                            <input type="file" name="up" class="form-control" id="file" onchange="return validasiEkstensi()" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Peraturan</label>
                                            <select name="jns" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <?php foreach ($jns as $j) : ?>
                                                    <option value="<?= $j['jns_peraturan']; ?>"><?= $j['jns_peraturan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Produk</label>
                                            <textarea name="judul" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lampiran Naskah Produk Hukum Daerah File Word ( doc, docx )</label>
                                            <input type="file" name="lam" id="fileInput" onchange="return checkFile()" class="form-control mb-2" required>
                                            <label style="color: red;" for="exampleInputEmail1">Catatan Lampiran :</label>
                                            <label style="color: red;" for="exampleInputEmail1">Naskah Produk hukum yang dilampirkan disini harus berbentuk file Word, dan apabila ada lebih dari 1 (satu) file lampiran yg berbentuk pdf, word atau Excel silahkan menguploadnya di kolom "lampiran" setelah file ini disimpan.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body pad">
                                        <label for="exampleInputEmail1">Abstraksi Tentang Produk yang di Ajukan (Wajib diisi)</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" onclick="checkFile()">Simpan</button>
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
<script>
    function validasiEkstensi() {
        var inputFile = document.getElementById('file');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.pdf)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file Surat dengan ekstensi .pdf');
            inputFile.value = '';
            return false;
        } else {
            // Preview gambar
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="height:300px"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }

    function checkFile() {
        var fileInput = document.getElementById('fileInput');
        var fileSize = fileInput.files[0].size;
        var maxSize = 1024 * 8129; // 8MB
        var pathFile = fileInput.value;
        var ekstensiOk = /(\.doc|\.docx)$/i;

        if (fileSize > maxSize) {
            alert('Maaf File Lampiran terlalu besar, maksimal 8 Mb');
            fileInput.value = '';
            return false;
        } else {
            if (!ekstensiOk.exec(pathFile)) {
                alert('Lampiran Naskah Produk Hukum Daerah Harus File Word ( doc, docx )');
                fileInput.value = '';
                return false;
            } else {
                // Preview gambar
                if (inputFile.files && inputFile.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="height:300px"/>';
                    };
                    reader.readAsDataURL(inputFile.files[0]);
                }
            }
        }
    }
</script>