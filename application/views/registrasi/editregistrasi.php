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
                    <!-- /.card -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>

                            <?php if ($session == 1 || $session == 2) { ?>
                                <div>

                                    <div class="card-body">
                                        <form role="form" method="POST" action="<?= base_url('registrasi/editregister'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <input type="hidden" class="form-control" name="id" value="<?= $pr['reg_id']; ?>">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">

                                                        <table class="table col-12" border="0">
                                                            <tr>
                                                                <th width="200px">
                                                                    <img class="mx-auto d-block" width="90px" src="<?= base_url('./assets/img/logo.png'); ?>">
                                                                </th>
                                                                <td colspan="3">
                                                                    <h3 style="text-align: center;"><b>
                                                                            FORMULIR REGISTRASI PASIEN
                                                                        </b>
                                                                    </h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">
                                                                                        <i class="fas fa-user"></i>
                                                                                        Pasien
                                                                                    </h3>
                                                                                </div>
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">
                                                                                    <dl class="row">
                                                                                        <dt class="col-sm-4">No. RM</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_no_rm']; ?></dd>
                                                                                        <dt class="col-sm-4">ID Simrs</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['Id_simrs']; ?></dd>
                                                                                        <dt class="col-sm-4">No BPJS</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['Id_bpjs']; ?></dd>
                                                                                        <dt class="col-sm-4">NIK</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_nik']; ?></dd>
                                                                                        <dt class="col-sm-4">Nama Lengkap</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_nama']; ?></dd>
                                                                                        <dt class="col-sm-4">Tempat Lahir</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_tempat_lahir']; ?></dd>
                                                                                        <dt class="col-sm-4">Tanggal Lahir</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_tgl_lahir']; ?></dd>
                                                                                        <dt class="col-sm-4">Umur</dt>
                                                                                        <dd class="col-sm-8">: <?= $umur; ?></dd>
                                                                                        <dt class="col-sm-4">Jenkel</dt>
                                                                                        <dd class="col-sm-8">: <?php if ($pr['pas_jenkel'] == 'P') {
                                                                                                                    echo 'Perempuan';
                                                                                                                } else {
                                                                                                                    echo 'Laki - Laki';
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
                                                                                        <i class="fas fa-home"></i>
                                                                                        Data
                                                                                    </h3>
                                                                                </div>
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">
                                                                                    <dl class="row">
                                                                                        <dt class="col-sm-4">Provinsi</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_prov']; ?></dd>
                                                                                        <dt class="col-sm-4">Kabupaten</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_kab']; ?></dd>
                                                                                        <dt class="col-sm-4">Kecamatan</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_kec']; ?></dd>
                                                                                        <dt class="col-sm-4">Kelurahan</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_kel']; ?></dd>
                                                                                        <dt class="col-sm-4">Alamat</dt>
                                                                                        <dd class="col-sm-8">: <?= $pr['pas_alamat']; ?></dd>
                                                                                    </dl>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <!-- ./col -->
                                                                    </div>
                                                                    <!-- /.row -->
                                                                    <a><b><u>Tanda * Wajib untuk di isi</u></b></a>
                                                                </td>
                                                                <td colspan="2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Pembayaran *
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="bayar">
                                                                        <option value="<?= $pr['reg_pembayaran']; ?>"><?= $pr['reg_pembayaran']; ?></option>
                                                                        <option value="Umum">Umum</option>
                                                                        <option value="BPJS">BPJS</option>
                                                                        <option value="Asuransi">Asuransi</option>
                                                                        <option value="Jaminan Perusahaan">Jaminan Perusahaan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Unit yang dituju *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="unittujuan" id="ambilunit" required>
                                                                        <option value="<?= $pr['uk_id']; ?>"><?= $pr['uk_nama']; ?></option>
                                                                        <?php foreach ($unit as $u) : ?>
                                                                            <option value="<?= $u['uk_id'] ?>"><?= $u['uk_nama'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Pembayaran
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="bayarnama" value="<?= $pr['reg_byr_nama']; ?>">
                                                                </td>
                                                                <td>
                                                                    Dokter yang dituju *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="drtujuan" id="ambildokter" required>
                                                                        <option value="<?= $pr['dok_id']; ?>"><?= $pr['dok_gelar_depan'] . $pr['dok_nama'] . $pr['dok_gelar_belakang']; ?></option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Perujuk
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namaperujuk" value="<?= $pr['reg_nama_perujuk']; ?>">
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tanggal Datang *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgl" value="<?= $pr['reg_tgl_datang']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Jam Datang *
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control" name="waktu" value="<?= $pr['reg_waktu_datang']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('registrasi') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
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



<!-- /.content -->
</div>
<!-- /.content-wrapper -->