<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12 mt-2" id="areas-base-panel">
        <div class="table-responsive-md">
            <table class="table table-hover table-sm" id="dataTable-areas">
                <thead>
                    <tr>
                        <th scope="col">DATE</th>
                        <th scope="col">Oficina (Sucursal)</th>
                        <th scope="col">Nombre de área</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
/*$(document).ready(function(){
    
});*/
    arixshell_iniciar_llaves_locales("#btn_id_areas_base");
    arixshell_cargar_botones_menu('btn-agregar');
   btnss = arixshell_cargar_botones('btn-borrar,btn-detalles');    
    $('#dataTable-areas').DataTable({
      "language": {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se ha encontrado nada, lo siento",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)"
         },
        "ajax": {
            "url" : "configuraciones/axconfig_get_areas",
            "dataSrc":""
        },
        "columns":[
            {"data": 'fecha'},
            {"data": 'oficina'},
            {"data": 'departamento'},
            {"data": 'descrt'},
            {"data": null, render: function ( data, type, row ) {return btnss;}}
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
            $(row).attr('odd', data.axuid);         
        }
    });
</script>