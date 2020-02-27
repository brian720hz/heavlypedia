<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>"> 
<meta name="keywords" content="<?php echo $keywords ?>">

<link rel="icon" href="<?php echo base_url()?>assets/backend/images/favicon.ico" type="image/x-icon">
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
    <?php $this->load->view('Backend/User/Pelengkap/V_page_loader') ?>
<!-- end page loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- header -->
    <?php $this->load->view('Backend/User/Pelengkap/V_header') ?>
<!-- end header -->

<!-- left sidebar -->
    <?php $this->load->view('Backend/User/Pelengkap/V_left_sidebar') ?>
<!-- end left sidebar -->

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Booking </h2>
                    </div>
                    <div class="body">
                    <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <form method="POST" action="<?php echo site_url('Booking/List')?>" onsubmit="return Validate()" id="addForm">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="nama_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Lengkap</strong></label>
                                        <?php 
                                          foreach($data_akun as $p) :
                                            $id = $p['id_pasien'];
                                            $nama = $p['nama_pasien'];
                                        ?>
                                        <input type="hidden" name="id_pasien" value="<?php echo $id; ?>">
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" value="<?php echo $nama; ?>">
                                        <?php endforeach; ?>
                                        <span id="nama_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="tgl_booking_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Tanggal Booking</strong></label>
                                        <input type="text" name="tgl_booking" class="datepicker form-control" placeholder="Masukan Tanggal Booking">
                                        <span id="tgl_booking_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="jam_booking_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Jam Booking</strong></label>
                                        <input type="time" name="jam_booking" class="timepicker form-control" placeholder="Masukan Jam Booking">
                                        <span id="jam_booking_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Poli</strong></label>
                                        <select name="poli" class="form-control show-tick">
                                            <?php  
                                                foreach($data_poli as $p) :
                                                    $nama = $p['nama_poli'];
                                            ?>
                                            <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="latitude" id="latitude" class="form-control">
                            <input type="hidden" name="longitude" id="longitude" class="form-control">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Location</strong></label>
                                        <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukan Lokasi">
                                    </div>
                                </div>
                            </div>
                            <div id="somecomponent" style="width: 500px; height: 400px;"></div>

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
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyD3sBPmrD_rOrr0xKGRq5xakykzmvx9nsM&libraries=places'></script>
<script src="<?php echo base_url()?>assets/backend/js/locationpicker.jquery.min.js"></script>

<script type="text/javascript">
    $('#somecomponent').locationpicker({
        location: {
            latitude: 0,
            longitude: 0
        },
        radius: 0,
        inputBinding: {
            latitudeInput: $('#latitude'),
            longitudeInput: $('#longitude'),
            locationNameInput: $('#lokasi')
        },
        enableAutocomplete: true
    });
    // validation function
    function Validate() {
       // SELECTING ALL TEXT ELEMENTS
        var nama = $('#addForm' + ' input[name=nama]');
        var tgl_booking = $('#addForm' + ' input[name=tgl_booking]');
        var jam_booking = $('#addForm' + ' input[name=jam_booking]');

        var nama_div = $('#addForm' + ' #nama_div');
        var tgl_booking_div = $('#addForm' + ' #tgl_booking_div');
        var jam_booking_div = $('#addForm' + ' #jam_booking_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var nama_error = $('#addForm' + ' #nama_error');
        var tgl_booking_error = $('#addForm' + ' #tgl_booking_error');
        var jam_booking_error = $('#addForm' + ' #jam_booking_error');

        // RESET
        nama.css('border', "1px solid #ccc");
        nama_div.css('color', "#555");

        tgl_booking.css('border', "1px solid #ccc");
        tgl_booking_div.css('color', "#555");

        jam_booking.css('border', "1px solid #ccc");
        jam_booking_div.css('color', "#555");

        nama_error.html("");
        tgl_booking_error.html("");
        jam_booking_error.html("");

      // validate username

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
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

        if (tgl_booking.val() == "") {
            tgl_booking.css('border', "1px solid red");
            tgl_booking_div.css('color', "red");
            tgl_booking_error.html("Tanggal Booking Tidak Boleh Kosong");
            tgl_booking.focus();
            status = false;
        }
        else{
            tgl_booking_error.val("");
        }

        if (jam_booking.val() == "") {
            jam_booking.css('border', "1px solid red");
            jam_booking_div.css('color', "red");
            jam_booking_error.html("Jam Booking Tidak Boleh Kosong");
            jam_booking.focus();
            status = false;
        }
        else{
            jam_booking_error.val("");
        }

      return status;
    }
</script> 


</body>
</html>