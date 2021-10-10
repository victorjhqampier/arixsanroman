<div class="container" align="center">
    <style>
        .ax-image_area {
            position: relative;
        }

        /*img {
		  	display: block;
		  	max-width: 100%;
		}*/

        .axpreview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        /*.modal-lg{
  			max-width: 1000px !important;
		}*/

        .axoverlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: 0.5s ease;
            width: 100%;
        }

        .ax-image_area:hover .axoverlay {
            height: 50%;
            cursor: pointer;
        }

        .axtext {
            color: #333;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
    <br />
    <h3 align="center">Crop Image Before Upload using CropperJS with PHP</h3>
    <br />
    <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <div class="ax-image_area">
                <label for="ax-img-input">
                    <img src="public/apps/img/logo.png" id="uploaded_image" class="img-responsive img-circle" style="display: block; max-width: 100%;" />
                    <div class="axoverlay">
                        <div class="axtext">Agregar</div>
                    </div>
                    <input type="file" name="image" class="image d-none" id="ax-img-input" />
                </label>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="sample_image" style="display: block; max-width: 100%;" />
                                </div>
                                <div class="col-md-4">
                                    <div class="axpreview"></div>
                                    <button type="button" id="crop" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#ax-img-input').change(function(event){
		var files = event.target.files;
		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.axpreview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({//tamaño de imagen final
			width:200,
			height:200
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			let reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
			let base64data = reader.result;
            let request = arixshell_upload_datos('arixapi/arixapi_save_img', {image:base64data});
            //console.log(base64data);
            if(request.status==true){
                $modal.modal('hide');
				$('#uploaded_image').attr('src', 'public/apps/img/'+request.img);
            }else{
                $modal.modal('hide');
            }
				/*$.ajax({
					url:'arixapi/arixapi_save_img',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
                        console.log(data);
						//$('#uploaded_image').attr('src', data.);
					}
				});*/
			};
		});
	});
	
});
</script>