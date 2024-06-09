<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kamar</li>
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
                        <h3 class="card-title">Daftar Kamar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tipe">Tambah Baru</button>
                        <hr>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas Perawatan</th>
                                    <th>Nama Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kamar as $pr) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $pr['klp_nama']; ?></td>
                                        <td><?= $pr['kamar_nama']; ?></td>
                                        <td>
                                            <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['kamar_id']; ?>"><i class="fas fa-edit"></i></button>
                                            <?php $ambil = $this->db->get_where('t_bed', ['kamar_id' => $pr['kamar_id']])->row_array();
                                            if ($ambil) {
                                            } else { ?>
                                                <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['kamar_id']; ?>"><i class="fas fa-trash"></i></button>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg-<?= $pr['kamar_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Rubah Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?= base_url('ruangan/kamaredit'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Kelas Perawatan</label>
                                                            <select name="klp" class="form-control" required>
                                                                <option value="<?= $pr['klp_id'] ?>"><?= $pr['klp_nama'] ?></option>
                                                                <?php foreach ($kelas as $k) : ?>
                                                                    <option value="<?= $k['klp_id'] ?>"><?= $k['klp_nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama kamar</label>
                                                            <input name="id" class="form-control" type="hidden" value="<?= $pr['kamar_id']; ?>">
                                                            <input name="nama" class="form-control" type="text" value="<?= $pr['kamar_nama']; ?>">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade bd-example-modal-lg-del<?= $pr['kamar_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="modal-title" id="exampleModalLabel"><?= $pr['klp_nama']; ?></h6>
                                                    <h6 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus data ini ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="<?= base_url('ruangan/kamardel'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <div class="card-body">
                                                            <input name="kode" class="form-control" type="hidden" value="<?= $pr['kamar_id']; ?>">
                                                        </div>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Hapus</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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



        <!-- Large modal -->
        <div class="modal fade" id="tipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo base_url('ruangan/kamaradd'); ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas Perawatan</label>
                                <select name="klp" class="form-control" required>
                                    <option value="">Pilih Kelas Perawatan</option>
                                    <?php foreach ($kelas as $k) : ?>
                                        <option value="<?= $k['klp_id'] ?>"><?= $k['klp_nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kamar</label>
                                <input name="nama" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>