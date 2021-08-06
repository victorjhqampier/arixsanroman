<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabEmp" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="empresa_activa" data-toggle="tab" href="#empactibes" role="tab" aria-controls="home" aria-selected="true">Autorizados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="empresa_desactiva" data-toggle="tab" href="#emphistorial" role="tab" aria-controls="profile" aria-selected="false">Caducos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="empresa_buscar" data-toggle="tab" href="#empbusqueda" role="tab" aria-controls="contact" aria-selected="false">Busqueda Específica</a>
    </li>
</ul>
<div class="tab-content">
   <div class="tab-pane fade show active" id="empactibes" role="tabpanel" aria-labelledby="home-tab">
      <div class="row">
         <div class="col-xl-12 col-md-12 mt-2">
            <div class="table-responsive-md">
               <table class="table table-sm" id="dataTable_emp_activos">
                  <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">fecha</th>
                        <th scope="col">RUC</th>
                        <th scope="col">Resolución</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Razon social</th>
                        <th scope="col">Vigente hasta</th>
                        <th scope="col">Flota</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
               <!--table class="table table-striped table-hover" id="dataTable_activos">
                  <thead class="thead-dark">
                    <tr>                  
                      <th scope="col">RUC</th>
                      <th scope="col">RAZON SOCIAL</th>
                      <th scope="col">Empleado</th>
                      <th scope="col">Puesto</th>
                      <th scope="col">Tienda</th>
                      <th scope="col">Vencimiento</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table-->
            </div>
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="emphistorial" role="tabpanel" aria-labelledby="profile-tab">
      <div class="table-responsive-md">
         <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
               <table class="table table-striped table-hover" id="dataTable_inactivos">
                  <!-- table-sm  table-dark-->
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">N. Contrato</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Tienda</th>
                        <th scope="col">Fechas</th>
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
$(document).ready(function(){
    arixshell_iniciar_llaves_locales("#btn_id_empresas","#con_id_empresas");//esta ultima se carga en el DOM secundario
    arixshell_cargar_botones_menu('btn-agregar');

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
        arixshell_cargar_contenido(window.location.href+'/compania_add','Agregar Nueva Empresa');
    });
    
    $('#use-container-primary').on("click", "#profile-tab", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //arixshell_cargar_contenido(window.location.href+'/sucursales_sub1');
        arix_search_btns('btn-borrar, btn-guardar');
        //console.log(arixshell_cargar_llave_local(1)); console.log(tbtns);
    });
    $('a #profile-tab').click(function() {
        alert( "Handler for .click() called." );
    });
    btnss = arixshell_cargar_botones('btn-detalles, btn-imprimir');
    //caso = arixshell_download_datos("mpsrlicencias/mpsr_get_activeemp");
    //console.log(caso);
    $('#dataTable_emp_activos').DataTable({
      "language": {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se ha encontrado nada, lo siento",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)"
         },
        "ajax": {
            "url" : "mpsrlicencias/mpsr_get_activeemp",
            "dataSrc":""
        },
        "columns":[
            {"data": 'axuidemp'},
            {"data": 'fecha'},
            {"data": 'ruc'},            
            {"data": 'nresolucion'},
            {"data": 'nombre'},
            {"data": 'rsocial'},
            {"data": 'aufin'},
            {"data": 'numv'},
            {"data": 'code'},            
            {"data": null, render: function ( data, type, row ) {return btnss;}}
        ],
        "order": [
            [ 1, "desc" ]
        ],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            }
        ],
        "createdRow": function( row, data, dataIndex ) {
            $(row).attr('odd', data.axuidemp);         
        },
        "createdRow": function( row, data, dataIndex ) {
            if ( data.expirated == true ) {
                $( row ).addClass( "text-danger" );
            }
        }
    });
    $('#dataTable_emp_activos tbody').on( 'click', '.btn-detalles', function () {
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        //toda la lista
        //fila = fila.find("td").text();
        arixshell_cargar_contenido(window.location.href+'/compania_view',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(2)').text());
   } );
});
</script>