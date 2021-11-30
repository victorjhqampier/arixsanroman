<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-row">
            <div class="form-group col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="product-barcode" placeholder="Codigo de Barras" style="font-weight: bold;" />
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" id="btn-product-barcode"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="input-group">
                    <input type="number" class="form-control" id="product-cant" style="font-weight: bold;" value="1" />
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold" type="button" onclick="rest_en_add_cant(1)">x1</button>
                        <button class="btn btn-secondary font-weight-bold" type="button" onclick="rest_en_add_cant(2)">x2</button>
                        <button class="btn btn-success font-weight-bold" type="button" onclick="rest_en_add_cant(4)">x4</button>
                        <button class="btn btn-info font-weight-bold" type="button" onclick="rest_en_add_cant(6)">x6</button>
                        <button class="btn btn btn-dark font-weight-bold" type="button" onclick="rest_en_add_cant(12)">x12</button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 text-right" id="product-finish-btn">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-danger btn-cerrarcaja"><i class="fa fa-times" aria-hidden="true"></i></button>                      
                    <button type="button" class="btn btn-primary btn-imprimir" odd=""><i class="fa fa-print" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-warning btn-cancelar"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-success btn-finish">Cobrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-md-7 mt-2">
        <div class="overflow-auto" style="height: calc(100vh - 13.8rem);">
            <table class="table table-striped table-dark table-sm shadow" id="en-productos-table" style="font-family: Tahoma,sans-serif;">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th class="d-none">id</th>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>
                        <th>CANT.</th>
                        <th class="text-center">P.UNIT</th>
                        <th class="text-right">DSCTO</th>
                        <th class="text-right">IMPORTE</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>       

        <table class="table table-sm" id="producto-show-all">
            <tbody>
                <tr class="text-right">
                    <td colspan="3">
                        <div class="form-group col-md-12" style="margin: -5px">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="input-descto" placeholder="Codigo de Descto"/>
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="btn-descto-search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>Descuento especial S/</td>
                    <td>0.00</td>
                </tr>
                <tr class="text-right" style="font-size: 2em;">
                    <td colspan="4">Total a pagar S/</td>
                    <td id="axtotal">0.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xl-5 col-md-5 mt-2">
        <div class="form-row">
            <div class="form-group col-md-6">
                <select id="product-list-cat" class="form-control form-control-sm">
                    <option value="CDC84DE2700EEbjFUYmxzb0w4TWpGT2lMbGtBTm50QT09">Elija...</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control form-control-sm" id="seach-local-data" placeholder="Buscar producto"/>
            </div>
        </div>

        <div class="row overflow-auto" style="height: calc(100vh - 10.5rem);" id="products-lists">
            <!--div class="col-xl-4 col-md-6 mt-2">
                <div class="card shadow">
                    <img class="card-img" src="public/apps/img/axproduct61967ecc972a6.png" />
                    <div class="card-body" style="margin: -0.3rem; margin-bottom: -0.3rem;">
                        <h6 class="card-title">Card title</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">This is a wider card with supportingnt is a little bit longer.</small>
                    </div>
                </div>
            </div-->
        </div>
    </div>
</div>


<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn-id-en-ventas");
    arixshell_cargar_botones_menu('btn-refrescar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //$('#datat-products'').DataTable().clear();
        $('#datat-products-list').DataTable().ajax.reload();
    });
    var request,txtIn;//= arixshell_upload_datos('restinventario/productos_get_simple', 'txtdata='+$('#product-list-cat').val()+'&');
    arixshell_cargar_opciones('#product-list-cat','restinventario/productos_get_category').then(function(){
        request = arixshell_upload_datos('restinventario/productos_get_simple', 'txtdata='+$('#product-list-cat').val()+'&');
        txtIn = $("#seach-local-data").val();//document.querySelector('#seach-local-data');
        rest_filtrar(request,txtIn.toLowerCase());      
    });
    
    $("footer").addClass("d-none");
    $("#nav-idont-know").parent().addClass("d-none");

    //función que realiza la busqueda
    var axGlibalEnVar = null;
    $('#product-barcode').keypress(function (a) {
        13 == a.which && $("#btn-product-barcode").click();
    });
    $("#btn-product-barcode").click(function () {     
        let request = $("#product-barcode").val(); 
        if (request.length > 5){      
            let htmlResult = false;
            request = arixshell_upload_datos('restpuntodeventa/ventas_productos_get_one', 'txtdata='+request+'&');
            if(request.status == true){
                $("#product-barcode").val("").focus();
                $("#en-productos-table tr").find('td:eq(2)').each(function(){//busca codigo de barras
                    if($(this).html() == request.barcode){
                        htmlResult = $(this).parent();
                    }
                });
                if(htmlResult){//la fila de la tabla
                   rest_sell_calcular_importe(htmlResult, $("#product-cant").val(),request.dscto);
                   rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
                }else{
                    let cant = parseInt($("#product-cant").val());
                    let dscto = parseFloat(request.dscto) * cant;
                    let importe = parseFloat(request.pventa) * cant;

                    importe = importe.toFixed(2);
                    dscto = dscto.toFixed(2);

                    importe = importe - dscto;
                    importe = importe.toFixed(2);

                    rest_sell_add_row({'1':request.axid,'2':request.barcode,'3':request.producto,'4':cant,'5':request.pventa,'6':dscto,'7':importe},'#en-productos-table tbody');
                    rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
                }
            }else{
                arixshell_alert_notification('warning','Stock bacio o codigo de barras inválido');
            }
        }else{
            $("#product-barcode").val("").focus();
            arixshell_alert_notification('error','Error! Escriba un codigo de barras válido');
        }
    });
    
    $('#en-productos-table').on( 'click', '.btn-borrar',function(){
        let fila = $(this).parent().parent().parent().remove();
        rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
    });
    $('#en-productos-table').on( 'click', '.btn-editar',function(){
        let fila = $(this).parent().parent().parent();
        fila.addClass("table-dark");
        axGlibalEnVar = fila;//ambos son por refeencia
        rest_en_product_edit(fila);
    });
    $('#product-edit-form').on( 'click', 'button',function(){
        let btnInfo = $(this).attr("odd");
        $("#product-barcode").val("").focus();        
        $("#product-edit-form").addClass("d-none"); 
        rest_en_product_edit_close(axGlibalEnVar,btnInfo);//este valor esta referenciado
        rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
            //liberamos memoria
        axGlibalEnVar = false;
        $("#product-edit-form")[0].reset();        
    }); 
    
    //$('#product-finish-btn').on( 'click', 'button',function(){
    $('#product-finish-btn').on( 'click', '.btn-finish',function(){              
        if ($("#en-productos-table tbody tr").length > 0){            
            arixshell_abrir_mainModal('Terminar entrada de productos','restinventario/enproductos_final_form','btn-modal-final-product'); 
        }else{
            return;
        }
    });
    $(document).on('click', '#btn-modal-final-product', function(){
        arixshell_cerrar_mainModal();
    });
    $('#products-lists').on( 'click', '.card',function(){
        let fila = $(this).attr('odd');
        $("#product-barcode").val(fila).focus();
        $("#btn-product-barcode").click();
    });
    $('#product-finish-btn').on( 'click', '.btn-cancelar',function(){
        $("#en-productos-table tbody").html("");
        rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
        request = arixshell_upload_datos('restinventario/productos_get_simple', 'txtdata='+$("#product-list-cat").val()+'&');
        rest_filtrar(request,txtIn.toLowerCase());     
    });
    $('#product-finish-btn').on( 'click', '.btn-imprimir',function(){
        /*let axid = $(this).attr('odd');
        if (axid != ""){
            arixshell_print_get_pdf('en_productos_get_ticket',axid);
        }else{
            return;
        }*/
        alert(/Android/i.test(navigator.userAgent));
    });



    $("#product-list-cat").change(function(){
        request = arixshell_upload_datos('restinventario/productos_get_simple', 'txtdata='+$("#product-list-cat").val()+'&');
        rest_filtrar(request,txtIn.toLowerCase());
    });
    $("#seach-local-data").keyup(function(){
        $(this).val();
        rest_filtrar(request,$(this).val().toLowerCase());
    });    
</script>