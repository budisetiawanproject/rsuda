<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-danger card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php if ($user['foto'] == '') { ?><?= base_url() ?>assets/foto/avatar5.png <?php } else { ?> <?= base_url() ?>assets/foto/<?= $user['foto']; ?> <?php } ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

                            <p class="text-muted text-center"><?= $user['nip_nik']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Akun</b> <a class="float-right"> <span class="right badge badge-success"><?= $user['nama_role']; ?></span></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right"><span class="right badge badge-success"><?php if ($user['aktif'] == 'Y') {
                                                                                                                        echo 'Aktif';
                                                                                                                    } else {
                                                                                                                        echo 'Tidak Aktif';
                                                                                                                    } ?></span></a>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#foto">
                                Rubah Foto
                            </button>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                <div class="modal fade" id="foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rubah Foto Profil</h5>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="<?= base_url('profil/foto'); ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php if ($user['foto'] == '') { ?><?= base_url() ?>assets/foto/avatar5.png <?php } else { ?> <?= base_url() ?>assets/foto/<?= $user['foto']; ?> <?php } ?>" alt="User profile picture">
                                        <hr>
                                        <label>Ambil File Foto</label>
                                        <br>
                                        <input type="file" name="foto">
                                        <input type="hidden" name="kode" value="<?= $code; ?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pass" data-toggle="tab">Rubah Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="form-horizontal">

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $user['nama']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">NIP/NIK</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $user['nip_nik']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">User Name</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $user['username']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Unit Kerja</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $profil['nama_pd']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">No HP</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $user['no_hp']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <label for="inputName" class="col-form-label"><?= $user['email']; ?></label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="<?php echo base_url('profil/edit'); ?>" method="post">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                        <input type="hidden" name="id" class="form-control" id="inputName" placeholder="Nama" value="<?= $code; ?>" required>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama" value="<?= $user['nama']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">NIP/NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nip" class="form-control" id="inputEmail" placeholder="NIP/NIK" value="<?= $user['nip_nik']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="inputName2" placeholder="Username" value="<?= $user['username']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">No HP WA</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="hp" class="form-control" id="inputName2" placeholder="No. HP WA" value="<?= $user['no_hp']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="email" class="form-control" id="inputName2" placeholder="Email" value="<?= $user['email']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="pass">
                                    <form class="form-horizontal" action="<?php echo base_url('profil/ps'); ?>" method="post">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                        <input type="hidden" name="id" class="form-control" id="inputName" placeholder="Nama" value="<?= $code; ?>" required>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama" value="<?= $user['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">NIP/NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nip" class="form-control" id="inputEmail" placeholder="NIP/NIK" value="<?= $user['nip_nik']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="pass" class="form-control" id="inputName2" placeholder="Password Baru" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
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