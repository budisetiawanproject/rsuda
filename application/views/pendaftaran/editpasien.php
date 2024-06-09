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
                                        <form role="form" method="POST" action="<?= base_url('pendaftaran/editpasien'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <input type="text" class="form-control" name="id" value="<?= $pr['pas_id'] ?>">
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
                                                                            FORMULIR PENDAFTARAN PASIEN BARU
                                                                        </b>
                                                                    </h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <a><b><u>Identitas Seusai dengan Tanda Pengenal (KTP, SIM, dll) Data Pasien</u></b></a><br>
                                                                    <a><b><u>Tanda * Wajib untuk di isi</u></b></a>
                                                                </td>
                                                                <td colspan="2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No. Rekam Medis *
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" name="rm" value="<?= $pr['pas_no_rm'] ?>">
                                                                    <?= form_error('rm', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Pendidikan *
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="pendidikan" required>
                                                                        <option value="<?= $pr['pas_pendidikan'] ?>"><?= $pr['pas_pendidikan'] ?></option>
                                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                                        <option value="Belum Sekolah">Belum Sekolah</option>
                                                                        <option value="TK">TK</option>
                                                                        <option value="SD">SD</option>
                                                                        <option value="SMP">SMP</option>
                                                                        <option value="SMA">SMA</option>
                                                                        <option value="D3">D3</option>
                                                                        <option value="D4">D4</option>
                                                                        <option value="S1">S1</option>
                                                                        <option value="S2">S2</option>
                                                                        <option value="S3">S3</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    ID Simrs
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="idsimrs" value="<?= $pr['Id_simrs'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    <input type="email" class="form-control" name="email" value="<?= $pr['pas_email'] ?>">
                                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No BPJS
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nobpjs" value="<?= $pr['Id_bpjs'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Pekerjaan *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pekerjaan" value="<?= $pr['pas_pekerjaan'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    NIK
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" maxlength="16" name="nik" value="<?= $pr['pas_nik'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Nama Ibu Kandung
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namaibu" value="<?= $pr['pas_nama_ibu'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Lengkap *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nama" value="<?= $pr['pas_nama'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Nama Penanggung Jawab *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namapj" value="<?= $pr['pas_pj_nama'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tempat Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="tempatlahir" value="<?= $pr['pas_tempat_lahir'] ?>">
                                                                </td>
                                                                <td>
                                                                    No. HP Penanggung Jawab *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pjhp" value="<?= $pr['pas_pj_hp'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tanggal Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgllahir" value="<?= $pr['pas_tgl_lahir'] ?>">
                                                                </td>
                                                                <td>
                                                                    Penanggung Jawab Hubungan Dengan Pasien *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pjhubungan" value="<?= $pr['pas_pj_hubungan'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Jenkel *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="jenkel">
                                                                        <option value="<?= $pr['pas_jenkel'] ?>"><?php
                                                                                                                    if ($pr['pas_jenkel'] == 'P') {
                                                                                                                        echo 'Perempuan';
                                                                                                                    } else {
                                                                                                                        echo 'Laki - laki';
                                                                                                                    } ?></option>
                                                                        <option value="L">Laki - Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Tanggal Datang *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgldatang" value="<?= $pr['pas_tgl_datang'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Provinsi *
                                                                </td>
                                                                <td>
                                                                    <select name="provb" class="form-control select2 select2-danger" id="provinsi">
                                                                        <option value="<?= $pr['pas_prov'] ?>" selected="selected"><?= $pr['pas_prov'] ?></option>
                                                                        <?php foreach ($provinsi as $prov) {
                                                                            echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Yang Menyatakan
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="menyatakan" value="<?= $pr['pas_menyatakan'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kabupaten/Kota *
                                                                </td>
                                                                <td>
                                                                    <select name="kabb" class="form-control" id="kabupaten">
                                                                        <option value="<?= $pr['pas_kab'] ?>"><?= $pr['pas_kab'] ?></option>
                                                                    </select>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kecamatan *
                                                                </td>
                                                                <td>
                                                                    <select name="kecb" class="form-control" id="kecamatan">
                                                                        <option value="<?= $pr['pas_kec'] ?>"><?= $pr['pas_kec'] ?></option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kelurahan *
                                                                </td>
                                                                <td>
                                                                    <select name="kelb" class="form-control" id="desa">
                                                                        <option value="<?= $pr['pas_kel'] ?>"><?= $pr['pas_kel'] ?></option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Alamat *
                                                                </td>
                                                                <td>
                                                                    <textarea name="alamat" class="form-control" onkeyup="this.value = this.value.toUpperCase()"><?= $pr['pas_alamat'] ?></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No. HP *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nohp" required value="<?= $pr['pas_nohp'] ?>">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Agama *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="agama">
                                                                        <option value="<?= $pr['pas_agama'] ?>"><?= $pr['pas_agama'] ?></option>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Kristen">Kristen</option>
                                                                        <option value="Katholik">Katholik</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Budha">Budha</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Status *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="status">
                                                                        <option value="<?= $pr['pas_status_kawin'] ?>"><?= $pr['pas_status_kawin'] ?></option>
                                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                                        <option value="Menikah">Menikah</option>
                                                                        <option value="Duda">Duda</option>
                                                                        <option value="Janda">Janda</option>
                                                                        <option value="Bawah Umur">Bawah Umur</option>
                                                                    </select>
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