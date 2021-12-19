<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <form id="form-product-new-add">
            <div class="card-group">
                <div class="card text-white bg-primary">
                    <div class="card-header text-center"><strong>PRODUCTO</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="product-stock">Sumar al stock</label>
                                <input type="number" class="form-control form-control-lg" id="product-stock" name="txtproductstock" placeholder="Stock" value="0" />
                            </div>
                            <div class="form-group col-md-9">
                                <label for="product-barcode">Código de Barras</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="product-barcode" name="txtcontnumber" placeholder="Código Barras" />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" id="btn-search-barcode" type="button">
                                            <i class="fa fa-random"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="product-name">Nombre del producto</label>
                                <input type="text" class="form-control" id="product-name" name="txtproductname" placeholder="Nombre del producto" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="product-preciounit">P.U. Venta</label>
                                <input type="text" class="form-control" id="product-preciounit" name="txtproductpriseunit" placeholder="Precio" value="1.50" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="product-description">Descripción</label>
                                <input type="text" class="form-control form-control-sm" id="product-description" name="txtproductdescription" placeholder="Escriba alguna descripción" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="product-compraunit">P.U. Compra</label>
                                <input type="text" class="form-control form-control-sm" id="product-compraunit" name="txtproductcompraunit" placeholder="Compra" value="0.00"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-info">
                    <div class="card-header text-center"><strong>ORIGEN</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" class="d-none" id="cont-producto-id" name="txtproductoid" readonly />
                                <label for="pro-proveedor-doc">Proveedor (*)</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="pro-proveedor-doc" name="txtproveedordoc" placeholder="Documento del Proveedor" />
                                    <input type="text" class="form-control d-none" id="cont-proveedor-dscrb" name="txtproveedordscrb" readonly />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="btn-search-proveedor"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-secondary d-none" type="button" id="btn-restart-proveedor"><i class="fa fa-times"></i></button>
                                    </div>                                    
                                    <input type="hidden" class="d-none" id="cont-proveedor-id" name="txtproveedorid" readonly />
                                    <input type="hidden" class="d-none" id="img-product-id" name="txtimgproductid" value="axproduct616254ad988f2.png" readonly/>
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
                                        <img src="" id="uploaded_image" class="img-responsive img-thumbnail" style="display: block; max-width: 100%;" />
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
    arixshell_iniciar_llaves_locales("#btn_editar_productos_form");
    arixshell_cargar_botones_menu('btn-guardar,btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    //datos obligatorios y necesarios
    var axautoload=null;
    (function(){
        let autoload = arixshell_read_cache_serial('e0x005477arixNewUser');        
        if(autoload.id){
            $("#cont-producto-id").val(autoload.id);         
            autoload = arixshell_upload_datos('restinventario/productos_get_one', 'txtdata='+autoload.id+'&');
            if (autoload.status){
                axautoload = {'barcode':autoload.barcode,'unidad':autoload.unidad,'categoria':autoload.categoria};
                //console.log(autoload);
                $("#product-barcode").val(autoload.barcode).focus();
                $("#product-description").val(autoload.descripcion);
                $("#uploaded_image").prop("src","public/apps/img/"+autoload.image);
                $("#img-product-id").val(autoload.image);                              
                $("#product-name").val(autoload.producto);
                $("#product-preciounit").val(autoload.pventa);
                $("#product-compraunit").val(autoload.pcompra);
                if(autoload.axid){
                    $('#cont-proveedor-dscrb').val(autoload.proveedor).removeClass('d-none');             
                    $('#cont-proveedor-id').val(autoload.axid);
                    $("#btn-restart-proveedor").removeClass('d-none');
                    $("#pro-proveedor-doc").addClass('d-none');
                    $("#btn-search-proveedor").addClass('d-none');                    
                }
            }
        }
    })();
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
    //$("#form-product-new-add #product-barcode").focus();
    $('#form-product-new-add #product-barcode').keypress(function (a) {
        13 == a.which && $("#product-name").focus();
    });
    $("#product-preciounit").mask("#####.00",{reverse:true});
    //$("#product-stock").mask("-09999");
    $('#form-product-new-add #pro-proveedor-doc').mask('99999999999');
    
    arixshell_cargar_opciones('#form-product-new-add #product-unidadme','restinventario/productos_get_metric').then(function(){
        $("#form-product-new-add #product-unidadme option:contains("+axautoload.unidad+")").prop('selected', true);
    });
    arixshell_cargar_opciones('#form-product-new-add #product-cat','restinventario/productos_get_category').then(function(){
        $("#form-product-new-add #product-cat option:contains("+axautoload.categoria+")").prop('selected', true);
    });
    
    $("#form-product-new-add #product-barcode").blur(function(){
        let request = $(this).val();
        if(axautoload.barcode != request && request.length > 5 && request.length < 31){
            request = arixshell_upload_datos('restinventario/productos_duplicate_check', 'txtdata='+request+'&');
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

    $("#form-product-new-add #btn-search-barcode").click(function () {
        let request = arixshell_upload_datos('restinventario/ids_post_generator', 'txtdata=1&');//true or false
        if (request.status == true){
            $('#form-product-new-add  #product-barcode').val(request.data).focus();
        }else{
            return;
        }
    });
    //(1)PARA EL MODAL DE AGREGAR persona
    $("#btn-search-proveedor").click(function () {     
        let temp = $("#pro-proveedor-doc").val();
        //console.log(temp);
        if(temp.length == 8 || temp.length==11){
            let request = arixshell_upload_datos('restinventario/proveedores_post_search', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false
            //console.log(request);
            if(request.status==true){//ya existe en la base de datos
                $('#cont-proveedor-dscrb').val(request.data).removeClass('d-none');             
                $('#cont-proveedor-id').val(request.axid);
                $("#btn-restart-proveedor").removeClass('d-none');
                $("#pro-proveedor-doc").addClass('d-none');
                $(this).addClass('d-none');
            }else {
                arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
                arixshell_abrir_modalbase('Agregar nuevo Proveedor','restinventario/proveedores_form_add','btn-modalNewUser-forprovvedor');
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
        $('#cont-proveedor-id').val("");
        $("#pro-proveedor-doc").removeClass('d-none').val("").focus();
    });

    $("#form-product-new-add").validate({
        errorClass: "text-danger",
        rules: {
            txtcontnumber :{required: true,maxlength: 30,minlength:7},//barcode
            txtproductpriseunit :{required: true,number:true},
            txtproductcompraunit :{required: true,number:true},
            txtproductstock :{required: true,number:true},
            txtproductname :{required: true,maxlength:50,minlength: 4},            
            txtproductdescription :{required: false,maxlength: 200,minlength: 4},            
            txtproveedordoc :{required: false,maxlength: 11,minlength: 8},
            txtproveedordscrb :{required: false,maxlength: 80,minlength: 8},
            txtproveedorid :{required: false,maxlength: 120,minlength: 8},
            txtimgproductid :{required: true,maxlength: 120,minlength: 8},
            txtunidadme :{required: true},
            txtproductcat :{required: true}
        }
    });

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-guardar", function() {
        
        if($("#form-product-new-add").valid()){
            let request = arixshell_upload_datos('restinventario/productos_update', $('#form-product-new-add').serialize());
            //console.log(request);
            if(request.status==true){//el servidor siempre responde con un obejeto
                arixshell_alert_notification('success','Guardado correctamente...');
                arixshell_hacer_pagina_atras();
            }
            else{
                //alert('Lo sentimos, los datos no fueron guardados ...!');
                arixshell_alert_notification('error','Lo sentimos, no pudimos guardar los datos...');
                arixshell_hacer_pagina_atras();
            }
        }
        else{
            return;
        }
    });
</script>