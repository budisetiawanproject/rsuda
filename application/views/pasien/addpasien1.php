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
                                        <form role="form" method="POST" action="<?= base_url('pasien/addpasien'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

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
                                                                    <input type="text" class="form-control" name="rm" value="<?= set_value('rm') ?>">
                                                                    <?= form_error('rm', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Pendidikan *
                                                                </td>
                                                                <td class="col-4">
                                                                    <select class="form-control" name="pendidikan" required>
                                                                        <option value="">Pilih</option>
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
                                                                    <input type="text" class="form-control" name="idsimrs" value="<?= set_value('nama') ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No BPJS
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nobpjs" value="<?= set_value('nama') ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Pekerjaan *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pekerjaan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    NIK
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nik" value="<?= set_value('nama') ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Nama Ibu Kandung
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namaibu">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Lengkap *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                                                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                                                </td>
                                                                <td>
                                                                    Nama Penanggung Jawab *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namapj">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tempat Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="tempatlahir">
                                                                </td>
                                                                <td>
                                                                    No. HP Penanggung Jawab *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pjhp">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tanggal Lahir *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgllahir">
                                                                </td>
                                                                <td>
                                                                    Penanggung Jawab Hubungan Dengan Pasien *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="pjhubungan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Jenkel *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="jenkel">
                                                                        <option value="">Pilih</option>
                                                                        <option value="L">Laki - Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Pembayaran *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="bayar">
                                                                        <option value="">Pilih</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="BPJS">BPJS</option>
                                                                        <option value="Asuransi">Asuransi</option>
                                                                        <option value="Jaminan Perusahaan">Jaminan Perusahaan</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Provinsi *
                                                                </td>
                                                                <td>
                                                                    <select name="provb" class="form-control select2 select2-danger" id="provinsi">
                                                                        <option value="" selected="selected">Select Provinsi</option>
                                                                        <?php foreach ($provinsi as $prov) {
                                                                            echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Nama Pembayaran
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="bayarnama">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kabupaten/Kota *
                                                                </td>
                                                                <td>
                                                                    <select name="kabb" class="form-control" id="kabupaten">
                                                                        <option value=''>Select Kabupaten</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Tanggal Datang *
                                                                </td>
                                                                <td>
                                                                    <input type="date" class="form-control" name="tgldatang">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kecamatan *
                                                                </td>
                                                                <td>
                                                                    <select name="kecb" class="form-control" id="kecamatan">
                                                                        <option>Select Kecamatan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Nama Perujuk *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="namaperujuk">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Kelurahan *
                                                                </td>
                                                                <td>
                                                                    <select name="kelb" class="form-control" id="desa">
                                                                        <option>Select Kelurahan</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Unit yang dituju *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="unittujuan" id="ambilunit" required>
                                                                        <option value="">Pilih</option>
                                                                        <?php foreach ($unit as $u) : ?>
                                                                            <option value="<?= $u['uk_id'] ?>"><?= $u['uk_nama'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Alamat *
                                                                </td>
                                                                <td>
                                                                    <textarea name="alamat" class="form-control" onkeyup="this.value = this.value.toUpperCase()"></textarea>
                                                                </td>
                                                                <td>
                                                                    Dokter yang dituju
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="drtujuan" id="ambildokter" required>
                                                                        <option value="">Pilih Dokter</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    No. HP *
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nohp" required>
                                                                </td>
                                                                <td>
                                                                    Yang Menyatakan
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="menyatakan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Agama *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="agama">
                                                                        <option value="">Pilih</option>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Kristen">Kristen</option>
                                                                        <option value="Katholik">Katholik</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Budha">Budha</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Petugas Pendaftaran
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="petugas">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Status *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="status">
                                                                        <option value="">Pilih</option>
                                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                                        <option value="Menikah">Menikah</option>
                                                                        <option value="Duda">Duda</option>
                                                                        <option value="Janda">Janda</option>
                                                                        <option value="Bawah Umur">Bawah Umur</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    Pasien *
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="statuspasien" required>
                                                                        <option value="">Pilih</option>
                                                                        <option value="Baru">Baru</option>
                                                                        <option value="Lama">Lama</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                    <!--/.col (left) -->
                                                    <div class="modal-footer">
                                                        <a href="<?= base_url('pasien') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                    </div>
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