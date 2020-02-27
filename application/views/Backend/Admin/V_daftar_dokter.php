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
<link href="<?php echo base_url()?>assets/backend/plugins/morrisjs/morris.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="<?php echo base_url()?>assets/backend/css/main.css" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url()?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<?php 
    foreach($data_akun as $p) :
        $id = $p['id_admin'];
        $nama_admin = $p['nama_admin'];
    endforeach;
?>

<section class="content home">
    <div class="container-fluid">
        <!-- Isi Konten -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Daftar Dokter di <?php echo $nama_admin; ?> </h2><br>
                        <a href="<?php echo site_url('Admin/Dokter/Tambah_dokter');?>">
                            <button type="button" class="btn btn-raised btn-info waves-effect"><i class="zmdi zmdi-account-add" style="color: black;"></i> Tambah Dokter</button>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Lengkap</th>
                                <th style="text-align: center;">Tanggal Lahir</th>
                                <th style="text-align: center;">Jenis Kelamin</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Nomor Kontak</th>
                                <th style="text-align: center;" colspan="2">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($data_dokter as $p) :
                                        $id = $p['id_dokter'];
                                        $nama = $p['nama_dokter'];
                                        $tgl_lahir = $p['tgl_lahir'];
                                        $jenis_kelamin = $p['jenis_kelamin'];
                                        $alamat = $p['alamat'];
                                        $no_telp = $p['no_telp']; 
                                ?>
                                <tr>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $no; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $nama; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $tgl_lahir; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $jenis_kelamin; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $alamat; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $no_telp; ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo site_url('Admin/Dokter/Edit_dokter/'.$p['id_dokter']);?>">
                                            
                                            <button type="button" class="btn btn-raised btn-info waves-effect"><i class="fa fa-pencil" style="color: black;"></i></button>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a data-toggle="modal" data-target="#ModalHapus<?php echo $p['id_dokter'];?>">
                                            
                                            <button type="button" class="btn btn-raised btn-danger waves-effect"><i class="fa fa-trash" style="color: black;"></i></button>
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

        <!-- Modal Delete Dokter -->
        <?php 
        foreach($data_dokter as $k) :
            $id     = $k['id_dokter'];
            $nama   = $k['nama_dokter'];
        ?>
        <!--Modal Hapus Karyawan-->
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Dokter</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('Admin/Dokter/Delete_dokter');?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_dokter" value="<?php echo $id;?>"/>
                            <p>Apakah kamu yakin mau menghapus <b>dr. <?php echo $nama; ?></b> dari daftar?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn  btn-raised btn-danger waves-effect" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- End Modal Delete Dokter -->

    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="<?php echo base_url()?>assets/backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="<?php echo base_url()?>assets/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="<?php echo base_url()?>assets/backend/js/pages/index.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/pages/charts/sparkline.min.js"></script>
</body>
</html>