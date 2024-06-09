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
                            <h5 class="m-0 text-uppercase font-weight-bold"><?= $ambil['judul_berita']; ?></h5>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="container">
                            <div class="mb-2">
                                <img class="img-fluid" src="<?= base_url('upload_berita/' . $ambil['gambar_berita']); ?>" style="object-fit: cover; width: 100%;">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">Kegiatan</a>
                                <a class="text-body"><small><?= $ambil['tgl_berita'] ?></small></a>
                                <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $ambil['lihat'] ?></small>
                                </div>
                                <p>
                                <?= $ambil['isi_berita'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-0">
                            <h5 class="m-0 text-uppercase font-weight-bold">BERITA</h5>
                        </div>
                        
                        <div class="bg-white border border-top-0 p-3">
                            <div class="container">
                                <div class="row">
                                    <?php foreach ($berita as $kg) : ?>
                                        <div class="col-lg-6">
                                            <div class="position-relative mb-3">
                                                <img class="img-fluid" src="<?= base_url('upload_berita/' . $kg['gambar_berita']); ?>" style="object-fit: cover; width: 60%; height: 200px;">
                                                <div class="bg-white border border-top-0 p-4">
                                                    <div class="mb-2">
                                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">Kegiatan</a>
                                                        <a class="text-body" href=""><small><?= $kg['tgl_berita'] ?></small></a>
                                                        <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $kg['lihat'] ?></small>
                                                    </div>
                                                    <a class="h6 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?= base_url('view/berita/' . $this->secure->encrypt_url($kg['id_berita'])); ?>" ><?= $kg['judul_berita'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>