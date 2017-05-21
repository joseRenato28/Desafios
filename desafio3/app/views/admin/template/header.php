<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $this->title ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $this->site_url('assets/admin/css/index.css') ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="<?= $this->site_url('assets/admin/js/functions.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/**** INDEX ****/
			var url = window.location;
			var load = '../../assets/img/load.svg'; 

		    $('.navbar-nav li a[href="' + url + '"]').parent().addClass('active');

		    $('.navbar-nav li a').filter(function () {
		    	return this.href == url;
		    }).parent().addClass('active').parent().parent().addClass('active');

			$('#navbar').affix({
				offset: {
					top: $('header').height()
				}
			});

			/**** IMAGE ****/
			$('body').on('click', '.change-image', function(e){
				e.preventDefault();
				var id_image = $(this).data('image');

				$.ajax({
					url: '<?= $this->site_url('admin/detalhesimagem') ?>',
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$("button[type='submit']").attr("disabled", true);
						$('.image_route').attr('src', load);
					},
					data:{
						id_image: id_image
					},
					success: function(data){
						$("button[type='submit']").attr("disabled", false);
						$('.image_route').attr('src', data.route_image);
						$('.title_image_in').val(data.title_image);
						$('.last_change').text(formatDate(data.create_on_image));
						$('.last_user_changer').text(data.name_user);
						$('input[name="route_image"]').val(data.route_image);
						$('input[name="id_image"]').val(data.id_image);
					},
					error: function(data){
						$("button[type='submit']").attr("disabled", false);
						console.log(data);
						$('.modal-body').html('<p>Ocorreu algum erro para recuperar os dados</p>');
					}
				});
			});
			$('body').on('click', '.change_image_btn', function(){
				$('.input_image_upload').click();
			});

			$('.input_image_upload').change(function(){
				form_add_with_img('<?= $this->site_url('admin/upload') ?>', '#form-upload-image', '.image_route', 'input[name="route_image"]');
			});

			$('body').on('click', '.btn_change_image', function(){
				$('#form_change_image').submit();
			});
			$('body').on('submit', '#form_change_image', function(e){
				var id_image = $('input.id_image').val();
				e.preventDefault();

				$.ajax({
					url: '<?= $this->site_url('admin/saveimage') ?>',
					type: 'POST',
					beforeSend: function(){
						$("button[type='submit']").attr("disabled", true);
						$('.btn_save_image').append('<img src="'+load+'"</img>');
					},
					data: $('#form_change_image').serialize(),
					success: function(data){
						reload_box(id_image, '<?= $this->site_url('admin/detalhesimagem')?>');
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						alert(data);
						$('.update-image').modal('toggle');
					},
					error: function(data){
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						alert('Ocorreu algum erro para salvar a imagem');
						console.log(data);
					}
				});
			});

			/**** TEXT ****/
			$('body').on('click', '.change-text', function(e){
				e.preventDefault();

				$.ajax({
					url: '<?= $this->site_url('admin/text') ?>',
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$("button[type='submit']").attr("disabled", true);
						$('.btn_save_image').append('<img src="'+load+'"</img>');
					},
					success: function(data){
						console.log(data);
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						$('.last_change').text(formatDate(data.create_on_text));
						$('.last_user_changer').text(data.name_user);
						$('input[name="text"]').val(data.main_text);
						$('input[name="color_text"]').val(data.color_text);
					},
					error: function(data){
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						console.log(data);
						$('.modal-body').html('<p>Ocorreu algum erro para recuperar os dados</p>');
					}
				});
			});

			$('body').on('click', '.btn_save_text', function(){
				$('#form_change_text').submit();
			});
			$('body').on('submit', '#form_change_text', function(e){
				e.preventDefault();
				
				$.ajax({
					url: '<?= $this->site_url('admin/savetext') ?>',
					type: 'POST',
					beforeSend: function(){
						$("button[type='submit']").attr("disabled", true);
						$('.btn_save_image').append('<img src="'+load+'"></img>');
					},
					data: $('#form_change_text').serialize(),
					success: function(data){
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						alert(data);
						$('.update-text').modal('toggle');
					},
					error: function(data){
						$('.btn_save_image').html("");
						$("button[type='submit']").attr("disabled", false);
						alert('Ocorreu algum erro para salvar a imagem');
						console.log(data);
					}
				});
			});
		});
	</script>

</head>
<body>
	<header>
		<!-- HEADER -->
		<div id="header">
			<div class="container">
				<div align="right">
					<font size="4">
						DESAFIO #3
					</font>
				</div>
			</div>
		</div>
		<!-- NAV -->
		<div id="navbar">
			<nav class="navbar navbar-static-top navbar-inverse">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?= $this->site_url('admin') ?>">
								Inicio
							</a>
						</li>
						<li>
							<a href="<?= $this->site_url('admin/imagens/') ?>">
								Imagens
							</a>
						</li>
						<li>
							<a href="#" class="change-text" data-toggle="modal" data-target=".update-text">
								Texto
							</a>
						</li>
						<li>
							<a href="#" class="change-text" data-toggle="modal" data-target=".download-apk">
								Download APK
							</a>
						</li>
						<li>
							<a href="<?= $this->site_url('login/logout') ?>">
								Sair
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

