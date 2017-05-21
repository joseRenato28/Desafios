		function formatDate(date){
			$array_date = date.split("-")
			return $array_date[2]+'/'+$array_date[1]+'/'+$array_date[0];
		}

		function form_add_with_img(url, form, dest, input){
			var file = $(form).get(0);
			var formData = new FormData(file);
			var load = '../../assets/img/load.svg';
			var old_image = $(dest).attr('src');
			$.ajax({
				url: url,
				type: "POST",
				beforeSend: function(){
					$("button[type='submit']").attr("disabled", true);
					$(dest).attr('src', load);	
				},
				datype: "html",
				data:formData,
				async: true,
				success: function(data){
					try{
						var route = data.split("|");
						if(route[0] == 'true' || route[0] == 'true '){
							$(dest).attr('src', route[1]);
							$(input).val(route[1]);
						}else{
							alert(data);
							$(dest).attr('src', old_image);
						}
					}catch(err){
						alert(data);
						console.log(err);
						$(dest).attr('src', old_image);	
					}
					$("button[type='submit']").attr("disabled", false);
				},
				cache: false,
				contentType: false,
				processData: false,
				error: function(data){
					$(dest).attr('src', old_image);	
					alert("Ocorreu algum erro para enviar a imagem");
					console.log(data);
					$("button[type='submit']").attr("disabled", false);
				}
			});
		}

		function reload_box(id, url){
			var load = '../../assets/img/load.svg';
			$.ajax({
				url: url,
				type: 'POST',
				beforeSend: function(){
					$("#image-"+id+" > div").find('.image').attr('src', load);
				},
				data: {id_image: id},
				success: function(data){
					var obj = JSON.parse(data);
					$("#image-"+id+" > div").find('.image').attr('src', obj.route_image);
					$("#image-"+id+" > div").find('.caption > p').text(obj.title_image);
				},
				error: function(data){
					alert("Sera necessario atualizar a pagina para ver as alteraçoes");
					console.log(data);
				}
			});
		}