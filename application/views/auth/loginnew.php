<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>RSUD AMURANG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/assets/images/logo.png">
    <!-- Layout config Js -->
    <script src="<?= base_url() ?>/assets/assets/js/layout.js"></script>
    <!-- Icons CSS -->

    <!-- StarCode CSS -->


    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets/css/starcode2.css">
</head>

<body class="flex items-center justify-center min-h-screen py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">

    <div class="mb-0 border-none lg:w-[500px] card bg-white/70 shadow-none dark:bg-zink-500/70">
        <div class="!px-10 !py-12 card-body">
            <a href="index-1.html">
                <img src="<?= base_url() ?>/assets/assets/images/logo.png" alt="" class="block h-24 mx-auto dark:hidden">
            </a>

            <div class="mt-8 text-center">
                <h4 class="mb-2 text-red-500 dark:text-red-500">RSUD AMURANG</h4>
                <p class="text-slate-500 dark:text-zink-200">Rumah Sakit Umum Daerah Amurang<br>
                    Hebat Dan Terdepan</p>
            </div>

            <?= $this->session->flashdata('message'); ?>

            <form method="POST" action="<?= base_url('auth/cbnew'); ?>" class="mt-10">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="hidden px-4 py-3 mb-3 text-sm text-green-500 border border-green-200 rounded-md bg-green-50 dark:bg-green-400/20 dark:border-green-500/50" id="successAlert">
                    You have <b>successfully</b> signed in.
                </div>
                <div class="mb-3">
                    <label for="username" class="inline-block mb-2 text-base font-medium">NIK (Nomor Induk Kependudukan)</label>
                    <input type="text" name="username" id="username" class="form-input dark:bg-zink-600/50 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Masukkan NIK" maxlength="16" required>
                    <div id="username-error" class="hidden mt-1 text-sm text-red-500">Silahkan Masukkan Username NIK</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                    <input type="password" name="pass" id="pass" class="form-input dark:bg-zink-600/50 border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Masukkan Password Anda" required>
                    <div id="password-error" class="hidden mt-1 text-sm text-red-500">Silahkan Masukkan Password Anda</div>
                </div>
                <div class="mt-10">
                    <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign In</button>
                </div>



                <div class="mt-10 text-center">
                    <p class="mb-0 text-slate-500 dark:text-zink-200">Belum Memiliki Akun ? <a href="<?= base_url('auth/daftar') ?>" class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500"> SignUp</a> </p>
                </div>
            </form>
        </div>
    </div>

    <script src='<?= base_url() ?>/assets/assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script src="<?= base_url() ?>/assets/assets/libs/%40popperjs/core/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/libs/prismjs/prism.js"></script>
    <script src="<?= base_url() ?>/assets/assets/libs/lucide/umd/lucide.js"></script>
    <script src="<?= base_url() ?>/assets/assets/js/starcode.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/assets/js/pages/auth-login.init.js"></script>

</body>

</html>