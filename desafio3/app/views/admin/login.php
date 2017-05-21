<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $this->title ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<style type="text/css">
		body {
			background-color: white;
		}

		#loginbox {
			margin-top: 30px;
		}

		#loginbox > div:first-child {        
			padding-bottom: 10px;    
		}

		.iconmelon {
			display: block;
			margin: auto;
		}

		#form > div {
			margin-bottom: 25px;
		}

		#form > div:last-child {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.panel {    
			background-color: transparent;
		}

		.panel-body {
			padding-top: 30px;
			background-color: rgba(2555,255,255,.3);
		}

		#particles {
			width: 100%;
			height: 100%;
			overflow: hidden;
			top: 0;                        
			bottom: 0;
			left: 0;
			right: 0;
			position: absolute;
			z-index: -2;
		}

		.iconmelon,
		.im {
			position: relative;
			width: 150px;
			height: 150px;
			display: block;
			fill: #525151;
		}

		.iconmelon:after,
		.im:after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
	<div class="container">    
		<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 

			<div class="row">                
				<div class="iconmelon">
					<svg viewBox="0 0 32 32">
						<g filter="">
							<use xlink:href="#git"></use>
						</g>
					</svg>
				</div>
			</div>
			<?php
				if(!empty($this->error) && isset($this->error)){
					?>
					<div class="alert alert-warning">
						<strong>Aviso!</strong> <?= $this->error ?>
					</div>
					<?php
				}
			?>
			<div class="panel panel-default" >
				<div class="panel-heading">
					<div class="panel-title text-center">Área restrita</div>
				</div>     

				<div class="panel-body" >

					<form name="form" id="form" class="form-horizontal" action="<?= $this->site_url('login/logar'); ?>" method="POST">

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="user" type="email" required="true" class="form-control" name="email" value="" placeholder="Email">                                        
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" required="true" class="form-control" name="password" placeholder="Senha">
						</div>                                                                  

						<div class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Entrar</button>                          
							</div>
						</div>

					</form>     

				</div>                     
			</div>  
		</div>
	</div>
</body>
</html>