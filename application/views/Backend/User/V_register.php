<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo $description ?>"> 
	<meta name="keywords" content="<?php echo $keywords ?>">

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/menu.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/vendors.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/icon_fonts/<?php echo base_url()?>assets/frontend/css/all_icons_min.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/custom.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/dist/datepicker.min.css" rel="stylesheet">

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	<!-- header -->
        <?php $this->load->view('Frontend/V_header') ?>
    <!-- end header -->
	
	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="register">
					<h1>Register to Heavlypedia</h1>
					<div class="row justify-content-center">
						<div class="col-md-5">
							<div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
							<form method="POST" action="<?php echo site_url('Register/register_akun')?>" onsubmit="return Validate()" id="addForm">
								<div class="box_form">
									<div class="form-group" id="username_div">
										<label>Username</label>
										<br><span id="username_result"></span>
										<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
										<span id="username_error"></span>
									</div>
									
									<div class="form-group" id="password_div">
										<label>Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
										<span id="password_result"></span><span id="password_error"></span>
									</div>

									<div class="form-group" id="nama_div">
										<label>Nama Lengkap</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
										<span id="nama_error"></span>
									</div>

									<div class="form-group" id="tgl_lahir_div">
										<label>Tanggal Lahir</label>
										<input type="text"  name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
										<span id="tgl_lahir_error"></span>
									</div>

									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select name="jenis_kelamin" class="form-control">
	                                        <option value="Laki-laki" selected>Laki-laki</option>
	                                        <option value="Perempuan">Perempuan</option>	                                        
	                                    </select>
									</div>

									<div class="form-group" id="alamat_div">
										<label>Alamat</label>
										<textarea rows="4" cols="50" name="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>
										<span id="alamat_error"></span>
									</div>

									<div class="form-group" id="no_telp_div">
										<label>Nomor Kontak</label>
										<input type="text" name="no_telp" class="form-control" placeholder="Masukan Nomor Kontak">
										<span id="no_telp_error"></span>
									</div>

									<div class="form-group" id="email_div">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="Masukan Email">
										<span id="email_error"></span>
									</div>

									<div id="pass-info" class="clearfix"></div>
									<div class="form-group text-center add_top_30">
										<input class="btn_1" id="simpan" type="submit" value="Submit">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /register -->
			</div>
		</div>
	</main>
	<!-- /main -->
	
	<!-- footer -->
        <?php $this->load->view('Frontend/V_footer') ?>
    <!-- end footer -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<!-- <script src="<?php echo base_url()?>assets/frontend/js/jquery-2.2.4.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/common_scripts.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/functions.js"></script>
     
	<!-- SPECIFIC SCRIPTS -->
	<script src="<?php echo base_url()?>assets/frontend/js/pw_strenght.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/dist/datepicker.min.js"></script>

	<!-- Validation -->

	<script>  
		$(document).ready(function(){  
		  $('#username').change(function(){  
		       var username = $('#username').val();  
		       if(username != '')  
		       {  
		            $.ajax({  
		                 url:"<?php echo base_url(); ?>Register/cek_username",  
		                 method:"POST",  
		                 data:{username:username}, 
		                 success:function(data){  
		                      $('#username_result').html(data);  
		                 }  
		            });  
		       }
		  });  
		});  
	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tgl_lahir').datepicker({
				format: 'DD/MM/YYYY'
			});
		})
	    // validation function
	    function Validate() {
	       // SELECTING ALL TEXT ELEMENTS
      		var username = $('#addForm' + ' input[name=username]');
      		var password = $('#addForm' + ' input[name=password]');
			var nama = $('#addForm' + ' input[name=nama]');
			var tgl_lahir = $('#addForm' + ' input[name=tgl_lahir]');
			var alamat = $('#addForm' + ' textarea[name=alamat]');
			var no_telp = $('#addForm' + ' input[name=no_telp]');
			var email = $('#addForm' + ' input[name=email]');

			var username_div = $('#addForm' + ' #username_div');
			var password_div = $('#addForm' + ' #password_div');
			var nama_div = $('#addForm' + ' #nama_div');
			var tgl_lahir_div = $('#addForm' + ' #tgl_lahir_div');
			var alamat_div = $('#addForm' + ' #alamat_div');
			var no_telp_div = $('#addForm' + ' #no_telp_div');
			var email_div = $('#addForm' + ' #email_div');
;
			// SELECTING ALL ERROR DISPLAY ELEMENTS
			var username_error = $('#addForm' + ' #username_error');
			var password_error = $('#addForm' + ' #password_error');
			var nama_error = $('#addForm' + ' #nama_error');
			var tgl_lahir_error = $('#addForm' + ' #tgl_lahir_error');
			var alamat_error = $('#addForm' + ' #alamat_error');
			var no_telp_error = $('#addForm' + ' #no_telp_error');
			var email_error = $('#addForm' + ' #email_error');

			// RESET
			username.css('border', "1px solid #ccc");
			username_div.css('color', "#555");

			password.css('border', "1px solid #ccc");
			password_div.css('color', "#555");

			nama.css('border', "1px solid #ccc");
			nama_div.css('color', "#555");

			tgl_lahir.css('border', "1px solid #ccc");
			tgl_lahir_div.css('color', "#555");

			alamat.css('border', "1px solid #ccc");
			alamat_div.css('color', "#555");

			no_telp.css('border', "1px solid #ccc");
			no_telp_div.css('color', "#555");

			email.css('border', "1px solid #ccc");
			email_div.css('color', "#555");

			username_error.html("");
			password_error.html("");
			nama_error.html("");
			tgl_lahir_error.html("");
			alamat_error.html("");
			no_telp_error.html("");
			email_error.html("");

			var usernameData = JSON.parse('<?php echo json_encode($data_username) ?>');
	        var status_username;
	        usernameData.forEach(function(data) {
	            if (data.username == username.val()) {
	                status_username = false;
	            }
	        })

	      // validate username

			var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
			var alphanumeric = /^[0-9a-zA-Z]+$/;
			var status = true;
			if (username.val() == "") {
				username.css('border', "1px solid red");
				username_div.css('color', "red");
				username_error.html("Username Tidak Boleh Kosong");
				username.focus();
				status = false;
			}

			else if (!(username.val().match(alphanumeric))) {
				username.css('border', "1px solid red");
				username_div.css('color', "red");
				username_error.html("Username Hanya Huruf dan Angka");
				username.focus();
				status = false;
			}

			else if (status_username == false) {
				username.css('border', "1px solid red");
				username_div.css('color', "red");
				username_error.html("");
				username.focus();
				status = false;
			}
			else{
				username_error.val("");
			}

			if (password.val() == "") {
				password.css('border', "1px solid red");
				password_div.css('color', "red");
				password_error.html("Password Tidak Boleh Kosong");
				password.focus();
				status = false;
			}

			else if (password.val().length < 6) {
				password.css('border', "1px solid red");
				password_div.css('color', "red");
				password_error.html("Password Minimal 6 Karakter");
				password.focus();
				status = false;
			}
			else{
				password_error.val("");
			}

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

			if (email.val() == "") {
				email.css('border', "1px solid red");
				email_div.css('color', "red");
				email_error.html("Email Tidak Boleh Kosong");
				email.focus();
				status = false;
			}
			else{
				email_error.val("");
			}

	      return status;
	    }
	</script> 

</body>
</html>