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
                                <label for="product-barcode">Código de Barras</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="product-barcode" name="txtcontnumber" placeholder="Código Barras" />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-random"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="product-stock">Stock Inicial</label>
                                <input type="number" class="form-control form-control-lg" id="product-stock" name="txtproductstock" placeholder="Stock" value="0" />
                            </div>
                            <!--div class="form-group col-md-8">
                                <label for="pro-proveedor-doc">Nombre</label>
                                <div class="input-group input-group-prepend">
                                    <input type="text" class="form-control" id="pro-proveedor-doc" name="txtproveedordoc" placeholder="DNI del empleado" />
                                    <input type="text" class="form-control d-none" id="cont-proveedor-dscrb" name="txtproveedordscrb" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-proveedor"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-proveedor"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="cont-proveedor-id" name="txtproveedorid" readonly />
                                </div>
                            </div-->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="product-name">Nombre del producto</label>
                                <input type="text" class="form-control" id="product-name" name="txtproductname" placeholder="Nombre del producto" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="product-preciounit">P. Venta</label>
                                <input type="text" class="form-control" id="product-preciounit" name="txtproductpriseunit" placeholder="Precio" value="1.50" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="product-description">Descripción</label>
                                <input type="text" class="form-control form-control-sm" id="product-description" name="txtproductdescription" placeholder="Escriba alguna descripción" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="product-compraunit">P. Compra</label>
                                <input type="text" class="form-control form-control-sm" id="product-compraunit" name="txtproductcompraunit" placeholder="Compra" value="0.0" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-primary">
                    <div class="card-header text-center"><strong>ORIGEN</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pro-proveedor-doc">Proveedor (*)</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="pro-proveedor-doc" name="txtproveedordoc" placeholder="Documento del Proveedor" />
                                    <input type="text" class="form-control d-none" id="cont-proveedor-dscrb" name="txtproveedordscrb" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="btn-search-proveedor"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-secondary d-none" type="button" id="btn-restart-proveedor"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="cont-proveedor-id" name="txtproveedorid" readonly />
                                    <input type="hidden" class="d-none" id="img-product-id" name="txtimgproductid" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="product-unidadme">Unidad De medida</label>
                                        <select id="product-unidadme" name="txtunidadme" class="form-control">
                                            <option value="Resolucion de tipo -R1" selected>Elija...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="product-cat">Categoría</label>
                                        <select id="product-cat" name="txtproductcat" class="form-control form-control-sm">
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
                                <label>Imagen (*)</label>
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
    $("#form-product-new-add #product-barcode").focus();
    $('#form-product-new-add #product-barcode').keypress(function (a) {
        13 == a.which && $("#product-name").focus();
    });
    $("#product-preciounit").mask("#####.00",{reverse:true});
    $("#product-stock").mask("09999");
    $('#form-product-new-add #pro-proveedor-doc').mask('99999999999');
    
    arixshell_cargar_opciones('#form-product-new-add #product-unidadme','inventario/productos_get_metric');
    arixshell_cargar_opciones('#form-product-new-add #product-cat','inventario/productos_get_category');
    
    $("#form-product-new-add #product-barcode").blur(function(){
        let request = $(this).val();
        //console.log(request);     
        if(request.length > 5 && request.length < 20){
            request = arixshell_upload_datos('inventario/productos_duplicate_check', 'txtdata='+request+'&');
            if(request.status==false){                
                $(this).addClass('is-valid');
            }else{
                arixshell_alert_notification('warning','El código de barras ya se encuentra asociado a un producto');
                $(this).val("");
                $(this).removeClass('is-valid');            
            }
        }else{
            return;
        }
    });
    $("#form-product-new-add #product-stock").change(function(){
        let request = parseInt($(this).val());        
        //console.log(request);     
        if(request > 0){
            $("#form-product-new-add #product-compraunit").prop('readonly',false);
        }else{
            $("#form-product-new-add #product-compraunit").prop('readonly',true).val("0.0");
        }
    });
    //(1)PARA EL MODAL DE AGREGAR persona
    $("#btn-search-proveedor").click(function () {     
        let temp = $("#pro-proveedor-doc").val();
        //console.log(temp);
        if(temp.length == 8 || temp.length==11){
            let request = arixshell_upload_datos('arixapi/entidades_get_duplicate', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false
            //console.log(request);
            if(request.status==true){//ya existe en la base de datos
                $('#cont-proveedor-dscrb').val(request.data).removeClass('d-none');                
                $('#cont-proveedor-id').val(request.id);
                $("#btn-restart-proveedor").removeClass('d-none');
                $("#pro-proveedor-doc").addClass('d-none');
                $(this).addClass('d-none');
            }else {
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PROVEEDOR','arixapi/arixapi_get_form_person','btn-modalNewUser-forprovvedor');
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR persona
    $(document).on('click', '#btn-modalNewUser-forprovvedor', function(){
        let request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $('#cont-proveedor-dscrb').val(request['data']).removeClass('d-none');                
            $('#cont-proveedor-id').val(request['id']);
            $("#btn-restart-proveedor").removeClass('d-none');
            $("#pro-proveedor-doc").addClass('d-none');
            $('#btn-search-proveedor').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    //(3) boton reniciar
    $("#btn-restart-proveedor").click(function () {
        $(this).addClass('d-none');
        $("#cont-proveedor-dscrb").val("").addClass('d-none');
        $("#btn-search-proveedor").removeClass('d-none');
        $("#pro-proveedor-doc").removeClass('d-none').val("").focus();
    });


    /*$('#form-product-new-add #pro-proveedor-doc').mask('99999999');
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
    $("#btn-search-proveedor").click(function () {     
        let temp = $("#pro-proveedor-doc").val();
        if(temp.length == 8){
            let request = arixshell_upload_datos('configuraciones/axconfig_duplicate_employee', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false
            if(request.status==true){//ya existe en la base de datos
                $('#cont-proveedor-dscrb').val(request.data).removeClass('d-none');                
                $('#cont-proveedor-id').val(request.id);
                $("#btn-restart-proveedor").removeClass('d-none');
                $("#pro-proveedor-doc").addClass('d-none');
                $(this).addClass('d-none');
            }else if(request.status==false){
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('AGREGAR NUEVO PERSONA','arixapi/arixapi_get_form_person','btn-modalNewUser-forprovvedor');
            }
            else{
                arixshell_alert_notification('warning','La persona se encuntra registrada ...'); 
                $("#pro-proveedor-doc").val("");
            }
        }else{
            return;
        } 
    });
    //(2)PARA EL MODAL DE AGREGAR persona
    $(document).on('click', '#btn-modalNewUser-forprovvedor', function(){
        let request = arixshell_read_cache_serial('e0x005477arixNewUser');
        if(request!==null){
            $('#cont-proveedor-dscrb').val(request['data']).removeClass('d-none');                
            $('#cont-proveedor-id').val(request['id']);
            $("#btn-restart-proveedor").removeClass('d-none');
            $("#pro-proveedor-doc").addClass('d-none');
            $('#btn-search-proveedor').addClass('d-none');
            arixshell_cerrar_modalbase();    
        }else{
            arixshell_cerrar_modalbase();
        }
    });
    //(3) boton reniciar
    $("#btn-restart-proveedor").click(function () {
        $(this).addClass('d-none');
        $("#cont-proveedor-dscrb").val("").addClass('d-none');
        $("#btn-search-proveedor").removeClass('d-none');
        $("#pro-proveedor-doc").removeClass('d-none').val("").focus();
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
            txtproveedordoc:{required: true,maxlength: 8,minlength: 8},
            txtproveedordscrb:{required: true,maxlength: 200,minlength: 11},
            txtproveedorid:{required: true,maxlength: 120,minlength: 11},
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