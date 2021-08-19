<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabEmp" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="reno-emp-caducos" data-toggle="tab" href="#hrefreno-emp-caducos" role="tab" aria-controls="home" aria-selected="true">Empresas Caducas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="reno-emp-adelantar" data-toggle="tab" href="#hrefreno-emp-adelantar" role="tab" aria-controls="profile" aria-selected="false">Renovación adelantada</a>
    </li>
</ul>
<div class="tab-content">
   <div class="tab-pane fade show active" id="hrefreno-emp-caducos" role="tabpanel" aria-labelledby="reno-emp-caducos">
      <div class="row">
         <div class="col-xl-12 col-md-12 mt-2">
            <div class="table-responsive-md">
               <table class="table table-sm" id="table-data-emptwo">
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
                  <tbody class="text-danger"></tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="hrefreno-emp-adelantar" role="tabpanel" aria-labelledby="reno-emp-adelantar">
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
   arixshell_iniciar_llaves_locales("#btns_menu_renovaciones");//esta ultima se carga en el DOM secundario
   arixshell_cargar_botones_menu('btn-refrescar,btn-agregar');
   $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
        arixshell_cargar_contenido('mpsrlicencias/renovacion_add','Renovar autorización');
   });
   $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {        
        $('#table-data-emptwo').DataTable().ajax.reload();
   });
   (function(){
      let btns = arixshell_cargar_botones('btn-banear,btn-editar,btn-detalles');
      $('#table-data-emptwo').DataTable({
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
                  "data": {"txtdata" : "42B1F54D1306DRVB1NktVNUUrTkpnZHlJUEg4WFdKQT09"}
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
   $('#table-data-emptwo tbody').on( 'click', '.btn-detalles',function(){
      let fila = $(this).closest("tr"), uid = fila.attr('odd');
      arixshell_cargar_contenido('mpsrlicencias/compania_view',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(2)').text());
   });
   $('#table-data-emptwo tbody').on( 'click', '.btn-banear',function(){
      let fila = $(this).closest("tr"), uid = fila.attr('odd');
      arixshell_alert_delete('question','Inhabilitar a la empresa',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(3)').text(),'Si, Inhabilitar','mpsrlicencias/mpsr_delete_compania','txtdata='+uid+'&',arixshell_cargar_llave_local(0)+' .btn-refrescar');
   });
</script>