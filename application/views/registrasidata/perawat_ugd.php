<?php
$page = $this->uri->segment(3);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Formulir</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-text-width"></i>
                                        Pasien
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nomor registrasi</dt>
                                        <dd class="col-sm-8"> : <?= $page ?></dd>
                                        <dt class="col-sm-4">Nomor Rekam medis</dt>
                                        <dd class="col-sm-8"> : <?= $reg['pas_no_rm'] ?></dd>
                                        <dt class="col-sm-4">Nama Lengkap</dt>
                                        <dd class="col-sm-8"> : <?= $reg['pas_nama'] ?></dd>
                                        <dt class="col-sm-4">Tempat lahir</dt>
                                        <dd class="col-sm-8"> : <?= $reg['pas_tempat_lahir'] ?></dd>
                                        <dt class="col-sm-4">Tanggal Lahir</dt>
                                        <dd class="col-sm-8"> : <?= $reg['pas_tgl_lahir'] ?></dd>
                                        <dt class="col-sm-4">Umur</dt>
                                        <dd class="col-sm-8"> : <?= $umur ?></dd>
                                        <dt class="col-sm-4">Jenkel</dt>
                                        <dd class="col-sm-8"> : <?php if ($reg['pas_jenkel'] == 'L') {
                                                                    echo "Laki - Laki";
                                                                } else if ($reg['pas_jenkel'] == 'P') {
                                                                    echo "Perempuan";
                                                                } ?></dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-text-width"></i>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Rujukan</dt>
                                        <dd class="col-sm-8"> : <?= $reg['pas_nama_perujuk'] ?></dd>
                                        <dt class="col-sm-4">Unit Tujuan</dt>
                                        <dd class="col-sm-8"> : <?= $reg['uk_nama'] ?></dd>
                                        <dt class="col-sm-4">Dokter</dt>
                                        <dd class="col-sm-8"> : <?= $reg['dok_gelar_depan'] . ' ' . $reg['dok_nama'] . ' ' . $reg['dok_gelar_belakang'] ?></dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->






                    <!-- /.card -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>

                            <?php if ($session == 1 || $session == 4) { ?>
                                <div>

                                    <div class="card-body">
                                        <form role="form" method="POST" action="<?= base_url('registrasidata/prosesugd'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <input type="hidden" class="form-control" name="pasid" value="<?= $reg['pas_id'] ?>">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <table class="table col-12" border="0">
                                                            <tr>
                                                                <td colspan="2">
                                                                    <a><b><u>Tanda * Wajib untuk di isi</u></b></a>
                                                                </td>
                                                                <td colspan="2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Perawat UGD
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" value="<?= $ugd['peg_gelar_depan'] . ' ' . $ugd['peg_nama'] . ' ' . $ugd['peg_gelar_belakang'] ?>" name="perawat" readonly required>
                                                                </td>
                                                                <td>
                                                                    Jam/Waktu Pelayanan
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" value="<?= $tgl . ' / ' . $waktu ?>" name="bb" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Jenis Kasus
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="kp" required>
                                                                        <option value="">Pilih Jenis Kasus</option>
                                                                        <?php foreach ($jku as $u) : ?>
                                                                            <option value="<?= $u['jku_jenis'] ?>"><?= $u['jku_jenis'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Triage
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="statuspeg">
                                                                        <option value="">Pilih Triage</option>
                                                                        <option value="Merah"><span class="badge-danger">Merah</span></option>
                                                                        <option value="Kuning"><span class="badge-warning">Kuning</span></option>
                                                                        <option value="Hijau"><span class="badge-success">Hijau</span></option>
                                                                        <option value="Hitam">Hitam</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" align="center">
                                                                    <h5> <b> Anamnesa Perawat </b> </h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Keluhan Utama
                                                                </td>
                                                                <td class="col-4">
                                                                    <textarea class="form-control" name="ap"></textarea>
                                                                </td>
                                                                <td>
                                                                    Riwayat Penyakit Sekarang
                                                                </td>
                                                                <td class="col-4">
                                                                    <textarea class="form-control" name="ap"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                                <td>
                                                                    Riwayat Penyakit Dahulu
                                                                </td>
                                                                <td class="col-4">
                                                                    <textarea class="form-control" name="ap"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" align="center">
                                                                    <h5> <b> Pemeriksaan Fisik </b> </h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tekanan Darah
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" name="td" required>
                                                                </td>
                                                                <td>
                                                                    Berat Badan
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" name="bb">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Frekuensi Nadi
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="fa">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Tinggi Badan
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="tb" value="<?= set_value('email') ?>">
                                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Suhu Tubuh
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="st" value="<?= set_value('nama') ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    IMT
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="imt">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Frekuensi Nafas
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="fn">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Kesadaran Pasien
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" name="ap"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4" align="center">
                                                                    <h5> <b> Pemeriksaan Penunjang </b> </h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                    <?php foreach ($uk as $u) : ?>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input name="penunjang" type="checkbox" value="Pemeriksaan Penunjang">
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control" value="<?= $u['uk_nama'] ?>" readonly>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    Dokter Penanggung Jawab
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="statuspeg" required>
                                                                        <option value="">Pilih Dokter</option>
                                                                        <?php foreach ($dokter as $dok) ?>
                                                                        <option value="Merah"><?= $dok['dok_gelar_depan'] . ' ' . $dok['dok_nama'] . ' ' . $dok['dok_gelar_belakang'] ?></option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('registrasidata/regugd') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                        </table>
                                                    </div>
                                                    <!--/.col (left) -->

                                                </div>
                                                <!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>
                        </div>

    </section>
</div>
</div>
</div>
</form>
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
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Unor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="POST" action="<?= base_url('unor/tambah'); ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Unor</label>
                        <input onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control" name="kode" id="exampleInputEmail1" placeholder="kode">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Unor</label>
                        <textarea onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="nama"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- /.content -->
</div>
<!-- /.content-wrapper -->