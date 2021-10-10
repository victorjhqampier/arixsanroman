<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <form id="form-axuser-add">
            <div class="card-group">
                <div class="card text-white bg-info">
                    <div class="card-header text-center"><strong>USUARIO Y PERMISOS</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user-employee-doc">Empleado</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="user-employee-doc" name="txtuseremployeedoc" placeholder="DNI del empleado" />
                                <input type="text" class="form-control d-none" id="user-employee-dscrb" name="txtuseremployeedscrb" readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="btn-search-userEmployee"><i class="fa fa-search"></i></button>
                                    <button class="btn btn-secondary d-none" type="button" id="btn-restart-userEmployee"><i class="fa fa-times"></i></button>
                                </div>
                                <input type="hidden" class="d-none" id="user-employee-id" name="txtuseremployeeid" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-accountid">Direccion de correo electronico</label>
                            <input type="email" class="form-control form-control-sm" id="user-accountid" name="txtuseraccountid" placeholder="Cuenta de acceso"/>
                            <!--div class="input-group input-group-sm">                            
                                <input type="email" class="form-control form-control-sm" id="user-accountid" name="txtuseraccountid" placeholder="Cuenta de acceso"/>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="btn-search-account"><i class="fa fa-random"></i></button>
                                </div>
                            </div-->
                        </div>
                        <div class="form-group">
                            <label for="user-accountpass">Contraseña</label>
                            <div class="input-group input-group-sm">                            
                                <input type="password" class="form-control form-control-sm" id="user-accountpass" name="txtuseraccountpass" placeholder="Contraseña asignada" />                                
                                <div class="input-group-append">                                    
                                    <button class="btn btn-primary" type="button" onclick="config_showHidePwd('user-accountpass','user-passeye');">
                                        <i id="user-passeye" class="far fa-eye-slash"></i>
                                    </button>
                                    <button class="btn btn-secondary" type="button" onclick="config_loadPwd('#form-axuser-add #user-accountpass');"><i class="fa fa-random"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="user-read">Ingresar</label>
                                <select id="user-read" name="txtuserread" class="custom-select custom-select-sm">
                                    <option value="50A8E49532917Q3FwNE5TQThFcWtGOWt1WDlZWFZ3QT09" selected>Permitir</option>
                                    <option value="78A8A91824B27TXZ5bmd3L2RQTjhOaVg5aS9IK0tpZz09">Denegar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="user-update">Actualizar</label>
                                <select id="user-update" name="txtuserupdate" class="custom-select custom-select-sm">
                                    <option value="F31E4F846C153ay9pRWxXR3BNYzFFd3ZMUFo3Zzk1QT09" selected>Permitir</option>
                                    <option value="F9B3B5F2A8B08c2tyN0ZmRmVqMTNWRUlhdmZWMFdXZz09">Denegar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="user-delete">Eliminar</label>
                                <select id="user-delete" name="txtuserdelete" class="custom-select custom-select-sm">
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
                <div class="card text-white bg-primary">
                    <div class="card-header text-center"><strong>SUCURSALES</strong></div>
                    <div class="card-body" id="user-sucursales"></div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card text-white bg-success">
                    <div class="card-header text-center"><strong>APLICACIONES Y ROLES</strong></div>
                    <div class="card-body" id="apps-roles"></div>
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
        //let roles = arixshell_download_datos('configuraciones/axconfig_get_roles'); 
        //roles = arixshell_download_datos('configuraciones/axconfig_get_apps'); 
        //roles = arixshell_download_datos('configuraciones/axconfig_get_sucursales');    
        let roles = arixshell_download_datos('configuraciones/axconfig_get_approlsucu');
        //console.log(roles);
        let temp = '';
        for(i=0;i<roles[0].length;i++){
            temp += '<option value="'+roles[0][i].axuid+'">'+roles[0][i].rol+'</option>'
        }        
        for(i=0;i<roles[1].length;i++){
            $('#form-axuser-add #apps-roles').append('<div class="form-group row"><input type="hidden" class="d-none" name="txtuserappid_'+i+'" value="'+roles[1][i].axaid+'" readonly><label for="user-rol-'+i+'" class="col-sm-5 col-form-label"><strong>'+roles[1][i].app+'</strong></label><div class="col-sm-7"><select class="form-control form-control-sm" id="user-rol-'+i+'" name="txtuserapprolid_'+i+'">'+temp+'</select></div></div>');
        }        
        for(i=0;i<roles[2].length;i++){
            $('#form-axuser-add #user-sucursales').append('<div class="form-group row input-group-sm"><input type="hidden" class="d-none" name="txtusersucuid_'+i+'" value="'+roles[2][i].axuidemp+'" readonly><div class="col-sm-3"><select id="user-sucu-'+i+'" name="txtusersucuacssid_'+i+'" class="form-control form-control-sm mt-2"><option value="7F775B1A70BE2bUJseTNVaGhsZEl3SVpoOXVOOUtvUT09">Denegar</option><option value="54F747562B763N0twL3NoSXp0ZmJaSElYYVM5Mi9SUT09">Permitir</option></select></div><label for="user-sucu-'+i+'" class="col-sm-9 col-form-label"><strong>'+roles[2][i].datas+'</strong></label></div>');
        }
        $("#user-sucursales").find('select').first().find("option:contains('Permitir')").prop('selected', true);
        //$("#user-sucursales").find('select').first().val("54F747562B763N0twL3NoSXp0ZmJaSElYYVM5Mi9SUT09");
        //console.log($.md5("LmAedZhiCTueOqm").substring(3, 29));
    })();
    
    arixshell_iniciar_llaves_locales("#btn_id_axusuarios_nuevo");
    arixshell_cargar_botones_menu('btn-guardar, btn-cerrar');
    
    $('#form-axuser-add #user-employee-doc').mask('99999999');
    
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });

    //(1)PARA EL MODAL DE AGREGAR persona
    $("#btn-search-userEmployee").click(function () {     
        let temp = $("#user-employee-doc").val();       
        if(temp.length == 8){
            let request = arixshell_upload_datos('configuraciones/axconfig_duplicate_user', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false                      
            if(request.status==true){
                $('#user-employee-dscrb').val(request.datas).removeClass('d-none');                
                $('#user-employee-id').val(request.axuid);
                $('#user-accountid').val(request.correo).focus();
                $("#btn-restart-userEmployee").removeClass('d-none');
                $("#user-employee-doc").addClass('d-none');
                $(this).addClass('d-none');
            }
            else{
                arixshell_alert_notification('warning','El DNI no pertenece a ningún empleado'); 
                $("#user-employee-doc").val("").focus();
            }
        }else{
            return;
        } 
    });
     //(3) boton reniciar
     $("#btn-restart-userEmployee").click(function () {
        $(this).addClass('d-none');
        $("#user-employee-dscrb").val("").addClass('d-none');
        $("#btn-search-userEmployee").removeClass('d-none');
        $("#user-employee-doc").removeClass('d-none').val("").focus();
    });

    $("#form-axuser-add #user-accountid").blur(function(){
        let request = $(this).val();
        if(request.length >= 8){         
            arixshell_check_duplicate("#form-axuser-add #user-accountid",'configuraciones/axconfig_get_account',arixshell_verify_data(request),'El Correo se encuan registrado. Intente Otra direccion de correo Electrónico');
        }else{
            return;
        }
    });
    $("#form-axuser-add").validate({
        errorClass: "text-danger",
        rules: {
            txtuseremployeedoc:{required: true,maxlength: 8,minlength: 8},
            txtuseremployeedscrb:{required: true,maxlength: 120,minlength: 10},
            txtuseremployeeid:{required: true,maxlength: 120,minlength: 15},
            txtuseraccountid:{required: true,email: true},
            txtuseraccountpass:{required: true,maxlength: 30,minlength: 15}
        }
    })

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-guardar", function(){
        config_sucursales_check();
        if($("#form-axuser-add").valid()){
            let request = arixshell_upload_datos('configuraciones/axconfig_post_axuser_add', $('#form-axuser-add').serialize());
            
            if(request.status==true){
                arixshell_alert_notification('success','El usuario fue creado exitosamente...!');
                arixshell_hacer_pagina_atras();
            }else{
                arixshell_alert_notification('error','Ocurrió un error inesperado, el usuario no fue creado exitosamente...!');
            }
        }else{
            return;
        }
    });
//$(document).ready(function(){
    

   /* $('#form-axuser-add').on('click', '#btn-search-account', function(){
        //alert('pene');
        let request = $('#user-employee-id').val();
        //console.log(request.length);
        if(request.length!=0){
            request = arixshell_upload_datos('configuraciones/axconfig_get_account', 'txtdata='+request+'&');
            $(this).parent().html('');
            $("#user-accountid").val(request.extra).focus();
        }else{
            return;
        }
    });*/

   
   
//}); 
</script>