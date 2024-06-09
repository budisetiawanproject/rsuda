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

                            <?php if ($session == 1 || $session == 3) { ?>
                                <div>

                                    <div class="card-body">
                                        <form role="form" method="POST" action="<?= base_url('registrasidata/prosesirja'); ?>" enctype="multipart/form-data">
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
                                                                            FORMULIR PERAWAT
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
                                                                    Nomor Registrasi
                                                                </td>
                                                                <td class="col-4">
                                                                    <input type="text" class="form-control" name="noreg" value="<?= $page ?>" readonly required>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nomor Rekam Medis
                                                                </td>
                                                                <td class="col-4">
                                                                    : <?= $reg['pas_no_rm'] ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Nama Pasien
                                                                </td>
                                                                <td class="col-4">
                                                                    : <?= $reg['pas_nama'] ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tempat Lahir
                                                                </td>
                                                                <td class="col-4">
                                                                    : <?= $reg['pas_tempat_lahir'] ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tanggal Lahir
                                                                </td>
                                                                <td class="col-4">
                                                                    : <?= $reg['pas_tgl_lahir'] ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Umur
                                                                </td>
                                                                <td class="col-4">
                                                                    : <?= $umur ?>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="col-4">
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
                                                                    Anamnesis Perawat
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" name="ap"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="modal-footer">
                                                                        <a href="<?= base_url('registrasidata/regirja') ?>" class="btn btn-danger" data-dismiss="modal">Batal</a>
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