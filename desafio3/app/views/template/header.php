<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title><?= $this->title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= $this->site_url('assets/css/medias-queries.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->site_url('assets/css/index.css') ?>">
	<script type="text/javascript">
		function show_menu() {
			var menu = document.getElementById("menu");
			if (menu.className == "menu-ul") {
				menu.classList.add("responsive");
			}else{
				menu.className = "menu-ul";
			}
		}

		function scroll_footer(){
			window.scrollTo(0,document.body.scrollHeight);
		}
	</script>
</head>
<body>
	<header class="header">
		<section class="header-section-menu">
			<nav class="nav-bar">
				<div class="logo"><a href="#"><img src="<?= $this->site_url('/assets/img/logo.png') ?>"></a></div>
				<ul class="menu-ul" id="menu">
					<li><a href="#">HOME</a></li>
					<li><a href="#">IMAGENS</a></li>
					<li><a href="javascript:void(0);" onclick="scroll_footer()">FOOTER</a></li>
					<li><a href="javascript:void(0);" class="icon" onclick="show_menu()">&#9776;</a></li>
				</ul>
			</nav>
		</section>
		<section class="header-section-img">
			<div class="img-body">
				<?php
					$result = $this->images->get_text();
					if($result->rowCount() > 0){
						while($row = $result->fetch(PDO::FETCH_ASSOC)){
							?>
								<h1  class="hp" style="color: <?= $row['color_text'] ?>!important;"><?= $row['main_text'] ?></h1>
							<?php
						}
					}else{
						?>
							
						<?php
					}
				?>
			</div>
		</section>
	</header>


