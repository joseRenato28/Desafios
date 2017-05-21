<section class="container">
	<article>
		<div class="cb-module-header">
			<h3 class="cb-module-title">Imagens</h3>
		</div>
		<div class="col-sm-12">
			<?php
				$result = $this->get_image;
				if($result->rowCount() > 0){
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
						?>
						<div class="col-md-3" id="image-<?= $row['id_image'] ?>">
							<div class="thumbnail image-hover">
								<img src="<?= $row['route_image'] ?>" class="image" alt="<?= $row['title_image'] ?>" style="width:100%">
								<div  class="middle" data-toggle="modal" data-target=".update-image">
									<div class="text change-image" data-image="<?= $row['id_image'] ?>">Alterar</div>
								</div>
								<div class="caption">
									<p><?= $row['title_image'] ?></p>
								</div>
							</div>
						</div>
						<?php
					}
				}else{
					echo 'Nenhuma imagem encontrada';
				}
			?>
		</div>
	</article>
</section>
