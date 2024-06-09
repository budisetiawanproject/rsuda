<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php foreach ($slide as $sl) :  ?>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?= base_url('img/upload_gambar/') . $sl['gambar']; ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <a style="text-decoration:none;" class="h6 m-0 text-white text-uppercase font-weight-bold"><?= $sl['judul']; ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-4 px-0">
            <div class="row mx-0">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h6 class="m-0 text-uppercase font-weight-bold">Produk Hukum Terpopuler</h6>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <MARQUEE align="center" direction="up" height="408" scrollamount="2">
                            <?php foreach ($download as $br) : ?>
                                <div class="d-flex align-items-center bg-white mb-1">
                                    <div class="w-100 h-100 px-3 d-flex flex-column  border border-left-0">
                                        <div class="mb-0">
                                            <a class="btn-danger badge  text-uppercase font-weight-semi-bold p-2 mr-2"><small><?= $br['download']; ?> Kali Download</small></a>

                                        </div>
                                        <a style="color: black; text-decoration:none;" class="text-uppercase font-weight-semi-bold" href=""><small><?= $br['judul']; ?></small></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </MARQUEE>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Breaking News Start -->
<div class="container-fluid bg-dark py-3 mb-0">
    <div class="container">
    </div>
</div>
<!-- Breaking News End -->
<hr>

<!-- Featured News Slider Start -->
<div class="container-fluid pt-1 mb-3">
    <div class="container">
        <div class="section-title">
            <h5 class="m-0 text-uppercase font-weight-bold">Destinasi Wisata</h5>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            <?php foreach ($wisata as $ws) : ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="<?= base_url('img/upload_destinasi_wisata/') . $ws['gambar']; ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?= $ws['judul']; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Featured News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-0">
                            <h5 class="m-0 text-uppercase font-weight-bold">PENCARIAN PRODUK HUKUM</h5>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <label>Silahkan Masukan Kata Kunci dan juga Jenis Produk Hukum yang Anda Cari</label>
                            <div class="row">
                                <form class="col-12" method="POST" action="<?php echo base_url('pencarian'); ?>">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <input name="kode" value="<?= html_escape($kode) ?>" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-0">
                            <h5 class="m-0 text-uppercase font-weight-bold"><?= $jns['jenis_peraturan'] ?></h5>
                        </div>
                        
                        <div class="bg-white border border-top-0 p-3">
                            <div class="container">
                                <div class="row">
                                <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jenis</th>
                                        <th>Nomor</th>
                                        <th>Tahun</th>
                                        <th>Ket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($peraturan as $pr) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><small><a style="color: red; text-decoration:none;" href="<?= base_url('detailproduk/produk/' . $this->secure->encrypt_url($pr['id_peraturan'])); ?>"><?= $pr['judul']; ?></a></small></td>
                                            <td><?= $pr['singkatan']; ?></td>
                                            <td><?= $pr['nomor']; ?></td>
                                            <td><?= $pr['tahun_peraturan']; ?></td>
                                            <td><?= $pr['berlaku']; ?></td>
                                            <td><a href="<?= base_url('/index/download/' . $this->secure->encrypt_url($pr['id_peraturan'])); ?>" class="btn btn-sm btn-danger m-1"><i class="fa fa-download"></i></a><a style="color: black;"><?= $pr['download']; ?></a></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>

                                </tbody>
                            </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>