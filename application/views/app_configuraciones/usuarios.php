<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12 mt-2" id="usuarios-base-panel">
        <div class="table-responsive-md">
            <table class="table table-hover table-sm" id="dataTable-usuarios">
                <thead>
                    <tr>
                        <th scope="col">DATE</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Vigencia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_usuarios_base");
    arixshell_cargar_botones_menu('btn-agregar');
    //arixshell_cargar_boton_buscar('Buscar por DNI');
    //axconfiguraciones_mostrar_icono_usuarios('btn-detalles');//donde lo voy a cargar debe decir
   /* $(arixshell_cargar_llave_local(1)+' .card').on("click", "button", function() {//click unico en la página
        var a = $(this).closest('div').attr('id');
        alert('-> '+a);
    });*/
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
    	arixshell_cargar_contenido(window.location.href+'/usuarios_nuevo','Usuario Nuevo');
    });
    btnss = arixshell_cargar_botones('btn-borrar,btn-detalles');    
    $('#dataTable-usuarios').DataTable({
      "language": {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se ha encontrado nada, lo siento",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)"
         },
        "ajax": {
            "url" : "configuraciones/axconfig_get_usuarios",
            "dataSrc":""
        },
        "columns":[
            {"data": 'fecha'},
            {"data": 'cuenta'},
            {"data": 'numero'},
            {"data": 'persona'},
            {"data": 'vigencia'},
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