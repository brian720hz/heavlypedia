<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>"> 
<meta name="keywords" content="<?php echo $keywords ?>">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Dropzone Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/dropzone/dropzone.css" rel="stylesheet">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<!-- Wait Me Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/waitme/waitMe.css" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="<?php echo base_url()?>assets/backend/css/main.css" rel="stylesheet">
<!-- Custom Css -->

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url()?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
<!-- page loader -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_page_loader') ?>
<!-- end page loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- header -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_header') ?>
<!-- end header -->

<!-- left sidebar -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_left_sidebar') ?>
<!-- end left sidebar -->

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Tambah Data Dokter</h2>
                    </div>
                    <div class="body">
                    <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <form method="POST" action="<?php echo site_url('Admin/Dokter/Tambah_data_dokter')?>" onsubmit="return Validate()" id="addForm">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="nama_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Lengkap</strong></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
                                        <span id="nama_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="tgl_lahir_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Tanggal Lahir</strong></label>
                                        <input type="text" name="tgl_lahir" class="datepicker form-control" placeholder="Masukan Tanggal Lahir">
                                        <span id="tgl_lahir_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group drop-custum">
                                    <label style="color: black;"><strong>Jenis Kelamin</strong></label>
                                    <select name="jenis_kelamin" class="form-control show-tick">
                                        <option value="Laki-laki" selected>Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="alamat_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Alamat</strong></label><br>
                                            <textarea rows="7" cols="80" name="alamat" placeholder="Masukan Alamat"></textarea>
                                        <span id="alamat_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="no_telp_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nomor Kontak</strong></label>
                                        <input type="text" name="no_telp" class="form-control" placeholder="Masukan Nomor Kontak">
                                        <span id="no_telp_error"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                        <h3>Drop files here or click to upload.</h3>
                                        <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> </div>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div> -->
                            
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                            </div>
                        </div>
                        
                    </form>
                    </div>                
                </div>
            </div>
        </div>

    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 


<script src="<?php echo base_url()?>assets/backend/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

<script src="<?php echo base_url()?>assets/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="<?php echo base_url()?>assets/backend/js/pages/forms/basic-form-elements.js"></script>

<script type="text/javascript">
    // validation function
    function Validate() {
       // SELECTING ALL TEXT ELEMENTS
        var nama = $('#addForm' + ' input[name=nama]');
        var tgl_lahir = $('#addForm' + ' input[name=tgl_lahir]');
        var alamat = $('#addForm' + ' textarea[name=alamat]');
        var no_telp = $('#addForm' + ' input[name=no_telp]');

        var nama_div = $('#addForm' + ' #nama_div');
        var tgl_lahir_div = $('#addForm' + ' #tgl_lahir_div');
        var alamat_div = $('#addForm' + ' #alamat_div');
        var no_telp_div = $('#addForm' + ' #no_telp_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var nama_error = $('#addForm' + ' #nama_error');
        var tgl_lahir_error = $('#addForm' + ' #tgl_lahir_error');
        var alamat_error = $('#addForm' + ' #alamat_error');
        var no_telp_error = $('#addForm' + ' #no_telp_error');

        // RESET
        nama.css('border', "1px solid #ccc");
        nama_div.css('color', "#555");

        tgl_lahir.css('border', "1px solid #ccc");
        tgl_lahir_div.css('color', "#555");

        alamat.css('border', "1px solid #ccc");
        alamat_div.css('color', "#555");

        no_telp.css('border', "1px solid #ccc");
        no_telp_div.css('color', "#555");

        nama_error.html("");
        tgl_lahir_error.html("");
        alamat_error.html("");
        no_telp_error.html("");

      // validate username

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, .])*$/;
        var status = true;

        if (nama.val() == "") {
            nama.css('border', "1px solid red");
            nama_div.css('color', "red");
            nama_error.html("Nama Tidak Boleh Kosong");
            nama.focus();
            status = false;
        }
        else if (!(nama.val().match(letters))) {
            nama.css('border', "1px solid red");
            nama_div.css('color', "red");
            nama_error.html("Nama Hanya Boleh Huruf");
            nama.focus();
            status = false;
        }
        else{
            nama_error.val("");
        }

        if (tgl_lahir.val() == "") {
            tgl_lahir.css('border', "1px solid red");
            tgl_lahir_div.css('color', "red");
            tgl_lahir_error.html("Tanggal Lahir Tidak Boleh Kosong");
            tgl_lahir.focus();
            status = false;
        }
        else{
            tgl_lahir_error.val("");
        }

        if (alamat.val() == "") {
            alamat.css('border', "1px solid red");
            alamat_div.css('color', "red");
            alamat_error.html("Alamat Tidak Boleh Kosong");
            alamat.focus();
            status = false;
        }
        else{
            alamat_error.val("");
        }

        if (no_telp.val() == "") {
            no_telp.css('border', "1px solid red");
            no_telp_div.css('color', "red");
            no_telp_error.html("Nomor Kontak Tidak Boleh Kosong");
            no_telp.focus();
            status = false;
        }
        else if (isNaN(no_telp.val())) {
            no_telp.css('border', "1px solid red");
            no_telp_div.css('color', "red");
            no_telp_error.html("Nomor Kontak Harus Angka");
            no_telp.focus();
            status = false;
        }
        else{
            no_telp_error.val("");
        }

      return status;
    }
</script> 


</body>
</html>