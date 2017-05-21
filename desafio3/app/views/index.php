
	<section class="container">
		<article>
			<h1 class="title">QUALIDADE E SINCRONIA</h1>
		</article>
		<div class="content center images">
			<?php
				$result = $this->images->get_image();
				if($result->rowCount() > 0){
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
						?>
						<div class="thumbnail">
							<div class="relative center">
								<img src="<?= $row['route_image'] ?>" class="img-responsive" alt="<?= $row['title_image'] ?>">
							</div>
							<p class="thumbnail-text"><?= $row['title_image'] ?></p>
						</div>
						<?php
					}
				}else{

				}
			?>
		</div>
	</section>
