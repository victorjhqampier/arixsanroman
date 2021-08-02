<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="per-form-first">
    <div class="col-md-10">
        <div class="card mb-1">
            <div class="card-body">                
                <table class="table table-hover d-none" id="per-form-base-result">
                    <thead>
                        <tr>
                            <th scope="col">Nueva Persona Registrada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td odd="verga">ArixCorp</td>
                        </tr>
                    </tbody>
                </table>                       
                <form id="per-form-base">
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-dni">Número de Documento</label>
                            <input type="text" class="form-control" id="per-dni" name="txtperdni" placeholder="DNI">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-names">Nombres</label>
                            <input type="text" class="form-control" id="per-names" name="txtpername" placeholder="Nombres">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-lastname">Apellido Paterno</label>
                            <input type="text" class="form-control" id="per-lastname" name="txtperlasname" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-firstname">Apellido Materno</label>
                            <input type="text" class="form-control" id="per-firstname" name="txtfirstname" placeholder="Apellido Materno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-borndate">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" id="per-borndate" name="txtborndate" placeholder="Día/Mes/Año">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-sexe">Género/sexo</label>
                            <select id="per-sexe" name="txtpersexe" class="form-control">                                
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3" selected>No definido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="per-address">Direccion del Domicilio Actual</label>
                        <input type="text" class="form-control" id="per-address" name="txtperaddress" placeholder="Dirección del domicilio">
                    </div>                
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-departament">Departamento</label>
                            <select id="per-departament" name="txtperdepartment" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-province">Provincia</label>
                            <select id="per-province" name="txtperprovince" class="form-control">
                                <option selected>...</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-distrite">Distrito</label>
                            <select id="per-distrite" name="txtperdistrite" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-email">Correo Electrónico (!)</label>
                            <input type="email" class="form-control" id="per-email" name="txtperemail" placeholder="Direccion de correo electrónico">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-phone">Número de teléfono (!)</label>
                            <input type="text" class="form-control" id="per-phone" name="txtperphone" placeholder="Número de teléfono">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
   </div>
  <div class="col-md-2"><!--mb-2 = margin-->
    <div class="card-body">
        <img src="public/images/users/tu39hnri84fheg.png" alt="Victor CAxi" class="img-thumbnail mt-4">
    </div>
  </div>
    <div class="col-xl-12 col-md-12 mt-2 btn-shown-submit">
        <div class="alert alert-dark text-center" role="alert">
            <button class="btn btn-success" id="btn-enviar-peradd">Guardar</button>
        </div>
    </div>    
</div>
<script type="text/javascript">
    function mpsr_form_auto_start(){
        var infor = arixshell_read_cache_serial('e0x005477arixNewUser');       
            if(infor!=null){
                infor=infor['id'];
                if(infor.length==8){
                    $('#per-form-base #per-dni').val(infor);
                    $('#per-form-base #per-dni').attr('readonly',true);
                }else{
                    return;
                }
        }else{
            return;
        }
    }
    mpsr_form_auto_start();
    $('#per-form-base #per-dni').mask('99999999');
    $('#per-form-base #per-borndate').mask('00/00/0000');
    $('#per-form-base #per-dni').focus();

    arixshell_cargar_opciones('#per-form-base #per-departament', 'arixapi/arixapi_get_departamentos');
    var dep = $("#per-departament option:eq(20)").attr("selected", "selected").val();arixshell_subir_opciones('#per-form-base #per-province','arixapi/arixapi_get_provincias', 'txtdata='+dep+'&');
    dep = $("#per-province option:eq(10)").attr("selected", "selected").val();arixshell_subir_opciones('#per-form-base #per-distrite','arixapi/arixapi_get_distritos', 'txtdata='+dep+'&');
    $('#per-form-base #per-departament').change(function(){
        var r = $(this).val();
        $('#per-form-base #per-distrite').html('');
        arixshell_subir_opciones('#per-form-base #per-province','arixapi/arixapi_get_provincias', 'txtdata='+r+'&');
    });
    $('#per-form-base #per-province').change(function(){
        var r = $(this).val();
        arixshell_subir_opciones('#per-form-base #per-distrite','arixapi/arixapi_get_distritos', 'txtdata='+r+'&');
    });

    $("#per-form-base").validate({
        errorClass: "text-danger",
        rules: {
            txtperdni: {
                required: true,
                maxlength: 8,
                minlength: 8
            },
            txtpername: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtperlasname: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtfirstname: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtborndate: {
                required: true,
                minlength: 5
            },
            txtpersexe: {
                required: true,
            },
            txtperaddress: {
                required: true,
                maxlength: 70,
                minlength: 5
            },
            txtperdepartment: {
                required: true
            },
            txtperprovince: {
                required: true
            },
            txtperdistrite: {
                required: true
            },
            txtperemail: {
                required: false,
                email: true
            },
            txtperphone:{
                required: false,
                maxlength: 60,
                minlength: 9
            }
        }
    });    
	$("#btn-enviar-peradd").click(function () {
        if($("#per-form-base").valid()){
            var request = arixshell_upload_datos('arixapi/arixapi_post_personas', $('#per-form-base').serialize());
            if(request['status']===true){
                var data = $('#per-form-base #per-dni').val()+' - '+$('#per-form-base #per-names').val()+', '+$('#per-form-base #per-lastname').val()+' '+$('#per-form-base #per-firstname').val();
                $('#per-form-base-result tbody').html('<tr><td>'+data+'</td></tr>');
                arixshell_write_cache_serial("e0x005477arixNewUser",request['id'],data);//Pide 1= nombre clave de identificacion 2: (id)= alguna informacion y 3:(data) alguna descripcion       
                $('#per-form-base').addClass('d-none');
                $('.btn-shown-submit').addClass('d-none');
                $('#per-form-base').trigger("reset");
                $('#per-form-base-result').removeClass('d-none');
            }
            else{                
                $('#per-form-first').html('<div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">Error 500<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado su petición ...</a></div></div></div></div>');
            }
        }
        else{
            return;
        }
    });
    function mpsradd_get_pers(dni){
        request = arixshell_download_datos('https://dniruc.apisperu.com/api/v1/dni/'+dni+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaG5hbGFtdXNAZ21haWwuY29tIn0.afUd28wIqmAoFV9CbIu9JZcIRynhCi1t1P--Sru3kRY');
        if (request['dni']== dni){
            $("#per-form-base #per-names").val(request.nombres);
            $("#per-form-base #per-lastname").val(request.apellidoPaterno);
            $("#per-form-base #per-firstname").val(request.apellidoMaterno);
        }else{
            return;
        }
    }
    $("#per-form-base #per-dni").blur(function(){
        var dni = request = $(this).val();
        //var entero = parseInt(request).toString();
        if(request.length == 8){           
            request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+request+'&');
            if(request['status']==false){
                $("#per-form-base #per-dni").addClass('is-valid');
                mpsradd_get_pers(dni);//PARA CARGAR AUTOMATICAMENTE LOS DATOS de PERSONAS
            }else{
                $("#per-form-base #per-dni").val("");
                $("#per-form-base #per-dni").removeClass('is-valid');            
            }
        }else{
            $("#per-form-base #per-dni").val("");
        }
        /*request.length == 8 ? request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+request+'&') : request['status']=true;
        if(request['status']==false){
            $("#per-form-base #per-dni").addClass('is-valid');
            //mpsradd_get_pers(dni);
        }else{
            $("#per-form-base #per-dni").val("");
            $("#per-form-base #per-dni").removeClass('is-valid');            
        }*/
    });
</script>