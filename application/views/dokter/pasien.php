<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrasi Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registrasi Pasien</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Registrasi Pasien</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Unit Tujuan</th>
                                    <th>Dokter Tujuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($reg as $pr) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $pr['pas_no_rm']; ?></td>
                                        <td><?= $pr['pas_nama']; ?></td>
                                        <td><?= $pr['uk_nama']; ?></td>
                                        <td><?= $pr['dok_gelar_depan'] . ' ' . $pr['dok_nama'] . ' ' . $pr['dok_gelar_belakang']; ?></td>
                                        <td><?= $pr['reg_status']; ?></td>
                                        <td>
                                            <?php if ($pr['pas_ket'] == '') { ?>
                                                <a href="<?= base_url('dokter/pemeriksaan/' . $pr['reg_id'] . '/' . $pr['rm_id']) ?>" class="btn btn-primary btn-sm mr-1" type="button"><i class="fas fa-stethoscope"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>


                                <?php $no++;
                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>




    </section>
    <!-- /.content -->
</div>