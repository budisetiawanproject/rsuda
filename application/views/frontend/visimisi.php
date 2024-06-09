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
                            <h5 class="m-0 text-uppercase font-weight-bold">Visi dan Misi</h5>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="container">
                                <div class="table-responsive" style="color: black; text-align: center;">
                                    <h3>Visi</h3>
                                    <p>Terwujudnya Bitung Kota Digital yang<br>
                                        Mandiri, Sejahtera dan Berkarakter<br>
                                        berlandaskan Gotong royong</p>
                                    <p>Penjelasan visi tersebut didasarkan pada 5 (lima) kata kunci yang yaitu:<br><br>
                                        <b>1. Digital:</b><br><br>
                                        Saat ini kita berada di era digital. Sebuah periode yang ditandai oleh dominasi teknologi informasi dan komunikasi (TIK) internet. Sebagaimana telah dipahami bahwa digital adalah kata serapan dari bahasa asing yang dapat kita lihat asal katanya yaitu digit dan imbuhan al. Dengan imbuhan al menjadikan digital sebagai kata sifat yang bermakna bersifat digit.<br><br>
                                        Kata digital sudah resmi menjadi bahasa Indonesia. Digital dapat berupa kata sifat atau kata benda. Sebagai kata sifat, digital berarti bilangan dan angka, sedangkan sebagai kata benda, digital berarti alat atau hasil produk. Menurut kamus besar bahasa Indonesia (KBBI) Digital berhubungan dengan angka-angka untuk sistem perhitungan tertentu; berhubungan dengan penomoran. Pada perkembangannya kata digital merujuk pada pekembangan teknologi komunikasi dan informasi, yaitu bagaimana bidang tersebut menggunakan teknologi digital baik dalam proses pengemasan informasi, transmisi data maupun penerimaannya. <br><br>
                                        Sesuai dengan harapan Walikota dan Wakil Walikota Bitung bahwa dalam menjawab ketidakpastian, ketidakadilan dan diskriminasi, maka perlu digitalisasi daerah. Dalam artian bahwa dengan digitalisasi maka ketidakpastian, ketidakadilan dan diskriminasi dapat dihilangkan. Ketidakpastian, ketidakadilan, dan publik. Untuk itu maka pelayanan publik hendaknya dilakukan secara digital. Hal inilah yang dimaksudkan dengan digitalisasi, dengan maksud bahwa tentunya sistim pemerintahan harus berbasis elektronik (SPBE).<br><br>
                                        Untuk mencapai tujuan SPBE atau e-Gov, maka pemerintah daerah harus membangun sistem kota cerdas (smart city), atau kota digital. Untuk mewujudkan konsep kota cerdas (smart city) dan/atau kota digital(digital city), pemerintah daerah perlu menyiapkan berbagai kebutuhan, mulai dari infrastruktur digital, sumber daya manusia, hingga sistem digital. Bagi Kota Bitung, dalam pemerintahan yang baru ini, penerapan SPBE atau e-Gov akan semakin dipacu agar mampu meningkatkan kesejahteraan masyarakat. Namun tidak sekedar SPBE dan kota cerdas melainkan mencoba untuk melakukan lompatan dengan program kota digital yang cakupannya lebih luas dibandingkan dengan kota cerdas. Sebab, kota digital menuntut peran aktif semua
                                        pihak dan menuntut penggunaan aplikasi digital secara full dalam semua aspek kehidupan kota dan terutama pada layanan publik.<br><br>
                                        <b>2. Mandiri:</b><br><br>
                                        Dimaknai sebagai masyarakat yang dapat mengatasi permasalahannya dan tantangan yang ditandai dengan tingkat partisipasi pendidikan, derajat kesehatan dan jiwa sosial yang baik, tingkat perekonomian yang baik, serta angka harapan hidup tinggi. Dimaknai juga sebagai kemudahan masyarakat untuk mengakses sumber – sumber kegiatan social ekonomi untuk kehidupan yang layak yang diukur melalui penyelenggaraan kehidupan masyarakat Kota Bitung yang sejajar dan sederajat, serta adanya kemampuan untuk memenuhi sendiri kebutuhan pokok serta kemampuan meningkatkan kualitas pelayanan masyarakat yang lebih baik.<br><br>
                                        <b>3. Sejahtera:</b><br><br>
                                        Dimaknai sebagai kondisi masyarakat yang relatif terpenuhi kebutuhan hidupnya secara layak dan berkeadilan sesuai dengan perannya dalam kehidupan. Peningkatan kesejahteraan masyarakat dilihat dengan menggunakan indikator Pertumbuhan Ekonomi, Pengangguran, Penduduk Miskin, Indeks Pembangunan Manusia (IPM), serta kemampuan beradaptasi dengan kebiasaan baru pasca pandemic Covid-19.<br><br>
                                        <b>4. Berkarakter:</b><br><br>
                                        Berkarakter berasal dari kata dasar karakter. Berkarakter memiliki arti dalam kelas verba atau kata kerja sehingga berkarakter dapat menyatakan suatu tindakan, keberadaan, pengalaman, atau pengertian dinamis lainnya. Untuk itu berkarakter dalam pengeritan ini dimaknai sebagai
                                        kondisi masyarakat kota Bitung yang mempunyai ciri khas berkepribadian, berperilaku, bersifat, bertabiat, dan berwatak” yang akan selalu nampak dalam sikap dan perilaku keseharian, sebagai suatu ciri khas masyarakat kota Bitung.<br><br>
                                        <b>5. Gotong Royong:</b><br><br>
                                        Memiliki makna semangat gotong sebagai budaya masyarakat sulawesi utara yang saling tolong menolong, saling peduli terhadap yang lain. Semangat gotong royong inilah yang terus dipelihara sebagai salah satu modal dalam pembangunan.<br><br>
                                    <h3>Misi</h3>
                                    Perwujudan atas Visi serta penjelasannya tersebut diatas kemudian dirumuskan orientasi pembangunan daerah yang termuat dalam RPJMD Kota Bitung Tahun 2021-2026 kedalam rumusanrumusan Misi untuk memberikan kerangka bagi tujuan dan sasaran serta strategi dan kebijakan yang ingin dicapai dan menentukan program yang akan dilaksanakan untuk mencapai Visi.<br><br>
                                    Untuk mempertegas perwujudan Visi pembangunan tersebut maka rumusan Misi Pembangunan Kota Bitung Tahun 2021-2026 ditetapkan sebagai berikut:<br><br>
                                    <b>Misi 1 : </b><br><br>
                                    Mewujudkan Kota Bitung yang hidup rukun, harmonis, aman, nyaman dan damai dalam perbedaan. Upaya yang terkandung dalam misi pertama ini adalah meningkatkan kerukunan dan toleransi kehidupan masyarakat yang ada di Kota Bitung yang menjunjung tinggi nilai persatuan dan keberagaman serta kegotongroyongan sehinga kehidupan yang harmonis, aman, nyaman dan damai ditengah perbedaan tetap dapat terjaga dan di tingkatkan<br><br>
                                    <b>Misi 2 : </b><br><br>
                                    Mewujudkan kesejahteraan masyarakat melalui pemenuhan kebutuhan pelayanan dasar yang berkualitas. Upaya yang terkandung dalam misi kedua yaitu memfokuskan pada upaya peningkatan Kesejahteraan masyarakat yang diukur melalui Indeks Pembangunan Manusia melalui variabel pembentuknya yang meliputi luasnya jangkauan akses pelayanan dasar bidang pendidikan, kesehatan dan layanan publik lainnya yang berkualitas.<br><br>
                                    <b>Misi 3 : </b><br><br>
                                    Mewujudkan pertumbuhan ekonomi melalui iklim usaha yang ramah investasi didukung oleh infrastruktur dan suprastruktur sosial ekonomi yang berkualitas. Upaya yang terkandung dalam misi ke tiga adalah memfokuskan pada peningkatan iklim usaha dan investasi melalui penerbitan regulasi yang mendukung kemudahan investasi, dan ketersediaan infrastruktur perkotaan pada kawasan-kawasan tertentu yang dapat mendorong peningkatan perekonomian daerah dan kesejahteraan masyarakat serta dapat meningkatkan daya tarik kota.<br><br>
                                    <b>Misi 4 : </b><br><br>
                                    Menciptakan pemerintahan bersih, efektif,efisien dan hebat Difokuskan pada Pemerintahan yang dibentuk berlandaskan prinsip “Good Governance” dan “Clean Government” tercermin melalui kinerja aparatur pemerintah yang professional dalam melayani kebutuhan masyarakat yang semakin variatif, serta meningkatnya akuntabilitas dalam pengelolaan penyelenggaraan pemerintahan dan keuangan daerah.<br><br>
                                    Dalam mengimplementasikan Visi Misi dimaksud maka harus dibarengi nilai-nilai yang menjiwainya yang dilakukan oleh setiap Perangkat Daerah, sebab Visi, Misi dan nilai merupakan suatu hal yang tidak dapat dipisahkan. Untuk itu nilai yang terkandung adalah “mempertahankan, integritas, menghormati perbedaan dalam masyarakat, mengejar keunggulan, mendorong kerja sama, menggalakan inovasi dan saling menghormati satu dengan yang lain”. -btg
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>