<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Proses Berkas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('usulproduk'); ?>">Pengajuan Produk</a></li>
                        <li class="breadcrumb-item active">Proses</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>&nbsp;
                                <li class="nav-item"><a class="btn btn-danger" href="<?= base_url('usulproduk'); ?>">Kembali</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <?php foreach ($riwayat as $rw) : ?>
                                            <div class="time-label">
                                                <span class="bg-success"><?= $rw['rec_tgl']; ?></span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <?php if ($rw['rec_status'] == 'Terkirim') {
                                                    echo '<i class="fas fa-envelope bg-danger"></i>';
                                                } else if ($rw['rec_status'] == 'Proses') {
                                                    echo '<i class="fas fa-envelope-open bg-danger"></i>';
                                                } else if ($rw['rec_status'] == 'Dikerjakan') {
                                                    echo '<i class="fas fa-desktop bg-danger"></i>';
                                                } else if ($rw['rec_status'] == 'Disposisi') {
                                                    echo '<i class="fas fa-suitcase bg-danger"></i>';
                                                } ?>


                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i><span class="bg-success">
                                                            <?= $rw['rec_waktu']; ?>
                                                        </span></span>

                                                    <h3 class="timeline-header"><a href="#"><?= $rw['rec_user_nama']; ?></a></h3>

                                                    <div class="timeline-body">
                                                        <?= $rw['rec_status'] . ' ' . $rw['rec_pesan'] . ' ' . $rw['rec_op'] . ' ' . $rw['rec_op_nama']; ?>
                                                        <?= $rw['rec_ket']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->