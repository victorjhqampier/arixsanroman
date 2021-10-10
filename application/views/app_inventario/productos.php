<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#empleadosactive" role="tab" aria-controls="home" aria-selected="true">Productos Activos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#empbusqueda" role="tab" aria-controls="contact" aria-selected="false">Búqueda Avanzada</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="empleadosactive" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover table-sm" id="datat-products"><!-- table-sm  table-dark-->
                      <thead class="thead-dark">
                        <tr>                  
                          <th scope="col">DATE</th>
                          <th scope="col">CÓDIGO</th>
                          <th scope="col">PRODUCTO</th>
                          <th scope="col">STOCK</th>
                          <th scope="col">PRECIO VENTA (S/)</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="empbusqueda" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="input-group input-group-sm mb-3">
                  <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                  </div>
                </div>                
            </div>
        </div>         
    </div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_productos");
    arixshell_cargar_botones_menu('btn-refrescar,btn-agregar');

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        arixshell_cargar_contenido('inventario/productos_add','Agregar Nuevo Producto');
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //$('#datat-products'').DataTable().clear();
        $('#datat-products').DataTable().ajax.reload();
    });
    (function(){
        let btns = arixshell_cargar_botones('btn-banear,btn-editar,btn-detalles');
        $('#datat-products').DataTable({
                //"destroy": true,
                "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se ha encontrado nada, lo siento",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)"
                },
                "ajax": {
                        "url" : "inventario/productos_get",
                        "dataSrc":""
                },                				
                "columns":[
                        {"data": 'updated_at'},
                        {"data": 'barcode'},
                        {"data": 'producto'},
                        {"data": 'stock'},
                        {"data": 'pventa'},
                        {"data": null, render: function ( data, type, row ) {return btns;}}
                ],
                "order": [
                        [ 0, "desc" ]
                ],
                "columnDefs": [{
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                }],
                "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('odd', data.axid);         
                }
        });
    })();
        
    $('#datat-products tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_alert_notification('success',uid);
    });
    $('#datat-products tbody').on( 'click', '.btn-borrar',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_alert_delete('question','Finalizar contrato para',fila.find('td:eq(1)').text(),'Si, finalizar','configuraciones/axconfig_delete_employee','txtdata='+uid+'&',arixshell_cargar_llave_local(0)+' .btn-refrescar');
    });
</script>