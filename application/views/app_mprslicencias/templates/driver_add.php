<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="first-dom-driver">
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="card mb-1">
            <div class="card-body">   
                <form id="driver-form-base">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="driver-driverresol">N° Resolucion de habilitación</label>
                            <input type="text" class="form-control" id="driver-driverresol" name="txtdriverresol" placeholder="Número de Resolución">
                        </div>                        
                    </div>                   
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="driver-licenseid">Número de Licencia (MTC)</label>
                            <input type="text" class="form-control form-control-sm" id="driver-licenseid" name="txtdriverlicense" placeholder="Número de licencia">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="driver-catclass">Categoría y Clasificación</label>
                            <select id="driver-catclass" name="txtdrivercatclass" class="form-control form-control-sm">
                                <option selected>Cargarndo...</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">                                
                                <label for="driver-ownerdoc">Conductor</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" id="driver-ownerdoc" name="txtdriverownerdoc" placeholder="DNI del conductor">
                                    <input type="text" class="form-control d-none" id="driver-ownerdescribe" name="txtdriverownerdescribe" readonly>
                                    <div class="input-group-append">                                        
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-driver"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-driver"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="driver-ownerid" name="txtdriverownerid" readonly>
                                </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-5">
                            <label for="driver-viginicio">Vigente desde</label>
                            <input type="text" class="form-control" id="driver-viginicio" name="txtdriverviginicio" placeholder="Día/mes/año">
                        </div>                       
                        <div class="form-group input-group-sm col-md-5">
                            <label for="driver-vigencia">Vigente hasta</label>
                            <input type="text" class="form-control" id="driver-vigencia" name="txtdrivervigencia" placeholder="Día/mes/año">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
   </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="alert alert-dark text-center" role="alert">
            <button class="btn btn-success" id="btn-enviar-driveradd">Guardar</button>
        </div>
    </div>    
</div>
<script type="text/javascript">
    var thisFormDriver = '#driver-form-base ';
    function driver_autoLoad_data(placa){//en construccion
         request = arixshell_download_datos('');
         if (request['dni']==placa){
             $(thisFormDriver+"#per-names").val(request.nombres);
             $(thisFormDriver+"#per-lastname").val(request.apellidoPaterno);
             $(thisFormDriver+"#per-firstname").val(request.apellidoMaterno);
         }else{
             return;
         }
    }
    $(thisFormDriver+'#driver-viginicio').mask('99/99/9999');
    $(thisFormDriver+'#driver-vigencia').mask('99/99/9999');
    $(thisFormDriver+'#driver-ownerdoc').mask('99999999');
    $(thisFormDriver+'#driver-licenseid').mask('AAA99999999', {reverse: true});

    $(thisFormDriver+'#driver-driverresol').focus();
    arixshell_cargar_opciones(thisFormDriver+'#driver-catclass','mpsrlicencias/mpsr_get_class_licencia');
    $(thisFormDriver).validate({
        errorClass: "text-danger",
        rules: {
            txtdriverresol: {
                required: true,
                maxlength: 70,
                minlength: 7
            },
            txtdriverlicense: {
                required: true,
                maxlength: 11,
                minlength: 9
            },
            txtdriverownerdoc: {
                required: true,
                maxlength: 8,
                minlength: 8
            },
            txtdriverownerdescribe: {
                required: true,
                maxlength: 220,
                minlength: 12
            },
            txtdriverownerid: {
                required: true,
                maxlength: 220,
                minlength: 12
            },
            txtdrivercatclass: {
                required: true
            },
            txtdrivervigencia: {
                required: true,
                maxlength: 10,
                minlength: 9
            },
            txtdriverviginicio: {
                required: true,
                maxlength: 10,
                minlength: 9
            }
        }
    }); 
	$("#btn-enviar-driveradd").click(function () {
        if($(thisFormDriver).valid()){
             let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_driveradd', $(thisFormDriver).serialize());
             if(request.status==true){
                let data = $(thisFormDriver+'#driver-licenseid').val()+' - '+$(thisFormDriver+'#driver-catclass option:selected').text()+' '+$(thisFormDriver+' #driver-vigencia').val();
                $('#first-dom-driver').html('<div class="col-xl-12 col-md-12"><table class="table table-striped"> <tbody> <tr> <th scope="row">Licencia</th><td>'+data+'</td></tr><tr> <th scope="row">Conductor</th> <td>'+$(thisFormDriver+'#driver-ownerdescribe').val()+'</td></tr></tbody></table></div>');
                arixshell_write_cache_serial("mpsr0x005477newDriver",request.id,data);//Pide 1= nombre clave de identificacion 2: (id)= alguna informacion y 3:(data) alguna descripcion
             }else{
                //alert('todo mal');
                console.log('DRIVER_add -> NO GUARDAR');             
                $('#first-dom-driver').html('<div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">Error 500<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado su petición ...</a></div></div></div></div>');
             }
        }else{
            return;
        }
    });

   $(thisFormDriver+"#btn-restart-driver").click(function () {
        $(this).addClass('d-none');
        $(thisFormDriver+"#driver-ownerdescribe").val("").addClass('d-none');
        $(thisFormDriver+"#btn-search-driver").removeClass('d-none');
        $(thisFormDriver+"#driver-ownerdoc").removeClass('d-none').val("").focus();
    });
    //(1) PARA EL MODAL AGREGAR PROPIETARIO
    $(thisFormDriver+"#btn-search-driver").click(function () {
        let temp = $(thisFormDriver+"#driver-ownerdoc").val();
        if(temp.length==8){
        let request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $(thisFormDriver+'#driver-ownerdescribe').val(request['data']).removeClass('d-none');                
                $(thisFormDriver+'#driver-ownerid').val(request['id']);
                $(thisFormDriver+"#btn-restart-driver").removeClass('d-none');
                $(thisFormDriver+"#driver-ownerdoc").addClass('d-none');
                $(this).addClass('d-none');
            }else{
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PERSONA','arixapi/arixapi_get_form_person','btn-modalNewUser-forDriver');
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR conductor
    $(document).on('click', '#btn-modalNewUser-forDriver', function(){
        let request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $(thisFormDriver+'#driver-ownerdescribe').val(request['data']).removeClass('d-none');                
            $(thisFormDriver+'#driver-ownerid').val(request['id']);
            $(thisFormDriver+"#btn-restart-driver").removeClass('d-none');
            $(thisFormDriver+"#driver-ownerdoc").addClass('d-none');
            $(thisFormDriver+'#btn-search-driver').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    
    //antes de guardar, prueba la duplicidad
    //esto puede actuar cunadose hace clic en el boton guardar  
     $(thisFormDriver+"#driver-licenseid").blur(function(){
        let placa = request = $(this).val();
        if(request.length >= 9){           
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicatedriver', 'txtdata='+request+'&');
            if(request['status']==false){
                $(thisFormDriver+"#driver-licenseid").addClass('is-valid').attr('readonly',true);
            }else{
               $(thisFormDriver+"#driver-licenseid").val("").removeClass('is-valid').removeAttr('readonly');           
            }
        }else{
            return;
        }
    });
</script>