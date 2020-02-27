<!-- Left Sidebar -->
<?php
    $account = $this->session->userdata("account");
    $pasien = $jum_pasien[0]['count(DISTINCT id_pasien)'];
    $dokter = $jum_dokter[0]['count(DISTINCT id_dokter)'];
    $booking = $jum_booking[0]['count(id_booking)'];
?>
<section> 
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <center>
                <div class="admin-image"> 
                    <img src="<?php echo base_url()?>assets/backend/images/admin/<?= $data_akun[0]['gambar']; ?>" alt=""> </div>
            </center>
            <div class="quick-stats">
                <h5><center><?php echo $account['nama']; ?></center></h5>
                <ul>
                    <li><span><?php echo $pasien; ?><i>Pasien</i></span></li>
                    <li><span><?php echo $dokter; ?><i>Dokter</i></span></li>
                    <li><span><?php echo $booking; ?><i>Booking</i></span></li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="open"><a href="<?php echo site_url('Admin/Home');?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Dokter</span> </a>
                    <ul class="ml-menu">
                        <!-- <li><a href="<?php echo site_url('Admin/Dokter/Tambah_dokter');?>">Tambah Dokter</a></li> -->
                        <li><a href="<?php echo site_url('Admin/Dokter');?>">Daftar Dokter</a></li>
                        <!-- <li><a href="<?php echo site_url('Admin/Dokter/Tambah_jadwal_dokter');?>">Tambah Jadwal Dokter</a></li> -->
                        <li><a href="<?php echo site_url('Admin/Dokter/Jadwal_dokter');?>">Jadwal Dokter</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('Admin/List_booking');?>"><i class="zmdi zmdi-calendar-check"></i><span>List Booking</span></a></li>                
                <li><a href="<?php echo site_url('Admin/Setting');?>"><i class="zmdi zmdi-settings"></i><span>Setting</span></a></li>
                <li><a href="<?php echo site_url('Admin/Login/logout');?>"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>   
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
</section>
<!-- End Left Sidebar --> 