<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <form id="form-product-new-add">
            <div class="card-group">
                <div class="card text-white bg-info">
                    <div class="card-header text-center"><strong>PRODUCTO</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="prod-barcode">Código de Barras</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="prod-barcode" name="txtcontnumber" placeholder="Código Barras" />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" onclick="config_loadPwd('#form-axuser-add #user-accountpass');">
                                            <i class="fa fa-random"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cont-finicio">Stock Inicial</label>
                                <input type="number" class="form-control form-control-lg" id="cont-finicio" name="txtcontfinicio" placeholder="Fecha de inicio de vigencia" value="0" />
                            </div>
                            <!--div class="form-group col-md-8">
                                <label for="cont-employee-doc">Nombre</label>
                                <div class="input-group input-group-prepend">
                                    <input type="text" class="form-control" id="cont-employee-doc" name="txtcontemployeedoc" placeholder="DNI del empleado" />
                                    <input type="text" class="form-control d-none" id="cont-employee-dscrb" name="txtcontemployeedscrb" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-contEmployee"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-contEmployee"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="cont-employee-id" name="txtcontemployeeid" readonly />
                                </div>
                            </div-->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="cont-finicio">Nombre del producto</label>
                                <input type="text" class="form-control" id="cont-finicio" name="txtcontfinicio" placeholder="Nombre del producto" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cont-finicio">Precio U.</label>
                                <input type="text" class="form-control" id="cont-finicio" name="txtcontfinicio" placeholder="Precio Unitario" value="1.0" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cont-finicio">Descripción</label>
                                <input type="text" class="form-control form-control-sm" id="cont-finicio" name="txtcontfinicio" placeholder="Escriba alguna descripción" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-primary">
                    <div class="card-header text-center"><strong>Responsabilidad</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cont-employee-doc">Proveedor</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="cont-employee-doc" name="txtcontemployeedoc" placeholder="Documento del Proveedor" />
                                    <input type="text" class="form-control d-none" id="cont-employee-dscrb" name="txtcontemployeedscrb" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="btn-search-contEmployee"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-secondary d-none" type="button" id="btn-restart-contEmployee"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="cont-employee-id" name="txtcontemployeeid" readonly />
                                    <input type="text" class="" id="img-product-id" name="txtimgproductid" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">                           

                            <div class="col-xl-9 col-md-9">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="cont-area">Unidad De medida</label>
                                        <select id="cont-area" name="txtcontarea" class="form-control">
                                            <option value="Resolucion de tipo -R1" selected>Elija...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="cont-area">Categoría</label>
                                        <select id="cont-area" name="txtcontarea" class="form-control form-control-sm">
                                            <option value="Resolucion de tipo -R1" selected>Elija...</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xl-3 col-md-3">
                                    <style>
                                        .ax-image_area {
                                            position: relative;
                                        }
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
                                <label>Imagen</label>
                                <div class="ax-image_area">                                    
                                    <label for="ax-img-input">
                                        <img src="public/apps/img/axproduct616254ad988f2.png" id="uploaded_image" class="img-responsive img-thumbnail" style="display: block; max-width: 100%;" />
                                        <div class="axoverlay">
                                            <div class="axtext">Agregar</div>
                                        </div>
                                        <input type="file" name="image" class="image d-none" id="ax-img-input" />
                                    </label>
                                </div>
                            </div>                                                  
                        
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_empleados_form");
    arixshell_cargar_botones_menu('btn-guardar,btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    //datos obligatorios y necesarios
    var axEventUrl=null;
    var saveInputData = '#form-product-new-add #img-product-id';
    var saveImgData = '#form-product-new-add #uploaded_image';
    var saveImgDirectory = 'public/apps/img/';
    $('#ax-img-input').change(function(event){      
        let files = event.target.files;
		if(files && files.length > 0){
			reader = new FileReader();
			reader.onload = function(event){
                axEventUrl = reader.result;
                //sin btns-lo hacepta
                arixshell_abrir_modalbase('Agregar Imagen de Producto','arixapi/arixapi_get_form_image');
			};
			reader.readAsDataURL(files[0]);
		}		
    });
    


    /*$('#form-product-new-add #cont-employee-doc').mask('99999999');
    $('#form-product-new-add #cont-finicio').mask('00/00/0000');
    $('#form-product-new-add #cont-fin').mask('00/00/0000');
    $('#form-product-new-add #prod-barcode').focus();

    arixshell_cargar_opciones('#form-product-new-add #cont-sucursal','configuraciones/axconfig_get_sucursales').then(function(){
        let dep = $("#cont-sucursal option:eq(0)").attr("selected", "selected").val();
        arixshell_subir_opciones('#form-product-new-add #cont-area','configuraciones/axconfig_get_areas_bysuc', 'txtdata='+dep+'&');
    });
    arixshell_cargar_opciones('#form-product-new-add #cont-cargo','configuraciones/axconfig_get_puestos');
    $('#form-product-new-add #cont-sucursal').change(function(){
        let r = $(this).val();
        arixshell_subir_opciones('#form-product-new-add #cont-area','configuraciones/axconfig_get_areas_bysuc', 'txtdata='+r+'&');
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
    $("#form-product-new-add #prod-barcode").blur(function(){
        let request = $(this).val();
        if(request.length >= 8 && request.length <= 15){         
            arixshell_check_duplicate("#form-product-new-add #prod-barcode",'configuraciones/axconfig_check_duplicate_cont',request);
        }else{
            $("#per-form-base #per-dni").val("");
        }
    });
    $("#form-product-new-add").validate({
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
        //console.log($('#form-product-new-add').serialize());
        if($("#form-product-new-add").valid()){
            let request = arixshell_upload_datos('configuraciones/axconfig_post_employee', $('#form-product-new-add').serialize());
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
    });*/
</script>