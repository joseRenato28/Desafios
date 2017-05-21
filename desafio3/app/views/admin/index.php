<section class="container">
	<article>
		<div class="cb-module-header">
			<h3 class="cb-module-title">Bem vindo
				<?php
				if(isset($_SESSION['name_user'])){
					echo $_SESSION['name_user'];
				}else{
					echo 'usuário';
				}
				?>
			</h3>
		</div>
	</article>
</section>