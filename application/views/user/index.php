<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting User</li>
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
                        <h3 class="card-title">Daftar User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Akses</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($usert as $pr) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td>
                                            <?php if ($pr['us_image'] == 'default.jpg') { ?><img style="height: 90px" src="<?= base_url() ?>assets/img/default.jpg" class="brand-image elevation-3" style="opacity: .8">
                                            <?php } else {
                                            } ?>
                                        </td>
                                        <td><?= $pr['us_nama']; ?></td>
                                        <td><?= $pr['us_username']; ?></td>
                                        <td><?= $pr['role_name']; ?></td>
                                        <td>
                                            <?php if ($pr['us_active'] == '1') { ?>
                                                <span class="right badge badge-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="right badge badge-danger">Tidak Aktif</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <button class="btn btn-success btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['us_id']; ?>"><i class="fas fa-edit"></i></button>

                                            <button class="btn btn-danger btn-sm mr-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg-del<?= $pr['us_id']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg-<?= $pr['us_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="<?php echo base_url('settinguser/edit'); ?>" method="post">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <input type="hidden" name="id" class="form-control" value="<?= $pr['us_id']; ?>" required>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                                            <input name="nama" class="form-control" value="<?= $pr['us_nama']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Username</label>
                                                            <input name="username" class="form-control" value="<?= $pr['us_username']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label>
                                                            <input name="email" class="form-control" value="<?= $pr['us_email']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Role Akses</label>
                                                            <select class="form-control" name="role">
                                                                <option value="<?= $pr['us_role_id']; ?>"><?= $pr['role_name']; ?></option>
                                                                <?php foreach ($role as $r) : ?>
                                                                    <option value="<?= $r['role_id']; ?>"><?= $r['role_name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Aktif</label>
                                                            <select class="form-control" name="aktif" required>
                                                                <option value="<?= $pr['us_active']; ?>"><?php if ($pr['us_active'] == '1') {
                                                                                                                echo "Aktif";
                                                                                                            } else {
                                                                                                                echo "Tidak Aktif";
                                                                                                            } ?></option>
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade bd-example-modal-lg-del<?= $pr['us_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="modal-title" id="exampleModalLabel"><?= $pr['us_nama']; ?></h6>
                                                    <h6 class="modal-title" id="exampleModalLabel"><?= $pr['us_username']; ?></h6>
                                                    <h6 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menghapus user ini ?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="<?= base_url('settinguser/hapus'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <div class="card-body">
                                                            <input name="kode" class="form-control" type="hidden" value="<?= $pr['us_id']; ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo base_url('settinguser/tambah'); ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP/NIK</label>
                                <input name="nip" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input name="pass" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Perangkat Daerah</label>
                                <select class="form-control" name="pd" required>
                                    <option value="">Pilih</option>
                                    <?php foreach ($pd as $p) : ?>
                                        <option value="<?= $p['kode_pd']; ?>"><?= $p['nama_pd']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No HP WA</label>
                                <input name="hp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Akses</label>
                                <select class="form-control" name="role" required>
                                    <option value="">Pilih</option>
                                    <?php foreach ($role as $r) : ?>
                                        <option value="<?= $r['kode_role']; ?>"><?= $r['nama_role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Aktif</label>
                                <select class="form-control" name="aktif" required>
                                    <option value="">Pilih</option>
                                    <option value="Y">Aktif</option>
                                    <option value="T">Tidak</option>
                                </select>
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