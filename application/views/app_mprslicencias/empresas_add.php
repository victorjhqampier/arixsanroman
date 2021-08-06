<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-xl-12 col-md-12">
        <form id="form-empr-new-add">
            <div class="card-group">
                <div class="card">
                    <div class="card-header text-center"><strong>Datos de la Empresa de Transportes</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="emp-ruc">R.U.C.</label>                          
                                <input type="text" class="form-control" id="emp-ruc" name="txtruc" placeholder="RUC de la empresa">                                
                            </div>
                            <div class="form-group col-md-8">
                                <!--label for="emp-telefonos">Administrador</label>
                                <input type="text" class="form-control" id="emp-mamanger" name="txtmanager" placeholder="DNI del administrador"-->
                                <label for="emp-telefonos">Administrador</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="DNI del administrador" aria-label="Recipient's username" aria-describedby="basic-addon2" id="emp-mamanger" name="txtmanager">
                                    <div class="input-group-append">
                                        <!--a href="javascript:;" class="btn btn-outline-secondary" type="button" id="btn-search-people"><i class="fa fa-search"></i></a-->
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-people"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label for="emp-ruc">R.U.C.</label>                           
                            <input type="text" class="form-control col-sm-6" id="emp-ruc" name="txtruc" placeholder="RUC de la empresa">                        
                        </div-->
                        <div class="form-group input-group-sm">
                            <label for="emp-rsocial">Razon Social</label>
                            <input type="text" class="form-control" id="emp-rsocial" name="txtrsocial" placeholder="Razon social de la empresa"> </div>
                        <div class="form-group input-group-sm">
                            <label for="emp-nombre">Nombre Comercial</label>
                            <input type="text" class="form-control" id="emp-nombre" name="txtnombre" placeholder="Nombre comercial de la empresa"> </div>
                        <div class="form-group input-group-sm">
                            <label for="emp-direccion">Dirección Fiscal</label>
                            <input type="text" class="form-control" id="emp-direccion" name="txtdireccion" placeholder="Dirección fiscal de la empresa"> </div>
                        <div class="form-group">
                            <label for="emp-telefonos">Teléfonos</label>
                            <input type="text" class="form-control form-control-sm" id="emp-telefonos" name="txttelefonos" placeholder="Teléfonos de la empresa"> </div>
                        <div class="form-group">
                            <input type="hidden" class="d-none" id="emp-adminname" name="txtadminkey">
                        </div>
                    </div>
                    <div class="card-footer"> <small class="text-muted">El ruc se comprobará para evitar duplicidad</small> </div>
                </div>
                <div class="card">
                    <div class="card-header text-center"><strong>Datos de la Autorización</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-nresolucion">Número de Resolución</label>
                                <input type="text" class="form-control" id="aut-nresolucion" name="txtnresolucion" placeholder="Número de resolución"> </div>
                            <div class="form-group col-md-6">
                                <label for="aut-cresolucion">Clase de Resolución</label>
                                <select id="aut-cresolucion" name="txtcresolucion" class="form-control">
                                    <option value="Resolucion de tipo -R1" selected>Resolucion de tipo -R1</option>
                                    <option value="Resolucion de tipo -R2" >Resolucion de tipo -R2</option>
                                    <option value="Resolucion de tipo -R3" >Resolucion de tipo -R3</option>
                                    <option value="Resolucion de tipo -R4" >Resolucion de tipo -R4</option>
                                    <option value="Resolucion de tipo -R5" >Resolucion de tipo -R5</option>
                                    <option value="Resolucion de tipo -R6" >Resolucion de tipo -R6</option>
                                    <option value="Resolucion de tipo -R7" >Resolucion de tipo -R7</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-modalidad">Modalidad se servicio</label>
                                <select id="aut-modalidad" name="txtmodalidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-tunidad">Tipo de Unidad</label>
                                <select id="aut-tunidad" name="txtunidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="aut-horarios">Horarios</label>
                                <input type="text" class="form-control form-control-sm" id="aut-horarios" name="txthorarios" placeholder="Horarios"> </div>
                            <div class="form-group col-md-5">
                                <label for="aut-frecuencia">Frecuencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-frecuencia" name="txtfrecuencia" placeholder="Frecuencia"> </div>
                            <div class="form-group col-md-2">
                                <label for="aut-flota">Flota</label>
                                <input type="number" class="form-control form-control-sm" id="aut-flota" name="txtflota" placeholder="Flota" value="10"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-finicio">Fecha de inicio de vigencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-finicio" name="txtfinicio" placeholder="Fecha de inicio de vigencia"> </div>
                            <div class="form-group col-md-6">
                                <label for="aut-ffinal">Fecha de vencimiento</label>
                                <select id="aut-ffinal" name="txtffinal" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-rinicio">Paradero Inicio</label>
                                <textarea class="form-control" id="aut-rinicio" name="txtrinicio" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-rfinal">Paradero Retorno</label>
                                <textarea class="form-control" id="aut-rfinal" name="txtrfinal" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 mt-2">
            <div class="alert alert-dark text-center" role="alert">
                <button class="btn btn-success" id="btn-enviar-empadd">Guardar</button>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    arixshell_iniciar_llaves_locales("#btn_id_empresas_nuevo");
    arixshell_cargar_botones_menu('btn-cerrar');    
    $('#form-empr-new-add #emp-ruc').mask('99999999999');
    $('#form-empr-new-add #aut-finicio').mask('00/00/0000');
    $('#form-empr-new-add #emp-ruc').focus();
    //$('#form-usuario-sucursal #select-permiso').selectpicker();//inicializa la multiple seleccion
    $(arixshell_cargar_llave_local(1)+' .card').on("click", "button", function() {//click unico en la página
        let a = $(this).closest('div').attr('id');
        alert('-> '+a);
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
        //arixshell_hacer_pagina_reiniciar();
    });

    function mpsradd_get_emp(ruc){
       let request = arixshell_download_datos('https://dniruc.apisperu.com/api/v1/ruc/'+ruc+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaG5hbGFtdXNAZ21haWwuY29tIn0.afUd28wIqmAoFV9CbIu9JZcIRynhCi1t1P--Sru3kRY');
        if (request['ruc']== ruc){
            $("#form-empr-new-add #emp-rsocial").val(request.razonSocial);
            $("#form-empr-new-add #emp-nombre").val(request.nombreComercial);
            $("#form-empr-new-add #emp-direccion").val(request.direccion+' '+request.distrito+' '+request.provincia+' '+request.departamento);
        }else{
            return;
        }
    }
    //const hoy = new Date();
    //console.log(formatoFecha(hoy, 'dd/mm/yy'));
    arixshell_cargar_opciones('#form-empr-new-add #aut-modalidad','mpsrlicencias/mpsr_get_modalidad');    
    //mpsr_cargar_opciones('#form-empr-new-add #aut-categoria','mpsrlicencias/mpsr_get_categoria', '<option selected>Escoja...</option>');
    mpsr_subir_fechas('#form-empr-new-add #aut-finicio',true);
    mpsr_subir_fechas('#form-empr-new-add #aut-ffinal',6);
    arixshell_cargar_opciones('#form-empr-new-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad');
    /*$('#form-empr-new-add #aut-categoria').change(function(){
        let r = $(this).val();
        mpsr_subir_opciones('#form-empr-new-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad', 'txtdata='+r+'&');
    });*/
    $("#form-empr-new-add").validate({
        errorClass: "text-danger",
        rules: {
            txtruc: {
                required: true,
                maxlength: 11,
                minlength: 11
            },
            txtrsocial: {
                required: true,
                maxlength: 150,
                minlength: 7
            },
            txtnombre: {
                required: true,
                maxlength: 150,
                minlength: 4
            },
            txtdireccion: {
                required: true,
                maxlength: 150,
                minlength: 7
            },
            txttelefonos: {
                required: true,
                maxlength: 150,
                minlength: 7
            },
            txtnresolucion: {
                required: true,
                maxlength: 80,
                minlength: 5
            },
            txtcresolucion: {
                required: true
            },
            txtmodalidad: {
                required: true,                
            },
            txtcategoria: {
                required: true,
            },
            txtunidad: {
                required: true,
            },
            txthorarios: {
                required: true,
                maxlength: 80,
                minlength: 7
            },
            txtfrecuencia: {
                required: true,
                maxlength: 80,
                minlength: 7
            },
            txtflota: {
                required: true,
                maxlength: 3,
                minlength: 1
            },
            txtfinicio: {
                required: true,
                maxlength: 10,
                minlength: 6
            },
            txtffinal: {
                required: true,
            },
            txtrinicio: {
                required: true,
                minlength: 5
            },
            txtrfinal: {
                required: true,
                minlength: 5
            },
            txtmanager: {
                required: true,
                minlength: 8
            },
            txtadminkey: {
                required: true,
                minlength: 14
            }
        }
    })
    
    $("#btn-enviar-empadd").click(function () {     
        if($("#form-empr-new-add").valid()){
            //console.log($('#form-empr-new-add').serialize());
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_emprmpsr', $('#form-empr-new-add').serialize());

            if(request['status']===true){//el servidor siempre responde con un obejeto
                arixshell_notification_alert('success','Guardado correctamente...');
                arixshell_hacer_pagina_atras();
                //alert('correecto ...!');
            }
            else{
                alert('Lo sentimos, los datos no fueron guardados ...!');
                arixshell_hacer_pagina_atras();
            }
        }
        else{
            return;
        }
    });
    $('#form-empr-new-add #emp-mamanger').keypress(function (a) {
        13 == a.which && $("#form-empr-new-add #btn-search-people").click()
    });
    //boton para buscar administrador
    $("#form-empr-new-add #btn-search-people").click(function () {
        let temp = $("#form-empr-new-add #emp-mamanger").val();
        if(temp.length==8){//si es falso, entonces no hay duplicidad
        let request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $('#form-empr-new-add #emp-mamanger').val(request['data']);
                $('#form-empr-new-add #emp-adminname').val(request['id']);
            }else{
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);
                arixshell_abrir_modalbase('Nuevo Usuario','arixapi/arixapi_get_form_person','btn-cerrar-modalNewUser');
                //return;
            }
        }else{
            return;
        }        
    });
    //ojo en el boton que hace click
    $(document).on('click', '#btn-cerrar-modalNewUser', function(){
        let infor = arixshell_read_cache_serial('e0x005477arixNewUser');//otorgado por eldesarrollador del formulario anterior
        if(infor!==null){
            $('#form-empr-new-add #emp-mamanger').val(infor['data']);
            $('#form-empr-new-add #emp-adminname').val(infor['id']);
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });

    $("#form-empr-new-add #emp-ruc").blur(function(){
        let data = request = $(this).val();
        //request.length == 11 ? request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateru', 'txtdata='+request+'&') : request['status']=true;
        if(request.length == 11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateru', 'txtdata='+request+'&');
            if(request['status']==false){
                mpsradd_get_emp(data);
                $("#form-empr-new-add #emp-ruc").addClass('is-valid');
            }else{
                arixshell_notification_alert('warning','La empresa (RUC) se encuntra registrada ...');
                $("#form-empr-new-add #emp-ruc").val("");
                $("#form-empr-new-add #emp-ruc").removeClass('is-valid');            
            }
        }else{
            return;
        }        
        
    });
    $("#form-empr-new-add #aut-nresolucion").blur(function(){
        let request = $(this).val();
        if(request.length > 11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateres', 'txtdata='+request+'&');
            if(request['status']==false){
            $("#form-empr-new-add #aut-nresolucion").addClass('is-valid');
            }else{
                arixshell_notification_alert('warning','El número de resolución se encuntra registrada ...');
                $("#form-empr-new-add #aut-nresolucion").val("");
                $("#form-empr-new-add #aut-nresolucion").removeClass('is-valid');            
            }
        }else{
            return;
        }
        //request.length > 11 ? request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateres', 'txtdata='+request+'&') : request['status']=true;
        //request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateres', 'txtdata='+request+'&');
        //console.log(request);
        
    });
    //si ago click en el modal y el nombre que aparece
    /*$('#arixgeneralmodal tbody').on("click", "tr", function() {
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        //alert($(this).attr('odd'));
        alert('carajo');
    });*/
});
</script>