<div class="modal fade update-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Alterar Imagem</h3>
			</div>
			<div class="modal-body">
				<section>
					<div class="row">
						<div class="col-sm-12">
							<div class="col-md-6">
								<div class="thumbnail">
									<img src="<?= $row['route_image'] ?>" class="image_route" alt="" style="width:100%">
									<form id="form-upload-image"  enctype="multipart/form-data">
										<input type="file" class="input_image_upload" name="image" style="display: none;">
									</form>
									<div class="caption">
										<button class="btn btn-info change_image_btn">Alterar imagem</button>
									</div>
								</div>
								<div class="form-group">
								<form id="form_change_image">
									<input type="hidden" class="id_image" name="id_image">
									<input type="text" class="title_image_in form-control" name="title_image" placeholder="Titulo Imagem">
									<input type="hidden" name="route_image">
								</form>
								</div>
							</div>
							<div class="col-md-6">
								<div class="alert alert-info">
									Última alteração feita em: <strong class="last_change"></strong>
									<br>
									Alterado por:  <strong class="last_user_changer"></strong>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" form="form_change_image" class="btn btn-primary  btn_change_image">Salvar<span class="btn_save_image"></span></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade update-text" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Alterar Texto</h3>
			</div>
			<div class="modal-body">
				<section>
					<div class="row">
						<div class="col-sm-6">
							<form id="form_change_text">
								<div class="form-group">
									<label>Texto</label>
									<input type="text" class="form-control" name="text" placeholder="Texto">
								</div>
								<div class="form-group">
									<label>Cor</label>
									<input type="text" class="form-control" name="color_text" placeholder="Cor">
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<div class="alert alert-info">
							 		Última alteração feita em: <strong class="last_change"></strong>
							 		<br>
							 		Alterado por: <strong class="last_user_changer"> </strong>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" form="form_change_text" class="btn btn-primary btn_save_text">Salvar<span class="btn_save_image"></span></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade download-apk" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Download APK</h3>
			</div>
			<div class="modal-body">
				<section>
					<div class="row">
						<div class="col-sm-12">
							<a target="blank" href="<?= $this->site_url('desafio4.apk') ?>">Download direto</a>
							<br>
							<a target="blank" href="https://drive.google.com/open?id=0B_lGWrUMBTf4QkVVZXluNTJ6YWs">Google Drive</a>
						</div>
					</div>
				</section>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>