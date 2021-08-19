<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabEmp" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="reno-emp-activos" data-toggle="tab" href="#hrefreno-emp-activos" role="tab" aria-controls="home" aria-selected="true">Empresas Activas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="reno-emp-buscar" data-toggle="tab" href="#hrefreno-emp-buscar" role="tab" aria-controls="profile" aria-selected="false">Búsqueda específica</a>
    </li>
</ul>
<div class="tab-content">
   <div class="tab-pane fade show active" id="hrefreno-emp-activos" role="tabpanel" aria-labelledby="reno-emp-activos">
      <div class="row">
         <div class="col-xl-12 col-md-12 mt-2">
            <div class="table-responsive-md">
               <table class="table table-sm" id="table-data-empone">
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
                  <tbody></tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="hrefreno-emp-buscar" role="tabpanel" aria-labelledby="reno-emp-buscar">
      <div class="table-responsive-md">
         <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
               <h3>en contrucción</h3>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   arixshell_iniciar_llaves_locales("#btn_id_empresas","#con_id_empresas");//esta ultima se carga en el DOM secundario
   arixshell_cargar_botones_menu('btn-agregar');
   $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
        arixshell_cargar_contenido('mpsrlicencias/compania_add','Agregar Nueva Empresa');
   });
   (function(){
      let btns = arixshell_cargar_botones('btn-detalles,btn-imprimir');
      $('#table-data-empone').DataTable({
         "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No se ha encontrado nada, lo siento",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay registros disponibles",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)"
               },
               "ajax": {
                  "url" : "mpsrlicencias/mpsr_get_activeemp",
                  "dataSrc":"",
                  "type": "POST",
                  "data": {"txtdata" : "6ACA79F493CEEeEQ3Zk9LVUo3bTdEWThOaWcxK1VNQT09"}
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
                  {"data": null, render: function ( data, type, row ) {return btns;}}
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
               }
      });    
   })();
   $('#table-data-empone tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_cargar_contenido('mpsrlicencias/compania_view',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(2)').text());
   });
</script>   