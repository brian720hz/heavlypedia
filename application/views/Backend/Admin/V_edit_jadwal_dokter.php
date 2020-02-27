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
                        <h2>Edit Jadwal Dokter</h2>
                    </div>
                    <div class="body">
                    <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <?php 
                      foreach($data_jadwal as $p) :
                        $id = $p['id_jadwal'];
                        $id_dokter = $p['id_dokter'];
                        $nama = $p['nama_dokter'];
                        $poli = $p['poli'];
                        $hari_praktek = $p['hari_praktek'];
                        $mulai_praktek = $p['mulai_praktek'];
                        $selesai_praktek = $p['selesai_praktek'];
                        $kuota = $p['kuota'];
                    ?>
                    <form method="POST" action="<?php echo site_url('Admin/Dokter/Edit_data_jadwal_dokter')?>" onsubmit="return Validate_edit('<?php echo $id ?>')" id="editForm<?php echo $id ?>">
                        <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $id;?>">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Dokter</strong></label>
                                        <select name="nama" class="form-control show-tick">
                                            <?php 
                                              foreach($data_dokter as $p) :
                                                $nama = $p['nama_dokter'];
                                            ?>
                                            <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Poli</strong></label>
                                        <select name="poli" class="form-control show-tick">
                                            <option value="<?php echo $poli; ?>"><?php echo $poli; ?></option>
                                            <?php 
                                              foreach($data_poli as $p) :
                                                $nama_poli = $p['nama_poli'];
                                            ?>
                                                <option value="<?php echo $nama_poli; ?>"><?php echo $nama_poli; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="mulai_praktek_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Mulai Praktek</strong></label>
                                        <input type="time" name="mulai_praktek" class="timepicker form-control" value="<?php echo $mulai_praktek;?>">
                                        <span id="mulai_praktek_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="selesai_praktek_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Selesai Praktek</strong></label>
                                        <input type="time" class="timepicker form-control" name="selesai_praktek" value="<?php echo $selesai_praktek;?>">
                                        <span id="selesai_praktek_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Hari Praktek</strong></label>
                                        <select name="hari_praktek" class="form-control show-tick">
                                            <option value="<?php echo $hari_praktek;?>" selected><?php echo $hari_praktek;?></option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="kuota_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Kuota</strong></label>
                                        <input type="text" name="kuota" class="form-control" placeholder="Masukan Jumlah Kuota" value="<?php echo $kuota;?>">
                                        <span id="kuota_error"></span>
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
                    <?php endforeach; ?>
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
   function Validate_edit(id) {
       // SELECTING ALL TEXT ELEMENTS
        var mulai_praktek = $('#editForm' + id + ' input[name=mulai_praktek]');
        var selesai_praktek = $('#editForm' + id + ' input[name=selesai_praktek]');
        var kuota = $('#editForm' + id + ' input[name=kuota]');

        var mulai_praktek_div = $('#editForm' + id + ' #mulai_praktek_div');
        var selesai_praktek_div = $('#editForm' + id + ' #selesai_praktek_div');
        var kuota_div = $('#editForm' + id + ' #kuota_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var mulai_praktek_error = $('#editForm' + id  + ' #mulai_praktek_error');
        var selesai_praktek_error = $('#editForm' + id + ' #selesai_praktek_error');
        var kuota_error = $('#editForm' + id + ' #kuota_error');

        // RESET
        mulai_praktek.css('border', "1px solid #ccc");
        mulai_praktek_div.css('color', "#555");

        selesai_praktek.css('border', "1px solid #ccc");
        selesai_praktek_div.css('color', "#555");

        kuota.css('border', "1px solid #ccc");
        kuota_div.css('color', "#555");

        poli_error.html("");
        mulai_praktek_error.html("");
        selesai_praktek_error.html("");
        kuota_error.html("");

      // validate username

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
        var status = true;

        if (mulai_praktek.val() == "") {
            mulai_praktek.css('border', "1px solid red");
            mulai_praktek_div.css('color', "red");
            mulai_praktek_error.html("Jam Mulai Praktek Tidak Boleh Kosong");
            mulai_praktek.focus();
            status = false;
        }
        else{
            mulai_praktek_error.val("");
        }

        if (selesai_praktek.val() == "") {
            selesai_praktek.css('border', "1px solid red");
            selesai_praktek_div.css('color', "red");
            selesai_praktek_error.html("Jam Selesai Praktek Boleh Kosong");
            selesai_praktek.focus();
            status = false;
        }
        else{
            selesai_praktek_error.val("");
        }

        if (kuota.val() == "") {
            kuota.css('border', "1px solid red");
            kuota_div.css('color', "red");
            kuota_error.html("Jumlah Kuota Tidak Boleh Kosong");
            kuota.focus();
            status = false;
        }
        else if (isNaN(kuota.val())) {
            kuota.css('border', "1px solid red");
            kuota_div.css('color', "red");
            kuota_error.html("Jumlah Kuota Harus Angka");
            kuota.focus();
            status = false;
        }
        else{
            kuota_error.val("");
        }

      return status;
    }
</script>
</body>
</html>