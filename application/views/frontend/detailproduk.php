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
                            <h5 class="m-0 text-uppercase font-weight-bold"><?= $produk['judul']; ?></h5>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><small style="color: black;">Tipe Dokumen</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['tipe_dokumen']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Pengarang</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['pengarang']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Nomor</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['nomor']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Jenis Peraturan</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['jenis_peraturan']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Tempat Penetapan</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['tmpt_peraturan']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Tahun</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['tahun_peraturan']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Tanggal</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['tgl_peraturan']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Sumber</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['sumber']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Subjek</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['subjek']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Status</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['status']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Bahasa</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['bahasa']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Lokasi</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['lokasi']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Bidang Hukum</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['bidang_hukum']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Berlaku</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><?= $produk['berlaku']; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small style="color: black;">Download</small></td>
                                                <td><small style="color: black;">:</small></td>
                                                <td><small style="color: black;"><a href="<?= base_url('/index/download/' . $this->secure->encrypt_url($produk['id_peraturan'])); ?>" class="btn btn-sm btn-danger m-1"><i class="fa fa-download"></i></a><a style="color: black;"></a></small></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <iframe src="<?= base_url('../upload_lampiran/') . $produk['lampiran']; ?>" height="600px" class="col-12"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>