<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-xl-12 col-md-12">
        <form id="form-contrato-new-add">
            <div class="card-group">
                <div class="card">
                    <div class="card-header text-center"><strong>Contrato</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cont-number">N° Contrato</label>                          
                                <input type="text" class="form-control" id="cont-number" name="txtcontnumber" placeholder="Número de contrato">                                
                            </div>                            
                            <div class="form-group col-md-8">                                
                                <label for="cont-employee-doc">Empleado</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cont-employee-doc" name="txtcontemployeedoc" placeholder="DNI del empleado">
                                    <input type="text" class="form-control d-none" id="cont-employee-dscrb" name="txtcontemployeedscrb" readonly>
                                    <div class="input-group-append">                                        
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-contEmployee"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-contEmployee"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="cont-employee-id" name="txtcontemployeeid" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cont-finicio">Fecha de inicio</label>
                                <input type="text" class="form-control form-control-sm" id="cont-finicio" name="txtcontfinicio" placeholder="Fecha de inicio de vigencia">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cont-fin">Fecha límite de contrato</label>
                                <input type="text" class="form-control form-control-sm" id="cont-fin" name="txtcontfin" placeholder="Fecha de inicio de vigencia">
                            </div>                            
                        </div>                        
                    </div>
                    <div class="card-footer"> <small class="text-muted">Se probará el número de contrato</small> </div>
                </div>
                <div class="card">
                    <div class="card-header text-center"><strong>Responsabilidad</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cont-sucursal">Oficina (Sucursal)</label>
                                <select id="cont-sucursal" name="txtcontsucursal" class="form-control">
                                    <option value="Resolucion de tipo -R1" selected>Elija...</option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cont-area">Área</label>
                                <select id="cont-area" name="txtcontarea" class="form-control">
                                    <option value="Resolucion de tipo -R1" selected>Elija...</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cont-cargo">Cargo</label>
                                <select id="cont-cargo" name="txtcontcargo" class="form-control form-control-sm">
                                    <option selected>Elija...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_empleados_form");
    arixshell_cargar_botones_menu('btn-guardar,btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    $('#form-contrato-new-add #cont-employee-doc').mask('99999999');
    $('#form-contrato-new-add #cont-finicio').mask('00/00/0000');
    $('#form-contrato-new-add #cont-fin').mask('00/00/0000');
    $('#form-contrato-new-add #cont-number').focus();

    arixshell_cargar_opciones('#form-contrato-new-add #cont-sucursal','configuraciones/axconfig_get_sucursales').then(function(){
        let dep = $("#cont-sucursal option:eq(0)").attr("selected", "selected").val();
        arixshell_subir_opciones('#form-contrato-new-add #cont-area','configuraciones/axconfig_get_areas_bysuc', 'txtdata='+dep+'&');
    });
    arixshell_cargar_opciones('#form-contrato-new-add #cont-cargo','configuraciones/axconfig_get_puestos');
    $('#form-contrato-new-add #cont-sucursal').change(function(){
        let r = $(this).val();
        arixshell_subir_opciones('#form-contrato-new-add #cont-area','configuraciones/axconfig_get_areas_bysuc', 'txtdata='+r+'&');
    });

    //(1)PARA EL MODAL DE AGREGAR persona
    $("#btn-search-contEmployee").click(function () {     
        let temp = $("#cont-employee-doc").val();
        if(temp.length == 8){
            let request = arixshell_upload_datos('configuraciones/axconfig_duplicate_employee', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false
            if(request.status==true){//ya existe en la base de datos
                $('#cont-employee-dscrb').val(request.data).removeClass('d-none');                
                $('#cont-employee-id').val(request.id);
                $("#btn-restart-contEmployee").removeClass('d-none');
                $("#cont-employee-doc").addClass('d-none');
                $(this).addClass('d-none');
            }else if(request.status==false){
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PERSONA','arixapi/arixapi_get_form_person','btn-modalNewUser-forDriver');
            }
            else{
                arixshell_alert_notification('warning','La persona se encuntra registrada ...'); 
                $("#cont-employee-doc").val("");
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR persona
    $(document).on('click', '#btn-modalNewUser-forDriver', function(){
        let request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $('#cont-employee-dscrb').val(request['data']).removeClass('d-none');                
            $('#cont-employee-id').val(request['id']);
            $("#btn-restart-contEmployee").removeClass('d-none');
            $("#cont-employee-doc").addClass('d-none');
            $('#btn-search-contEmployee').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    //(3) boton reniciar
    $("#btn-restart-contEmployee").click(function () {
        $(this).addClass('d-none');
        $("#cont-employee-dscrb").val("").addClass('d-none');
        $("#btn-search-contEmployee").removeClass('d-none');
        $("#cont-employee-doc").removeClass('d-none').val("").focus();
    });
    $("#form-contrato-new-add #cont-number").blur(function(){
        let request = $(this).val();
        if(request.length >= 8 && request.length <= 15){         
            arixshell_check_duplicate("#form-contrato-new-add #cont-number",'configuraciones/axconfig_check_duplicate_cont',request);
        }else{
            $("#per-form-base #per-dni").val("");
        }
    });
    $("#form-contrato-new-add").validate({
        errorClass: "text-danger",
        rules: {
            txtcontnumber:{required: true,maxlength: 15,minlength: 8},
            txtcontemployeedoc:{required: true,maxlength: 8,minlength: 8},
            txtcontemployeedscrb:{required: true,maxlength: 200,minlength: 11},
            txtcontemployeeid:{required: true,maxlength: 120,minlength: 11},
            txtcontfinicio:{required: true,maxlength: 10,minlength: 10},
            txtcontfin:{required: true,maxlength: 10,minlength: 10},
            txtcontsucursal:{required: true},
            txtcontarea:{required: true},
            txtcontcargo:{required: true}
        }
    })

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-guardar", function() {
        //console.log($('#form-contrato-new-add').serialize());
        if($("#form-contrato-new-add").valid()){
            let request = arixshell_upload_datos('configuraciones/axconfig_post_employee', $('#form-contrato-new-add').serialize());
            if(request['status']===true){//el servidor siempre responde con un obejeto
                arixshell_alert_notification('success','Guardado correctamente...');
                arixshell_hacer_pagina_atras();
            }
            else{
                //alert('Lo sentimos, los datos no fueron guardados ...!');
                arixshell_alert_notification('error','Lo sentimos, no pudimos guardar los datos...');
                //arixshell_hacer_pagina_atras();
            }
        }
        else{
            return;
        }
    });
    

//$(document).ready(function(){
       
    /*$('#form-contrato-new-add #cont-number').mask('99999999999');
    $('#form-contrato-new-add #aut-finicio').mask('00/00/0000');
    $('#form-contrato-new-add #cont-number').focus();
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
            $("#form-contrato-new-add #emp-rsocial").val(request.razonSocial);
            $("#form-contrato-new-add #emp-nombre").val(request.nombreComercial);
            $("#form-contrato-new-add #emp-direccion").val(request.direccion+' '+request.distrito+' '+request.provincia+' '+request.departamento);
        }else{
            return;
        }
    }
    //const hoy = new Date();
    //console.log(formatoFecha(hoy, 'dd/mm/yy'));
    arixshell_cargar_opciones('#form-contrato-new-add #aut-modalidad','mpsrlicencias/mpsr_get_modalidad');    
    //mpsr_cargar_opciones('#form-contrato-new-add #aut-categoria','mpsrlicencias/mpsr_get_categoria', '<option selected>Escoja...</option>');
    mpsr_subir_fechas('#form-contrato-new-add #aut-finicio',true);
    mpsr_subir_fechas('#form-contrato-new-add #aut-ffinal',6);
    arixshell_cargar_opciones('#form-contrato-new-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad');
    $('#form-contrato-new-add #aut-categoria').change(function(){
        let r = $(this).val();
        mpsr_subir_opciones('#form-contrato-new-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad', 'txtdata='+r+'&');
    });*/
   /* $("#form-contrato-new-add").validate({
        errorClass: "text-danger",
        rules: {
            txtcontnumber: {
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
        if($("#form-contrato-new-add").valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_emprmpsr', $('#form-contrato-new-add').serialize());

            if(request['status']===true){//el servidor siempre responde con un obejeto
                arixshell_alert_notification('success','Guardado correctamente...');
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
    $('#form-contrato-new-add #emp-mamanger').keypress(function (a) {
        13 == a.which && $("#form-contrato-new-add #btn-search-people").click()
    });
    $("#form-contrato-new-add #btn-search-people").click(function () {
        let temp = $("#form-contrato-new-add #emp-mamanger").val();
        if(temp.length==8){//si es falso, entonces no hay duplicidad
        let request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $('#form-contrato-new-add #emp-mamanger').val(request['data']);
                $('#form-contrato-new-add #emp-adminname').val(request['id']);
            }else{
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);
                arixshell_abrir_modalbase('Nuevo Usuario','arixapi/arixapi_get_form_person','btn-cerrar-modalNewUser');
                //return;
            }
        }else{
            return;
        }        
    });
    $(document).on('click', '#btn-cerrar-modalNewUser', function(){
        let infor = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(infor!==null){
            $('#form-contrato-new-add #emp-mamanger').val(infor['data']);
            $('#form-contrato-new-add #emp-adminname').val(infor['id']);
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });

    $("#form-contrato-new-add #cont-number").blur(function(){
        let data = request = $(this).val();
        if(request.length == 11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateru', 'txtdata='+request+'&');
            if(request['status']==false){
                mpsradd_get_emp(data);
                $("#form-contrato-new-add #cont-number").addClass('is-valid');
            }else{
                arixshell_alert_notification('warning','La empresa (RUC) se encuntra registrada ...');
                $("#form-contrato-new-add #cont-number").val("");
                $("#form-contrato-new-add #cont-number").removeClass('is-valid');            
            }
        }else{
            return;
        }        
        
    });
    $("#form-contrato-new-add #aut-nresolucion").blur(function(){
        let request = $(this).val();
        if(request.length > 11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateres', 'txtdata='+request+'&');
            if(request['status']==false){
            $("#form-contrato-new-add #aut-nresolucion").addClass('is-valid');
            }else{
                arixshell_alert_notification('warning','El número de resolución se encuntra registrada ...');
                $("#form-contrato-new-add #aut-nresolucion").val("");
                $("#form-contrato-new-add #aut-nresolucion").removeClass('is-valid');            
            }
        }else{
            return;
        }
        
    });
});*/
</script>