<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RSUD AMURANG</title>
    <link rel="icon" href="<?= base_url('./assets/img/logo.png'); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <script src="<?= base_url() ?>assets/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var url = "<?php echo site_url('wilayah/add_ajax_kab'); ?>/" + $(this).val();
                $('#kabupaten').load(url);
                return false;
            })

            $("#kabupaten").change(function() {
                var url = "<?php echo site_url('wilayah/add_ajax_kec'); ?>/" + $(this).val();
                $('#kecamatan').load(url);
                return false;
            })

            $("#kecamatan").change(function() {
                var url = "<?php echo site_url('wilayah/add_ajax_des'); ?>/" + $(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#ambilunit").change(function() {
                var url = "<?php echo site_url('pasien/add_ajax_dok'); ?>/" + $(this).val();
                $('#ambildokter').load(url);
                return false;
            })
        });
    </script>

</head>