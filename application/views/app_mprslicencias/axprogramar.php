<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
   <div class="col-xl-12 col-md-12 mt-2">
      <div class="alert alert-info" role="alert"><strong>Nota: </strong> Se muestra las empresas cuyos vehiculos presentan todos los requisitos necesarios para la obtencion de la TUC</div>
   </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="table-responsive-md">
            <table class="table table-sm table-striped" id="table-for-progrmae-inspect">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">RUC</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Programar</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
   arixshell_iniciar_llaves_locales("#btn_id_progrmamar");//esta ultima se carga en el DOM secundario
   
   (function(){
      let btns = arixshell_cargar_botones('btn-editar');
      $('#table-for-progrmae-inspect').DataTable({
         "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No se ha encontrado nada, lo siento",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay registros disponibles",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)"
               },
               "ajax": {
                  "url" : "mpsrlicencias/mpsr_get_programe_inspect",
                  "dataSrc":""
               },
               "columns":[
                  {"data": 'axuidemp'},
                  {"data": 'ruc'},
                  {"data": 'empresa'},            
                  {"data": 'direccion'},            
                  {"data": null, render: function ( data, type, row ) {return btns;}}
               ],
               "columnDefs": [
                  {
                     "targets": [0],
                     "visible": false,
                     "searchable": true
                  }
               ],
               "createdRow": function( row, data, dataIndex ) {
                  $(row).attr('odd', data.axuidemp);         
               }
      });    
   })();
   $('#table-for-progrmae-inspect tbody').on( 'click', '.btn-editar',function(){
      let fila = $(this).closest("tr"), uid = fila.attr('odd');
      arixshell_write_cache_serial('mpsrevalcertification',uid, '('+fila.find('td:eq(1)').text()+') - '+fila.find('td:eq(2)').text());
      arixshell_abrir_modalbase('Programar lugar y fecha de inspección','mpsrlicencias/temp_programe_certif','btn-modal-certification-eval');
   });
   $(document).on('click', '#btn-modal-certification-eval', function(){
        arixshell_cerrar_modalbase();
    });
</script>  
   