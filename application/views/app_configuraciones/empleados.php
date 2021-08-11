<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#empleadosactive" role="tab" aria-controls="home" aria-selected="true">Contratos Activos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#empbusqueda" role="tab" aria-controls="contact" aria-selected="false">Buscar empleado</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="empleadosactive" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover table-sm" id="datatable-activeemplo"><!-- table-sm  table-dark-->
                      <thead class="thead-dark">
                        <tr>                  
                          <th scope="col">Fecha</th>
                          <th scope="col">N° Contrato</th>
                          <th scope="col">Empleado</th>
                          <th scope="col">Vigencia</th>
                          <th scope="col">Trabaja en</th>
                          <th scope="col">Cargo</th>
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
    arixshell_iniciar_llaves_locales("#btn_id_empleados_1","#con_id_empleados_1");
    arixshell_cargar_botones_menu('btn-agregar');

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        arixshell_cargar_contenido(window.location.href+'/sucursales_sub1');
    });
btnss = arixshell_cargar_botones('btn-borrar,btn-detalles'); 
$('#datatable-activeemplo').DataTable({
      "language": {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se ha encontrado nada, lo siento",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)"
         },
        "ajax": {
            "url" : "configuraciones/axconfig_get_empleados",
            "dataSrc":""
        },
        "columns":[
            {"data": 'fecha'},
            {"data": 'contrato'},
            {"data": 'persona'},
            {"data": 'fecha'},
            {"data": 'departamento'},
            {"data": 'cargo'},
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
//arixshell_cargar_contenido([url fuente string],[nombre string],[posicion del subtitulo int >= 4])
//arixshell_iniciar_llaves_locales([id area de botones],[]);
</script>