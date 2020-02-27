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

<section class="content home">
    <div class="container-fluid">
        <!-- Isi Konten -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Daftar Hasil </h2><br>
                        <a href="<?php echo site_url('Booking');?>">
                            <button type="button" class="btn  btn-raised bg-teal waves-effect"><i class="zmdi zmdi-arrow-left" style="color: white;"></i> Kembali</button>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Dokter</th>
                                <th style="text-align: center;">Nama Rumah Sakit / Klinik</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Nomor Kontak</th>
                                <th style="text-align: center;">Jarak</th>
                                <th style="text-align: center;">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($hasil as $p) :
                                        $id_jadwal = $jadwal[$no-1][0]['id_jadwal'];
                                        $id_admin = $p['id_admin'];
                                        $nama = $p['nama_admin'];
                                        $alamat = $p['alamat'];
                                        $distance = $p['distance'];
                                        $no_telp = $p['no_telp']; 
                                ?>
                                <tr>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $no; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $jadwal[$no-1][0]['nama_dokter'] ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $nama; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $alamat; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $no_telp; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo round($distance); ?> km</td>
                                    <td style="text-align: center;">
                                        <a data-toggle="modal" data-target="#ModalBook<?php echo $id_jadwal;?>">  
                                            <button type="button" class="btn btn-raised btn-info waves-effect">Book Now !</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    $no++;
                                    endforeach;  
                                ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Isi Konten -->
    </div>

    <!-- Modal Konfirmasi Booking Dokter -->
        <?php 
        $no = 1;
        foreach($hasil as $k) :
            $id     = $jadwal[$no-1][0]['id_jadwal'];
            $id_admin = $p['id_admin'];
            $id_dokter     = $jadwal[$no-1][0]['id_dokter'];
            $id_pasien     = $booking['id_pasien'];
            $nama_dokter   = $jadwal[$no-1][0]['nama_dokter'];
            $nama_pasien   = $booking['nama_pasien'];
            $nama_admin   = $p['nama_admin'];
            $tgl_booking   = $booking['tgl_booking'];
            $jam_booking   = $booking['jam_booking'];
            $poli   = $booking['poli'];
        ?>
        <!--Modal Hapus Karyawan-->
        <div class="modal fade" id="ModalBook<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Booking</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('Booking/Booking_now');?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_jadwal" value="<?php echo $id;?>"/>
                            <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>"/>
                            <input type="hidden" name="id_dokter" value="<?php echo $id_dokter;?>"/>
                            <input type="hidden" name="id_pasien" value="<?php echo $id_pasien;?>"/>
                            <input type="hidden" name="nama_dokter" value="<?php echo $nama_dokter;?>"/>
                            <input type="hidden" name="nama_pasien" value="<?php echo $nama_pasien;?>"/>
                            <input type="hidden" name="nama_admin" value="<?php echo $nama_admin;?>"/>
                            <input type="hidden" name="tgl_booking" value="<?php echo $tgl_booking;?>"/>
                            <input type="hidden" name="jam_booking" value="<?php echo $jam_booking;?>"/>
                            <input type="hidden" name="poli" value="<?php echo $poli;?>"/>
                            <p>Apakah kamu yakin ingin booking <?php echo $nama_dokter; ?></b>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn  btn-raised btn-danger waves-effect" id="simpan">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
        $no++;
        endforeach; ?>
        <!-- End Modal Konfirmasi Booking -->

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



</body>
</html>