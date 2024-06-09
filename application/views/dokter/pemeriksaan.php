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
                    <!-- /.card -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>

                            <?php if ($session == 1 || $session == 6) { ?>
                                <div>
                                    <div class="card-body">
                                        <!-- ./row -->


                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="card card-danger card-outline card-outline-tabs">
                                                    <div class="card-header p-0 border-bottom-0">
                                                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Formulir Pemeriksaan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Riwayat Pasien</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-four-tabContent">
                                                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                                <div class="row">

                                                                    <table class="table col-12" border="0">
                                                                        <tr>
                                                                            <th width="200px">
                                                                                <img class="mx-auto d-block" width="90px" src="<?= base_url('./assets/img/logo.png'); ?>">
                                                                            </th>
                                                                            <td colspan="3">
                                                                                <h3 style="text-align: center;"><b>
                                                                                        FORMULIR PEMERIKSAAN DOKTER
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
                                                                                                <form role="form" method="POST" action="<?= base_url('dokter/prosesrm'); ?>" enctype="multipart/form-data">
                                                                                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                                                                    <input type="hidden" class="form-control" name="id" value="<?= $reg['rm_id'] ?>" readonly required>
                                                                                                    <input type="hidden" class="form-control" name="reg" value="<?= $reg['reg_id'] ?>" readonly required>
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
                                                                                    <div class="col-md-6">
                                                                                        <div class="card">
                                                                                            <div class="card-header">
                                                                                                <h3 class="card-title">
                                                                                                    <i class="fas fa-stethoscope"></i>
                                                                                                    Data
                                                                                                </h3>
                                                                                            </div>
                                                                                            <!-- /.card-header -->
                                                                                            <div class="card-body">
                                                                                                <dl class="row">
                                                                                                    <dt class="col-sm-4">Tekanan Darah</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_tekanan_darah'] ?></dd>
                                                                                                    <dt class="col-sm-4">Frekuensi Nadi</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_frekuensi_nadi'] ?></dd>
                                                                                                    <dt class="col-sm-4">Suhu Tubuh</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_suhu'] ?></dd>
                                                                                                    <dt class="col-sm-4">Frekuensi Nafas</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_frekuensi_nafas'] ?></dd>
                                                                                                    <dt class="col-sm-4">Berat Badan</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_berat_badan'] ?></dd>
                                                                                                    <dt class="col-sm-4">Tinggi Badan</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_tinggi_badan'] ?></dd>
                                                                                                    <dt class="col-sm-4">IMT</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_imt'] ?></dd>
                                                                                                    <dt class="col-sm-4">Anamnesa Perawat</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['rm_anamnesis_perawat'] ?></dd>
                                                                                                    <dt class="col-sm-4">Perawat</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['peg_gelar_depan'] . ' ' . $reg['peg_nama'] . ' ' . $reg['peg_gelar_belakang']; ?></dd>
                                                                                                </dl>
                                                                                                <hr>

                                                                                                <dl class="row">
                                                                                                    <dt class="col-sm-4">Unit Tujuan</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['uk_nama'] ?></dd>
                                                                                                    <dt class="col-sm-4">Dokter</dt>
                                                                                                    <dd class="col-sm-8">: <?= $reg['dok_gelar_depan'] . ' ' . $reg['dok_nama'] . ' ' . $reg['dok_gelar_belakang'] ?></dd>
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
                                                                                Tekanan Darah
                                                                            </td>
                                                                            <td class="col-4">
                                                                                : <?= $reg['rm_tekanan_darah'] ?>
                                                                            </td>
                                                                            <td>
                                                                                Anamnesis Dokter
                                                                            </td>
                                                                            <td class="col-4">
                                                                                <textarea class="form-control" name="ad" required></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Frekuensi Nadi
                                                                            </td>
                                                                            <td>
                                                                                : <?= $reg['rm_frekuensi_nadi'] ?>
                                                                            </td>
                                                                            <td>
                                                                                Diagnosa Dokter
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" name="dd" required></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Suhu Tubuh
                                                                            </td>
                                                                            <td>
                                                                                : <?= $reg['rm_suhu'] ?>
                                                                            </td>
                                                                            <td>
                                                                                Resep Obat
                                                                            </td>
                                                                            <td>
                                                                                <textarea class="form-control" name="ro" required></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="modal-footer">
                                                                                    <a href="<?= base_url('registrasidata') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    </form>
                                                                </div>
                                                                <!--/.col (left) -->
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                                                <!-- Main content -->
                                                                <section class="content">
                                                                    <div class="row">
                                                                        <?php foreach ($rekam as $rm) : ?>
                                                                            <div class="col-md-12">
                                                                                <div class="card card-success collapsed-card">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title"><?= $rm['rm_tgl_kunjungan'] . ' / ' . $rm['rm_waktu_kunjungan'] ?></h3>

                                                                                        <div class="card-tools">
                                                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                                                <i class="fas fa-plus"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">Project Name</label>
                                                                                            <input type="text" id="inputName" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                                <!-- /.card -->
                                                                            </div>
                                                                        <?php endforeach ?>
                                                                    </div>
                                                                </section>
                                                                <!-- /.content -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                        </div>

                                        <section class="content">
                                            <!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>
                        </div>

    </section>
</div>
</div>
</div>
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