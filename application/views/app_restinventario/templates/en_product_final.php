<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row bg-info">
    <div class="col-xl-8 col-md-8">
        <form id="form-product-new-add">
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
                                </div>
                            </div>
                </div>
                <div class="row">
                            <div class="col-xl-12 col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="product-unidadme">Tipo Comprobante</label>
                                        <select id="product-unidadme" name="txtunidadme" class="form-control">
                                            <option value="Resolucion de tipo -R1" selected>Elija...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="product-stock">Número de comprobante</label>
                                <input type="text" class="form-control" id="product-ncompro" name="txtproductnumcompro" placeholder="Stock" value="0" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product-stock">Fecha del comprobante</label>
                                <input type="date" class="form-control" id="product-venci" name="txtproductvenci" placeholder="Numero"/>
                            </div>
                </div>
        </form>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="d-flex justify-content-between mt-4" id="btn-to-save">
            <button type="button" class="btn btn-warning btn-cancelar"><i class="fa fa-times" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-success btn-guardar"><i class="fa fa-check" aria-hidden="true"></i></button> 
        </div>
    </div>
</div>

<script type="text/javascript">    
    $("#form-product-new-add #pro-proveedor-doc").focus();
    $('#form-product-new-add #pro-proveedor-doc').keypress(function (a) {
        13 == a.which && $("#btn-search-proveedor").click();
    });
    
    $('#form-product-new-add #pro-proveedor-doc').mask('99999999999');
    
    arixshell_cargar_opciones('#form-product-new-add #product-unidadme','restinventario/productos_get_comprobantes');
        
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
                arixshell_abrir_modalbase('Agregar Nuevo Proveedor','restinventario/proveedores_form_add','btn-modalNewUser-forprovvedor');
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
            txtproveedordoc:{required: false,maxlength: 11,minlength: 8},
            txtproveedordscrb:{required: false,maxlength: 110,minlength: 8},
            txtproveedorid :{required: false,maxlength: 120,minlength: 8},
            txtunidadme:{required: true},
            txtproductnumcompro:{required: true,maxlength: 20,minlength: 5},
            txtproductvenci:{required: true,maxlength: 12,minlength: 5}
        }
    });

    $('#btn-to-save').on("click", ".btn-guardar", function() {        
       if($("#form-product-new-add").valid()){
            let request = $('#form-product-new-add').serializeArray(); 
            request.push(rest_en_htmltable_object($("#en-productos-table tbody tr")));                  
            request = arixshell_upload_datos('restinventario/en_productos_post_add', 'txtdata='+JSON.stringify(request)+'&');
            
            if(request.status==true){//el servidor siempre responde con un obejeto
                arixshell_cerrar_mainModal();
                $('#product-finish-btn .btn-cancelar').click();
                $(arixshell_cargar_llave_local(0)+" .btn-refrescar").click();
                arixshell_alert_notification('success','Guardado correctamente...');
                $('#product-finish-btn .btn-imprimir').attr('odd',request.ids);
                arixshell_print_get_pdf(/*restinventario*/'en_productos_get_ticket',request.ids);
            }else{                
                arixshell_cerrar_mainModal();
                $('#product-finish-btn .btn-cancelar').click();
                $(arixshell_cargar_llave_local(0)+" .btn-refrescar").click();
                arixshell_alert_notification('error','Lo sentimos, no pudimos guardar los datos...');                
            }
        }
        else{
            return;
        }
    });
   /* $('#btn-to-save').on("click", ".btn-imprimir", function() {
        
        //$("#form-product-new-add").valid();
        console.log($('#form-product-new-add').serialize());
        printJS({printable:'arixsanroman/restinventario/axconfig_generate_ticket', type:'pdf', showModal:false})
       //let request = arixshell_async_upload_datos('restinventario/rest_awaut','txtdata=1&').then((data) => console.log(data));       
         
    });*/
    $('#btn-to-save').on("click", ".btn-cancelar", function() {

        arixshell_cerrar_mainModal();
    });
</script>