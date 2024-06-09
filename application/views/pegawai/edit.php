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
                                        <form role="form" method="POST" action="<?= base_url('pegawai/prosesedit'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <input type="hidden" class="form-control" name="id" value="<?= $peg['peg_id'] ?>" required>
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
                                                                            FORMULIR PEGAWAI
                                                                        </b>
                                                                    </h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <a><b><u>Tanda * Wajib untuk di isi</u></b></a>
                                                                </td>
                                                                <td colspan="2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kategori Pegawai *
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="kp" required>
                                                                        <option value="<?= $peg['kp_id'] ?>"><?= $peg['kp_nama'] ?></option>
                                                                        <?php foreach ($kp as $u) : ?>
                                                                            <option value="<?= $u['kp_id'] ?>"><?= $u['kp_nama'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Pendidikan Terakhir *
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="pendidikan" required>
                                                                        <option value="<?= $peg['peg_pendidikan'] ?>"><?= $peg['peg_pendidikan'] ?></option>
                                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
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
                                                                    NIK
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nik" maxlength="16" value="<?= $peg['peg_nik'] ?>" required>
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    <input type="email" class="form-control" name="email" value="<?= $peg['peg_email'] ?>">
                                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    NIP
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nip" maxlength="18" value="<?= $peg['peg_nip'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Tanggal Bergabung RS
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tglgabung" value="<?= $peg['peg_tgl_gabung'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Lengkap *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nama" required value="<?= $peg['peg_nama'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    PNS / PPPK / Tenaga Kontrak *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="statuspeg" required>
                                                                        <option value="<?= $peg['peg_sts_peg'] ?>"><?= $peg['peg_sts_peg'] ?></option>
                                                                        <option value="PNS">PNS</option>
                                                                        <option value="PPPK">PPPK</option>
                                                                        <option value="Tenaga Kontrak">Tenaga Kontrak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Gelar Depan *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="gelardepan" value="<?= $peg['peg_gelar_depan'] ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Aktif *
                                                                </td>

                                                                <td>
                                                                    <select class="form-control" name="ket" required>
                                                                        <option value="<?= $peg['peg_ket'] ?>"><?= $peg['peg_ket'] ?></option>
                                                                        <option value="Aktif">Aktif</option>
                                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Gelar Belakang
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="gelarbelakang" value="<?= $peg['peg_gelar_belakang'] ?>">
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('pegawai') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tempat Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="tempatlahir" required value="<?= $peg['peg_tempat_lahir'] ?>">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tanggal Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgllahir" required value="<?= $peg['peg_tgl_lahir'] ?>">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Jenkel *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="jenkel" required>
                                                                        <option value="<?= $peg['peg_jenkel'] ?>"><?php if ($peg['peg_jenkel'] == 'L') {
                                                                                                                        echo 'Laki - laki';
                                                                                                                    } else {
                                                                                                                        echo 'Perempuan';
                                                                                                                    } ?></option>
                                                                        <option value="L">Laki - Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Provinsi *
                                                                </td>
                                                                <td>
                                                                    <select name="provb" class="form-control select2 select2-danger" id="provinsi" required>
                                                                        <option value="<?= $peg['peg_prov'] ?>" selected="selected"><?= $peg['peg_prov'] ?></option>
                                                                        <?php foreach ($provinsi as $prov) {
                                                                            echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kabupaten/Kota *
                                                                </td>
                                                                <td>
                                                                    <select name="kabb" class="form-control" id="kabupaten" required>
                                                                        <option value='<?= $peg['peg_kab'] ?>'><?= $peg['peg_kab'] ?></option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kecamatan *
                                                                </td>
                                                                <td>
                                                                    <select name="kecb" class="form-control" id="kecamatan" required>
                                                                        <option value="<?= $peg['peg_kec'] ?>"><?= $peg['peg_kec'] ?></option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kelurahan *
                                                                </td>
                                                                <td>
                                                                    <select name="kelb" class="form-control" id="desa" required>
                                                                        <option value="<?= $peg['peg_kel'] ?>"><?= $peg['peg_kel'] ?></option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Alamat *
                                                                </td>
                                                                <td>
                                                                    <textarea name="alamat" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required><?= $peg['peg_alamat'] ?></textarea>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No. HP
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nohp" maxlength="12" value="<?= $peg['peg_nohp'] ?>">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Agama *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="agama" required>
                                                                        <option value="<?= $peg['peg_agama'] ?>"><?= $peg['peg_agama'] ?></option>
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
                                                                    <select class="form-control" name="status" required>
                                                                        <option value="<?= $peg['peg_status'] ?>"><?= $peg['peg_status'] ?></option>
                                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                                        <option value="Menikah">Menikah</option>
                                                                        <option value="Duda">Duda</option>
                                                                        <option value="Janda">Janda</option>
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