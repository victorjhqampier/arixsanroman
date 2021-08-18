<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <form id="form-axuser-add">
            <div class="card-group">
                <div class="card">
                    <div class="card-header text-center"><strong>USUARIO Y PERMISOS</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user-employee-doc">Empleado</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="user-employee-doc" name="txtuseremployeedoc" placeholder="DNI del empleado" />
                                <input type="text" class="form-control d-none" id="user-employee-dscrb" name="txtuseremployeedscrb" readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-search-userEmployee"><i class="fa fa-search"></i></button>
                                    <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-userEmployee"><i class="fa fa-times"></i></button>
                                </div>
                                <input type="hidden" class="d-none" id="user-employee-id" name="txtuseremployeeid" readonly />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user-id">Direccion de correo electronico</label>
                            <input type="text" class="form-control form-control-sm" id="user-accountid" name="txtuseraccountid" placeholder="Cuenta de acceso" />
                        </div>
                        <div class="form-group">
                            <label for="user-id">Contraseña</label>
                            <input type="text" class="form-control form-control-sm" id="user-accountpass" name="txtuseraccountpass" placeholder="Contraseña asignada" />
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="user-read">Ingresar</label>
                                <select id="user-read" name="txtuserread" class="form-control form-control-sm">
                                    <option value="50A8E49532917Q3FwNE5TQThFcWtGOWt1WDlZWFZ3QT09" selected>Permitir</option>
                                    <option value="78A8A91824B27TXZ5bmd3L2RQTjhOaVg5aS9IK0tpZz09">Denegar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="user-update">Actualizar</label>
                                <select id="user-update" name="txtuserupdate" class="form-control form-control-sm">
                                    <option value="F31E4F846C153ay9pRWxXR3BNYzFFd3ZMUFo3Zzk1QT09" selected>Permitir</option>
                                    <option value="F9B3B5F2A8B08c2tyN0ZmRmVqMTNWRUlhdmZWMFdXZz09">Denegar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="user-delete">Eliminar</label>
                                <select id="user-delete" name="txtuserdelete" class="form-control form-control-sm">
                                    <option value="54F747562B763N0twL3NoSXp0ZmJaSElYYVM5Mi9SUT09" selected>Permitir</option>
                                    <option value="7F775B1A70BE2bUJseTNVaGhsZEl3SVpoOXVOOUtvUT09">Denegar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center"><strong>SUCURSALES</strong></div>
                    <div class="card-body">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" checked />
                                </span>
                                <span class="input-group-text">BIBLIOTECA MUNICIPAL GAMALIEL CHURATA</span>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" />
                                </span>
                                <span class="input-group-text">CASA DE LA CULTURA</span>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" />
                                </span>
                                <span class="input-group-text">PISCINA MUNICIPAL PUNO</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center"><strong>APLICACIONES Y ROLES</strong></div>
                    <div class="card-body" id="apps-roles">
                        <!--div class="form-inline">
                            <div class="form-group mb-2">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" class="form-control form-control-sm" id="inputPassword2" placeholder="Password">
                            </div>
                        </div>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                            <input type="text" readonly class="form-control-plaintext form-control-sm mb-2" value="Configuraciones">                            
                            </div>
                            <select class="form-control" aria-describedby="app-rol-1">
                                <option>Ninguno</option>
                                <option>Administrador</option>
                                <option>Asistente</option>
                            </select>
                            <small id="passwordHelpBlock" class="form-text text-muted col-md-12">
                                Sin permiso
                            </small>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Arix Store</span>
                            </div>
                            <select class="form-control" aria-describedby="inputGroup-sizing-sm">
                                <option>Ninguno</option>
                                <option>Administrador</option>
                                <option>Asistente</option>
                            </select>
                            <small id="passwordHelpBlock" class="form-text text-muted col-md-12">
                                Sin permiso alguno
                            </small>
                        </div-->
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--div class="col-xl-12 col-md-12 mt-2">
        <div class="alert alert-dark bg-dark" role="alert">
            <code>
                <samp class="text-white">
                    *vic*@*** VICTOR JHAMPIER CAXI -> INSERT -> 12/07/2021 11:45<br />
                    *vic*@*** VICTOR JHAMPIER CAXI -> UPDATE -> 12/07/2021 11:45
                </samp>
            </code>
        </div>
    </div-->
</div>
<script type="text/javascript">
    (function(){
        let roles = arixshell_download_datos('configuraciones/axconfig_get_roles');
        let temp = '';
        for(i=0;i<roles.length;i++){
            temp += '<option value="'+roles[i].axuid+'">'+roles[i].rol+'</option>'
        }
        roles = arixshell_download_datos('configuraciones/axconfig_get_apps');
        //console.log(roles);
        for(i=0;i<roles.length;i++){
            $('#form-axuser-add #apps-roles').append('<div class="input-group input-group-sm mb-2"><div class="input-group-prepend"><span class="input-group-text">'+roles[i].app+'</span></div><select class="form-control" name="txtapprol'+roles[i].axaid+'">'+temp+'</select></div>');
        }
        //console.log(temp);
    })();
$(document).ready(function(){
    arixshell_iniciar_llaves_locales("#btn_id_axusuarios_nuevo");
    arixshell_cargar_botones_menu('btn-guardar, btn-cerrar');
    //$('#form-axuser-add #select-permiso').selectpicker();//inicializa la multiple seleccion
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-guardar", function(){        
        console.log($('#form-axuser-add').serialize());
        alert('todos me llegan');
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });

    //(1)PARA EL MODAL DE AGREGAR persona
    $("#btn-search-userEmployee").click(function () {     
        let temp = $("#user-employee-doc").val();       
        if(temp.length == 8){
            let request = arixshell_upload_datos('configuraciones/axconfig_duplicate_user', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false            
            if(request.status==true){
                $('#user-employee-dscrb').val(request.data).removeClass('d-none');                
                $('#user-employee-id').val(request.id);
                $("#btn-restart-userEmployee").removeClass('d-none');
                $("#user-employee-doc").addClass('d-none');
                $(this).addClass('d-none');
            }else if(request.status==false){
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PERSONA','arixapi/arixapi_get_form_person','btn-modalNewUser-forDriver');
            }
            else{
                arixshell_alert_notification('warning','La persona se encuntra registrada ...'); 
                $("#user-employee-doc").val("");        
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR persona
    $(document).on('click', '#btn-modalNewUser-forDriver', function(){
        let request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $('#user-employee-dscrb').val(request['data']).removeClass('d-none');                
            $('#user-employee-id').val(request['id']);
            $("#btn-restart-userEmployee").removeClass('d-none');
            $("#user-employee-doc").addClass('d-none');
            $('#btn-search-userEmployee').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    //(3) boton reniciar
    $("#btn-restart-userEmployee").click(function () {
        $(this).addClass('d-none');
        $("#user-employee-dscrb").val("").addClass('d-none');
        $("#btn-search-userEmployee").removeClass('d-none');
        $("#user-employee-doc").removeClass('d-none').val("").focus();
    });
}); 
</script>