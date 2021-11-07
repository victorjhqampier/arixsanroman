<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-row">
            <div class="form-group col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="product-barcode" placeholder="Codigo de Barras" style="font-weight: bold;"/>
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
                        <button type="button" class="btn btn-secondary" odd="0">Cancelar</button>
                        <button type="button" class="btn btn-success" odd="1">Terminar</button>
                </div>                  
            </div>
        </div>
    </div>    
    <div class="col-xl-7 col-md-7 mt-2">
        <div class="overflow-auto" style="height: calc(100vh - 331px);">
            <table class="table table-striped table-dark table-sm" id="en-productos-table">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th class="d-none">id</th>
                    <th>Venc.</th>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th class='text-center'>Cant</th>
                    <th class='text-right'>P.Compra</th>
                    <th class='text-right'>Importe</th>                
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>
        </table>
        <form id="product-edit-form" class="p-1 bg-warning d-none">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" id="product-cant-change" style="font-weight: bold;"/>        
                </div>
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" id="product-compra-change" style="font-weight: bold;" step="0.01"/>
                </div>
            </div>
            <div class="form-row">                
                <div class="form-group col-md-6">                    
                    <input type="date" class="form-control" id="product-dateven-change" style="font-weight: bold;"/>       
                </div>
                <div class="form-group col-md-6 text-right">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary" odd="">Cancelar</button>
                        <button type="button" class="btn btn-success" odd="1">Ok</button>
                    </div>                  
                </div>
            </div>     
        </form>
        <table class="table table-sm" id="producto-show-all">
            <tbody> 
                <tr class='text-right'>                    
                        <td colspan="4">Impuestos S/</td>
                        <td>0</td>
                </tr>
                <tr class='text-right'>                    
                        <td colspan="4" style="font-size:2em;">Total a pagar S/</td>
                        <td style="font-size:2em;" id="axtotal">0</td>
                </tr>
            </tbody>
        </table>
        
        <!--form id="product-edit-form" class="p-1 bg-warning d-none">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" id="product-cant-change" style="font-weight: bold;"/>        
                </div>
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" id="product-compra-change" style="font-weight: bold;" step="0.01"/>
                </div>
            </div>
            <div class="form-row">                
                <div class="form-group col-md-6">                    
                    <input type="date" class="form-control" id="product-dateven-change" style="font-weight: bold;"/>       
                </div>
                <div class="form-group col-md-6 text-right">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary" odd="">Cancelar</button>
                        <button type="button" class="btn btn-success" odd="1">Ok</button>
                    </div>                  
                </div>
            </div>     
        </form>
        <table class="table table-striped table-dark table-sm" id="en-productos-table">
            <tr>
                <th>Acciones</th>
                <th class="d-none">id</th>
                <th>Venc.</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th class='text-center'>Cant</th>
                <th class='text-right'>P.Compra</th>
                <th class='text-right'>Importe</th>                
            </tr>
        </table>
            <table class="table table-sm" id="producto-show-all">
                <tbody> 
                    <tr class='text-right'>                    
                        <td colspan="4">Impuestos S/</td>
                        <td>0</td>
                    </tr>
                    <tr class='text-right'>                    
                        <td colspan="4" style="font-size:2em;">Total a pagar S/</td>
                        <td style="font-size:2em;" id="axtotal">0</td>
                    </tr>
                </tbody>
            </table-->
    </div>
    <div class="col-xl-5 col-md-5 mt-2">
        <div class="overflow-auto" style="height: calc(100vh - 230px);"><!--style="height: 500px;"-->
            <table class="table table-striped table-hover table-sm" id="datat-products-list"><!--  table-sm  table-dark-->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ProductImg</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn-id-en-productod");
    arixshell_cargar_botones_menu('btn-refrescar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //$('#datat-products'').DataTable().clear();
        $('#datat-products-list').DataTable().ajax.reload();
    });
    $('#datat-products-list').DataTable({
                //"destroy": true,
                "language": {
                        "lengthMenu": "Mostrar _MENU_",
                        "zeroRecords": "No se ha encontrado nada, lo siento",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)"
                },
                "ajax": {
                        "url" : "restinventario/productos_get_simple",
                        "dataSrc":""
                },                				
                "columns":[                        
                        //{"data": null, render: function ( data, type, row ) {return btns;}},
                        {
                            "render": function (data, type, JsonResultRow, meta) {
                                return '<img src="public/apps/img/'+JsonResultRow.image+'" class="img-thumbnail" style="width: 7em;">';
                            }
                        },
                        {
                            "render": function (data, type, JsonResultRow, meta) {
                                return '<p><span class="font-weight-bold">('+JsonResultRow.cant+') '+JsonResultRow.producto+' | '+JsonResultRow.barcode+' | </span>'+JsonResultRow.descripcion+' <small>('+JsonResultRow.categoria+')</small></p>';
                            }
                        }
                        //{"data": 'descripcion'}
                ],
                /*"order": [
                        [ 5, "asc" ]
                ],
                "columnDefs": [{
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                }],*/
                "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('odd', data.barcode);         
                }
    });
    
    //función que realiza la busqueda
    var axGlibalEnVar = null;
    $('#product-barcode').keypress(function (a) {
        13 == a.which && $("#btn-product-barcode").click();
    });
    $("#btn-product-barcode").click(function () {     
        let request = $("#product-barcode").val(); 
        if (request.length > 5){      
            let result = false;
            $("#product-barcode").val("").focus();            

            $("#en-productos-table tr").find('td:eq(3)').each(function(){//esto es es for
                datatable = $(this).html();
                if(datatable == request){
                    result = $(this).parent();
                }
            });
            if(result){
                    rest_en_calcular_importe(result, $("#product-cant").val());
                    rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
            }else{
                request = arixshell_upload_datos('restinventario/entradas_productos_get_one', 'txtdata='+request+'&');
                    //console.log(request);
                if(request.status == true){
                    let cant = parseInt($("#product-cant").val());
                    let importe = parseFloat(request.pcompra) * cant;
                    importe = importe.toFixed(2);
                    rest_en_add_row({'1':request.axid,'2':request.barcode,'3':request.producto,'4':cant,'5':request.pcompra,'6':importe},'#en-productos-table tbody');
                    rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
                }else{
                    arixshell_alert_notification('warning','El código de barras no se encuentra registrado');
                }
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
    
    $('#product-finish-btn').on( 'click', 'button',function(){
        let btnInfo = $(this).attr("odd");
        let tableTr = $("#en-productos-table tbody tr");
        let nombre1 = false;        
        if (tableTr.length > 0 && btnInfo > 0){
            arixshell_abrir_modalbase('Terminar entrada de productos','restinventario/enproductos_final_form','btn-modal-final-product');
            tableTr = rest_en_htmltable_object(tableTr );
            var formData = JSON.stringify($("#myForm").serializeArray());
            //tableTr = tableTr.toString();
            //console.log(JSON.stringify(tableTr));
        }else{
            $("#en-productos-table tbody").html("");
            rest_en_calcular_total($("#en-productos-table tr").find('td:eq(-1)'), "#producto-show-all #axtotal");
            //arixshell_alert_notification('warning','No se ha registrado ningun producto');
        }
        //table = $('#en-productos-table');
        //onclick="printJS('restinventario/axconfig_generate_ticket')"
        //printJS('public/resources/arix.pdf');
        //printJS({printable:'arixsanroman/restinventario/axconfig_generate_ticket', type:'pdf', showModal:false})
        //printJS('en-productos-table', 'html');
        
        //let request = arixshell_async_upload_datos('restinventario/rest_awaut','txtdata=1&').then((data) => console.log(data));       
         
    }); 

    $(document).on('click', '#btn-modal-final-product', function(){
        arixshell_cerrar_modalbase();
    });
    $('#datat-products-list tbody').on( 'click', 'tr',function(){
        let fila = $(this).attr('odd');
        $("#product-barcode").val(fila).focus();
        $("#btn-product-barcode").click();
    });   
    
</script>