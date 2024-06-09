<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('./assets/img/logo.png'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/css/style.css">
    <title>RSUD AMURANG</title>
</head>
<?php
// init variables
$min_number = 1;
$max_number = 15;

// generating random numbers
$random_number1 = mt_rand($min_number, $max_number);
$random_number2 = mt_rand($min_number, $max_number);
?>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="<?= base_url() ?>/assets/login/images/undraw_web_devices_re_m8sc.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4" style="text-align: center;">
                                <a style="text-decoration:none" href="<?= base_url('index') ?>">
                                    <h3 style="color: red;">RSUD <strong>AMURANG</strong></h3>
                                </a>
                                <h6>Rumah Sakit Umum Daerah Amurang</h6>
                                <h6>Hebat Dan Terdepan</h6>
                                <p class="mb-4">Login User</p>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="POST" action="<?= base_url('auth/cb'); ?>" class="signin-form">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <div class="form-group first">
                                    <label for="username">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="text" maxlength="16" name="username" class="form-control" id="username">

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="pass" class="form-control" id="password">

                                </div>
                                <h3 style="text-align: center;"><?= $random_number1 . ' + ' . $random_number2 . ' = '; ?>
                                </h3>
                                <div class="form-group last mb-4">
                                    <label for="password">Jawaban</label>
                                    <input class="form-control form-control-user" name="captchaResult" type="text" maxlength="3" size="2" required />
                                </div>

                                <input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
                                <input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />

                                <input type="submit" value="Log In" id="btnLogin" class="btn text-white btn-block btn-danger">
                            </form>
                            <hr>
                            <div class="mb-4" style="text-align: center;">
                                <a style="text-decoration:none; color: black;" href="#">Lupa Password ?</a>
                                <hr>
                                <a style="text-decoration:none; color: black;" href="<?= base_url('auth/register') ?>">Daftar Akun !!</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>/assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/login/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/login/js/main.js"></script>

</body>


</html>