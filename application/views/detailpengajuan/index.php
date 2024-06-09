<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pengajuan Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pengajuan Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Pengirim</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $pg['nama']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Perangkat Daerah</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $pg['nama_pd']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Dikim Pada Tanggal</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $pg['created_at']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mt-2 text-muted">Form Pengajuan</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <p for="exampleInputEmail1"><b>No. Surat Pengantar</b></p>
                                            </div>
                                            <div class="form-group">
                                                <p for="exampleInputEmail1"><b>Tanggal Surat Pengantar</b></p>
                                            </div>
                                            <div class="form-group">
                                                <p for="exampleInputEmail1"><b>Jenis Peraturan</b></p>
                                            </div>
                                            <div class="form-group">
                                                <p for="exampleInputEmail1"><b>Judul Produk</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <p>: <?= $pg['no_surat']; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <p>: <?= $pg['tgl_surat']; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <p>: <?= $pg['jenis_peraturan']; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <p>: <?= $pg['judul_produk']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Abstraksi Tentang Produk yang di Ajukan</label>
                                            <div class="mb-3">
                                                <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $pg['abstraksi']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Lampiran Surat Pengantar</label>
                                            <div class="mb-3">
                                                <iframe src="<?= base_url($pg['log_file'] . $pg['lam_surat']); ?>" width="100%" height="400"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Produk Lampiran 1</label>
                                            <div class="mb-3">
                                                <?php $ext = substr("$pg[lam_1]",-4); if ($pg['lam_1'] == '') {
                                                } else if($ext == '.pdf') { ?>
                                                    <iframe src="<?= base_url($pg['log_file'] . $pg['lam_1']); ?>" width="100%" height="400"></iframe>
                                                <?php } else { ?>
                                                    <a class="btn btn-success" href="<?= base_url($pg['log_file'] . $pg['lam_1']); ?>"><?= $pg['lam_1']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Produk Lampiran 2</label>
                                            <div class="mb-3">
                                                <?php $ext = substr("$pg[lam_2]",-4); if ($pg['lam_2'] == '') {
                                                } else if($ext == '.pdf') { ?>
                                                    <iframe src="<?= base_url($pg['log_file'] . $pg['lam_2']); ?>" width="100%" height="400"></iframe>
                                                <?php } else { ?>
                                                    <a class="btn btn-success" href="<?= base_url($pg['log_file'] . $pg['lam_2']); ?>"><?= $pg['lam_2']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Produk Lampiran 3</label>
                                            <div class="mb-3">
                                                <?php $ext = substr("$pg[lam_3]",-4); if ($pg['lam_3'] == '') {
                                                } else if($ext == '.pdf') { ?>
                                                    <iframe src="<?= base_url($pg['log_file'] . $pg['lam_3']); ?>" width="100%" height="400"></iframe>
                                                <?php } else { ?>
                                                    <a class="btn btn-success" href="<?= base_url($pg['log_file'] . $pg['lam_3']); ?>"><?= $pg['lam_3']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Produk Lampiran 4</label>
                                            <div class="mb-3">
                                                <?php $ext = substr("$pg[lam_4]",-4); if ($pg['lam_4'] == '') {
                                                } else if($ext == '.pdf') { ?>
                                                    <iframe src="<?= base_url($pg['log_file'] . $pg['lam_4']); ?>" width="100%" height="400"></iframe>
                                                <?php } else { ?>
                                                    <a class="btn btn-success" href="<?= base_url($pg['log_file'] . $pg['lam_4']); ?>"><?= $pg['lam_4']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <label for="exampleInputEmail1">Produk Lampiran 5</label>
                                            <div class="mb-3">
                                                <?php $ext = substr("$pg[lam_5]",-4); if ($pg['lam_5'] == '') {
                                                } else if($ext == '.pdf') { ?>
                                                    <iframe src="<?= base_url($pg['log_file'] . $pg['lam_5']); ?>" width="100%" height="400"></iframe>
                                                <?php } else { ?>
                                                    <a class="btn btn-success" href="<?= base_url($pg['log_file'] . $pg['lam_5']); ?>"><?= $pg['lam_5']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body pad">
                                            <a href="<?= base_url('usulproduk'); ?>" class="btn btn-sm btn-danger">Kembali</a>
                                            <?php
                                            if ($pg['status'] == 'Terkirim' && $session == '5') { ?>
                                                <button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg<?= $pg['pengajuan_id']; ?>">Proses</button>
                                                <?php } else if ($pg['status'] == 'Proses' && $session == '2') { ?>
                                                <button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-dispokabag<?= $pg['pengajuan_id']; ?>">Disposis</button>
                                                <?php } else if ($pg['to_op'] == '3' && $session == '3') { ?>
                                                <button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-dispo<?= $pg['pengajuan_id']; ?>">Disposis</button>
                                            <?php } else if ($pg['status'] == 'Disposisi' && $session == '4') { ?>
                                                <button class="btn btn-primary btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-selesai<?= $pg['pengajuan_id']; ?>">Selesai</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- /.col-->

                                    <div class="modal fade bd-example-modal-lg<?= $pg['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Proses Produk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Judul Produk Hukum : <?= $pg['judul_produk']; ?></p>
                                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Proses data ini ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="<?= base_url('detailpengajuan/proses'); ?>" enctype="multipart/form-data">
                                                        <div class="card-body">
                                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                            <input type="hidden" name="kode" class="form-control" type="hidden" value="<?= $pg['pengajuan_id']; ?>">
                                                            <input type="hidden" name="iduser" class="form-control" type="hidden" value="<?= $dec; ?>">
                                                            <input type="hidden" name="namauser" class="form-control" type="hidden" value="<?= $user['nama']; ?>">
                                                            <input type="hidden" name="role" class="form-control" type="hidden" value="2">
                                                            <input type="hidden" name="namarole" class="form-control" type="hidden" value="Kepala Bagian Hukum">
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Simpan</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade bd-example-modal-dispokabag<?= $pg['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Disposisi Usulan Produk Hukum</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="<?= base_url('detailpengajuan/disposisi'); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <p>Judul Produk Hukum : <?= $pg['judul_produk']; ?></p>
                                                        <label>Disposisi Kepada</label>
                                                        <input type="text" readonly name="namarole" class="form-control" value="Perancang Peraturan Perundang-undangan">
                                                        
                                                    </div>
                                                    <div class="modal-footer">

                                                        <div class="card-body">
                                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                            <input type="hidden" name="kode" class="form-control" type="hidden" value="<?= $pg['pengajuan_id']; ?>">
                                                            <input type="hidden" name="iduser" class="form-control" type="hidden" value="<?= $dec; ?>">
                                                            <input type="hidden" name="namauser" class="form-control" type="hidden" value="<?= $user['nama']; ?>">
                                                            <input type="hidden" name="role" class="form-control" type="hidden" value="3">
                                                        
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Simpan</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade bd-example-modal-dispo<?= $pg['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Disposisi Usulan Produk Hukum</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="<?= base_url('detailpengajuan/disposisi'); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <p>Judul Produk Hukum : <?= $pg['judul_produk']; ?></p>
                                                        <label>Disposisi Kepada Pegawai</label>
                                                        <select class="form-control" name="pegawai">
                                                            <option value="">Pilih Pegawai</option>
                                                            <?php foreach ($peg as $pr) : ?>
                                                                <option value="<?= $pr['user_id']; ?>"><?= $pr['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <div class="card-body">
                                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                            <input type="hidden" name="kode" class="form-control" type="hidden" value="<?= $pg['pengajuan_id']; ?>">
                                                            <input type="hidden" name="iduser" class="form-control" type="hidden" value="<?= $dec; ?>">
                                                            <input type="hidden" name="namauser" class="form-control" type="hidden" value="<?= $user['nama']; ?>">
                                                            <input type="hidden" name="role" class="form-control" type="hidden" value="4">
                                                            <input type="hidden" name="namarole" class="form-control" type="hidden" value="pegawai">

                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Simpan</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="modal fade bd-example-modal-selesai<?= $pg['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Produk Selesai Dikerjakan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="<?= base_url('detailpengajuan/selesai'); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <p>Judul Produk Hukum : <?= $pg['judul_produk']; ?></p>
                                                        <label>File Produk Hukum</label>
                                                        <input type="file" class="form-control" name="file" required>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <div class="card-body">
                                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                            <input type="hidden" name="kode" class="form-control" type="hidden" value="<?= $pg['pengajuan_id']; ?>">
                                                            <input type="hidden" name="iduser" class="form-control" type="hidden" value="<?= $dec; ?>">
                                                            <input type="hidden" name="namauser" class="form-control" type="hidden" value="<?= $user['nama']; ?>">
                                                            <input type="hidden" name="role" class="form-control" type="hidden" value="4">
                                                            <input type="hidden" name="namarole" class="form-control" type="hidden" value="pegawai">

                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Simpan</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->