<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover table-sm" id="datat-cajas"><!-- table-sm  table-dark-->
                      <thead class="thead-dark">
                        <tr>                  
                          <th scope="col">DATE</th>
                          <th scope="col">NÚM.</th>
                          <th scope="col">CAJA</th>
                          <th scope="col">INICIAL (S/)</th>
                          <th scope="col">SESIÓN</th>
                          <th scope="col">SUCURSAL</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn-id-cajas");
    arixshell_cargar_botones_menu('btn-refrescar,btn-agregar');

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        arixshell_cargar_contenido('restinventario/productos_','Agregar Nuevo Producto');
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
     
        $('#datat-cajas').DataTable().ajax.reload();
    });
    (function(){
        let btns = arixshell_cargar_botones('btn-banear,btn-editar,btn-detalles');
        $('#datat-cajas').DataTable({
                //"destroy": true,
                "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se ha encontrado nada, lo siento",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)"
                },
                "ajax": {
                        "url" : "restinventario/cajas_get",
                        "dataSrc":""
                },                				
                "columns":[
                        {"data": 'updated_at'},
                        {"data": 'num'},
                        {"data": 'caja'},
                        {"data": 'base'},
                        {"data": 'sesion'},                        
                        {"data": 'sucur'},
                        {"data": null, render: function ( data, type, row ) {return btns;}}
                ],
                "order": [
                        [ 5, "asc" ]
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
        
    $('#datat-cajas tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_alert_notification('success',uid);
    });
    $('#datat-cajas tbody').on( 'click', '.btn-editar',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_write_cache_serial('e0x005477arixNewUser',uid);//clave y valor
        arixshell_cargar_contenido('restinventario/productos_edit_form','Editar '+fila.find('td:eq(1)').text());
    });
    $('#datat-cajas tbody').on( 'click', '.btn-banear',function(){
        let fila = $(this).closest("tr");
        let uid = fila.attr('odd');
        arixshell_alert_delete('question','Desea suspender el Producto ',fila.find('td:eq(1)').text(),'Si, Suspender','restinventario/productos_path_suspend','txtdata='+uid+'&',arixshell_cargar_llave_local(0)+' .btn-refrescar');
    });
</script>