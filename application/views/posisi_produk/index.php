<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posisi Produk Hukum</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuanproduk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Posisi Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <?php if ($session == '7') { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tgl Surat</th>
                                            <th>Perangkat Daerah</th>
                                            <th>Judul Produk</th>
                                            <th>Status</th>
                                            <th>Posisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usul as $pr) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pr['no_surat']; ?></td>
                                                <td><?= $pr['tgl_surat']; ?></td>
                                                <td><?= $pr['nama_pd']; ?></td>
                                                <td><?= $pr['judul_produk']; ?></td>
                                                <td><a target="blank" href="<?= base_url('timeline/detail/' . $this->secure->encrypt_url($pr['pengajuan_id'])) ?>" class="d-block"><?php if($pr['status']=='Disposisi'){ ?><span class="right badge badge-warning"><?= $pr['status']; ?></span><?php } if($pr['status']=='Selesai'){ ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } if($pr['status']=='Terkirim'){ ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php } if($pr['status']=='Proses'){ ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php } if($pr['status']=='Paraf'){ ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php } if($pr['status']=='Tanda Tangan'){ ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } if($pr['status']=='Paraf'){ ?><span class="right badge badge-primary"><?= $pr['status']; ?></span><?php } if($pr['status']=='Terbit'){ ?><span class="right badge badge-success"><?= $pr['status']; ?></span><?php } ?></a></td>
                                                <td><?= $pr['posisi_produk']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target=".bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            


                                            <div class="modal fade bd-example-modal-lg-<?= $pr['pengajuan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Posisi Paraf Produk</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="POST" action="<?= base_url('posisiproduk/simpan'); ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <input type="hidden" name="kode" class="form-control" type="hidden" value="<?= $pr['pengajuan_id']; ?>">
                                                        <input type="hidden" name="iduser" class="form-control" type="hidden" value="<?= $dec; ?>">
                                                        <input type="hidden" name="namauser" class="form-control" type="hidden" value="<?= $user['nama']; ?>">
                                                        <input type="hidden" name="role" class="form-control" type="hidden" value="7">    
                                                            <label>Judul Produk</label>
                                                            <textarea readonly class="form-control"><?= $pr['judul_produk']; ?></textarea>
                                                            <label>Posisi Terakhir</label>
                                                            <input type="text" class="form-control" value="<?= $pr['posisi_produk']; ?>" readonly>
                                                            <label>Posisi Produk</label>
                                                            <select name="paraf" class="form-control" required>
                                                                <option value="">Pilih Pejabat</option>
                                                                <?php foreach($paraf as $p) : ?>
                                                                <option value="<?= $p['kode_paraf'] ?>"><?= $p['jabatan'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $no++;
                                        endforeach; ?>

                                    </tbody>
                                </table>
                                </table>
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



        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">Pengajuan Produk Hukum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('usulproduk/tambah'); ?>">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <input type="hidden" name="kode" class="form-control" value="<?= $user['user_id']; ?>"></input>
                            <input type="hidden" name="pd" class="form-control" value="<?= $user['skpd']; ?>"></input>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No. Surat Pengantar</label>
                                            <input name="no" class="form-control"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Surat Pengantar</label>
                                            <input type="date" name="tgl" class="form-control" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Upload Surat Pengantar ( pdf )</label>
                                            <input type="file" name="up" class="form-control" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Peraturan</label>
                                            <select name="jns" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <?php foreach ($jns as $j) : ?>
                                                    <option value="<?= $j['jns_peraturan']; ?>"><?= $j['jns_peraturan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Produk</label>
                                            <textarea name="judul" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lampiran ( pdf,doc,docx )</label>
                                            <input type="file" name="L1" class="form-control mb-2" required>
                                            <input type="file" name="L2" class="form-control mb-2">
                                            <input type="file" name="L3" class="form-control mb-2">
                                            <input type="file" name="L4" class="form-control mb-2">
                                            <input type="file" name="L5" class="form-control mb-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body pad">
                                        <label for="exampleInputEmail1">Abstraksi Tentang Produk yang di Ajukan (Wajib diisi)</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="isi" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
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