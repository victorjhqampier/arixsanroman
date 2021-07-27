<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="first-dom">
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="card mb-1">
            <div class="card-body">   
                <form id="vehi-form-base">                    
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="vehi-matreal">Placa Vigente</label>
                            <input type="text" class="form-control" id="vehi-matreal" name="txtvehireal" placeholder="Placa Vigente">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="vehi-matpre">Placa Anterior (!)</label>
                            <input type="text" class="form-control" id="vehi-matpre" name="txtvehipre" placeholder="Placa Anterior">
                        </div>
                        <div class="form-group col-md-6">                                
                                <label for="vehi-ownerdoc">Propietario</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="vehi-ownerdoc" name="txtvehiownerdoc" placeholder="DNI del Propietario">
                                    <input type="text" class="form-control d-none" id="vehi-ownerdescribe" name="txtvehiownerdescribe" readonly>
                                    <div class="input-group-append">                                        
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-vehicle"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-vehicle"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="texthidden" class="d-none" id="vehi-ownerid" name="txtvehiownerid" readonly>
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="vehi-serial">Número de Serie</label>
                            <input type="text" class="form-control" id="vehi-serial" name="txtvehiserial" placeholder="Número de Serie">
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="vehi-engine">Número de Motor</label>
                            <input type="text" class="form-control" id="vehi-engine" name="txtvehiengine" placeholder="Número de Motor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="vehi-brand">Marca del Vehículo</label>
                                <select id="vehi-brand" name="txtvehibrand" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-model">Modelo del Vehículo</label>
                            <input type="text" class="form-control" id="vehi-model" name="txtvehimodel" placeholder="Modelo">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-color">Color del Vehículo</label>
                            <input type="text" class="form-control" id="vehi-color" name="txtvehicolor" placeholder="Color">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-year">Año de fabricación</label>
                            <input type="text" class="form-control" id="vehi-year" name="txtvehiyear" placeholder="Año de fabricación">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-weigth">Peso Neto (Kg)</label>
                            <input type="text" class="form-control" id="vehi-weigth" name="txtvehiweigth" placeholder="Peso Neto">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-seats">Número de asientos</label>
                            <input type="text" class="form-control" id="vehi-seats" name="txtvehiseats" placeholder="Número de Asientos">
                        </div>
                    </div>                   
                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="vehi-class">Clase General</label>
                                <select id="vehi-class" name="txtvehiclass" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="vehi-descript">Descripcion de Clase</label>
                            <input type="text" class="form-control" id="vehi-descript" name="txtvehidescript" placeholder="Descripción Espesífica">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
   </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="alert alert-dark text-center" role="alert">
            <button class="btn btn-success" id="btn-enviar-vehicleadd">Guardar</button>
        </div>
    </div>    
</div>
<script type="text/javascript">
    var thisForm = '#vehi-form-base ';
    function vehicle_autoCache_start(){
        var infor = arixshell_read_cache_serial('mpsr0x005477newVehicle');       
            if(infor!=null){
                infor=infor['id'];
                if(infor.length==6){
                    $(thisForm+'#vehi-matreal').val(infor).attr('readonly',true);
                }else{
                    return;
                }
        }else{
            return;
        }
    }
    function vehicle_autoLoad_data(placa){//en construccion
         request = arixshell_download_datos('');
         if (request['dni']==placa){
             $(thisForm+"#per-names").val(request.nombres);
             $(thisForm+"#per-lastname").val(request.apellidoPaterno);
             $(thisForm+"#per-firstname").val(request.apellidoMaterno);
         }else{
             return;
         }
    }
    vehicle_autoCache_start();
    $(thisForm+'#vehi-year').mask('9999');
    $(thisForm+'#vehi-seats').mask('99');
    $(thisForm+'#vehi-weigth').mask('99999');
    $(thisForm+'#vehi-ownerdoc').mask('99999999');
    $(thisForm+'#vehi-matreal').mask('AAA999', {reverse: true});
    $(thisForm+'vehi-matpre').mask('AAA999', {reverse: true});

    $(thisForm+'#vehi-matreal').focus();
    arixshell_cargar_opciones(thisForm+'#vehi-class','mpsrlicencias/mpsr_get_tipounidad');
    arixshell_cargar_opciones(thisForm+'#vehi-brand','mpsrlicencias/mpsr_get_hbrands');

    $(thisForm).validate({
        errorClass: "text-danger",
        rules: {
            txtvehireal: {
                required: true,
                maxlength: 6,
                minlength: 6
            },
            txtvehipre: {
                required: false,
                maxlength: 6,
                minlength: 6
            },
            txtvehiownerdoc: {
                required: true,
                maxlength: 8,
                minlength: 8
            },
            txtvehiownerdescribe: {
                required: true,
                maxlength: 220,
                minlength: 12
            },
            txtvehiownerid: {
                required: true,
                maxlength: 220,
                minlength: 12
            },
            txtvehiserial: {
                required: true,
                maxlength: 25,
                minlength: 7
            },
            txtvehiengine: {
                required: true,
                maxlength: 30,
                minlength: 7
            },
            txtvehibrand: {
                required: true
            },
            txtvehimodel: {
                required: true,
                maxlength: 30,
                minlength: 2
            },
            txtvehicolor: {
                required: true,
                maxlength: 50,
                minlength: 3
            },
            txtvehiyear: {
                required: true,
                maxlength: 4,
                minlength: 4
            },
            txtvehiweigth: {
                required: true,
                maxlength: 5,
                minlength: 3
            },
            txtvehiseats: {
                required: true,
                maxlength: 2,
                minlength: 1
            },
            txtvehiclass: {
                required: true
            },
            txtvehidescript: {
                required: true,
                maxlength: 30,
                minlength: 2
            }
        }
    });    
	$("#btn-enviar-vehicleadd").click(function () {
        if($(thisForm).valid()){
             var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_vehicleadd', $(thisForm).serialize());
             if(request['status']===true){
                var data = $(thisForm+' #vehi-matreal').val()+' - '+$(thisForm+'#vehi-brand option:selected').text()+' '+$(thisForm+'#vehi-model').val()+' ('+$(thisForm+' #vehi-year').val()+') - '+$(thisForm+'#vehi-color').val();
                $('#first-dom').html('<div class="col-xl-12 col-md-12"><table class="table table-striped"> <tbody> <tr> <th scope="row">Vehículo</th><td>'+data+'</td></tr><tr> <th scope="row">Propietario</th> <td>'+$(thisForm+'#vehi-ownerdescribe').val()+'</td></tr></tbody></table></div>');
                arixshell_write_cache_serial("mpsr0x005477newVehicle",request['id'],data);//Pide 1= nombre clave de identificacion 2: (id)= alguna informacion y 3:(data) alguna descripcion
             }else{
                console.log('vehicle_add -> mpsr_post_vehicleadd');             
                $('#first-dom').html('<div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">Error 500<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado su petición ...</a></div></div></div></div>');
             }
        }else{
            return;
        }
    });
   $(thisForm+"#btn-restart-vehicle").click(function () {
        $(this).addClass('d-none');
        $(thisForm+"#vehi-ownerdescribe").val("").addClass('d-none');
        $(thisForm+"#btn-search-vehicle").removeClass('d-none');
        $(thisForm+"#vehi-ownerdoc").removeClass('d-none').val("").focus();
    });
    //(1) PARA EL MODAL AGREGAR PROPIETARIO
    $(thisForm+"#btn-search-vehicle").click(function () {
        var temp = $(thisForm+"#vehi-ownerdoc").val();
        if(temp.length==8){
        var request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $(thisForm+'#vehi-ownerdescribe').val(request['data']).removeClass('d-none');                
                $(thisForm+'#vehi-ownerid').val(request['id']);
                $(thisForm+"#btn-restart-vehicle").removeClass('d-none');
                $(thisForm+"#vehi-ownerdoc").addClass('d-none');
                $(this).addClass('d-none');
            }else{
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PROPIETARIO','arixapi/arixapi_get_form_person','btn-modalNewUser-forVehicles');
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR PROPIETARIO
    $(document).on('click', '#btn-modalNewUser-forVehicles', function(){
        var request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $(thisForm+'#vehi-ownerdescribe').val(request['data']).removeClass('d-none');                
            $(thisForm+'#vehi-ownerid').val(request['id']);
            $(thisForm+"#btn-restart-vehicle").removeClass('d-none');
            $(thisForm+"#vehi-ownerdoc").addClass('d-none');
            $(thisForm+'#btn-search-vehicle').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    //antes de guardar, prueba la duplicidad
    //esto puede actuar cunadose hace clic en el boton guardar  
     $(thisForm+"#vehi-matreal").blur(function(){
        var placa = request = $(this).val();
        if(request.length == 6){           
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicatevehi', 'txtdata='+request+'&');
            if(request['status']==false){
                $(thisForm+"#vehi-matreal").addClass('is-valid').attr('readonly',true);
                //vehicle_autoLoad_data();//PARA CARGAR AUTOMATICAMENTE LOS DATOS de PERSONAS
            }else{
               $(thisForm+"#vehi-matreal").val("").removeClass('is-valid').removeAttr('readonly');           
            }
        }else{
            return;
        }
    });
</script>