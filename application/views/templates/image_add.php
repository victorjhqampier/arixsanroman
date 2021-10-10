    <style>
        .axpreview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
    </style>
    <div class="row">
        <div class="col-md-9">
            <img src="" id="sample_image" style="display: block; max-width: 100%;" />
        </div>
        <div class="col-md-3">
            <div class="axpreview"></div>            
            <div class="text-center">
                <button type="button" id="crop" class="btn btn-success m-2">Enviar</button>
                <button type="button" id="cropcancel" class="btn btn-warning">Cancelar</button>
            </div>            
        </div>
    </div>

<script>
    var image = document.getElementById('sample_image');
    (function(){       
        image.src = axEventUrl;//esto lo esperade del invocador        
    })();

    var cropper = new Cropper(image, {
		aspectRatio: 1,
		viewMode: 3,
		preview:'.axpreview'
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
                cropper.destroy();
                //cropper = null;
                //eliminar variables
                image= null, cropper= null, axEventUrl=null;
                let request = arixshell_upload_datos('arixapi/arixapi_save_img', {image:base64data});                
                if(request.status==true){                    
                   $(saveInputData).val(request.img);
                   $(saveImgData).attr('src', saveImgDirectory+request.img);
                    arixshell_cerrar_modalbase();
                }else{
                    arixshell_cerrar_modalbase();
                }				
			};
		});
	}); 
    $('#cropcancel').click(function(){
		cropper.destroy();
        image= null, cropper= null, axEventUrl=null;
        arixshell_cerrar_modalbase();
	}); 
    
</script>