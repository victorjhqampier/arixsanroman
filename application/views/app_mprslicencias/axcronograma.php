<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="table-responsive-md">
            <table class="table table-sm table-striped" id="dataTable-licPorImpresas">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">F. Inspeccion</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">RUC</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Imprimir</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="formdatatemp" class="d-none">
    </div>
</div>

<script type="text/javascript">
   arixshell_iniciar_llaves_locales("#btn_id_cronograma");//esta ultima se carga en el DOM secundario
   
   (function(){
      let btns = arixshell_cargar_botones('btn-imprimir');
      $('#dataTable-licPorImpresas').DataTable({
         "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No se ha encontrado nada, lo siento",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay registros disponibles",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)"
               },
               "ajax": {
                  "url" : "mpsrlicencias/mpsr_get_cronograme_inspect",
                  "dataSrc":""
               },
               "columns":[
                  {"data": 'axuidemp'},
                  {"data": 'inicio'},
                  {"data": 'lugarisp'}, 
                  {"data": 'ruc'},
                  {"data": 'empresa'},
                  {"data": null, render: function ( data, type, row ) {return btns;}}
               ],
               "order": [
                  [ 1, "asc" ]
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
   $('#dataTable-licPorImpresas tbody').on( 'click', '.btn-imprimir',function(){
      let fila = $(this).closest("tr"), uid = fila.attr('odd');
      //console.log(fila.find('td:eq(0)').text());
      //arixshell_write_cache_serial('mpsrevalcertification',uid, '('+fila.find('td:eq(1)').text()+') - '+fila.find('td:eq(2)').text());
      //arixshell_abrir_modalbase('Programar lugar y fecha de inspección','mpsrlicencias/temp_programe_certif','btn-modal-certification-eval');
      //window.open("mpsrpdfreport" , "ventana1" , "width=1200,height=800,scrollbars=YES");
         let mapForm = document.createElement("form");
         mapForm.target = "Map";
         mapForm.method = "POST";
         mapForm.action = "mpsrlicencias/dQSmo1c2RoUFhzMXE3SHVhdz";

         let mapInput = document.createElement("input");
         mapInput.type = "text";
         mapInput.name = "txtdata";
         mapInput.value = uid;
         mapForm.appendChild(mapInput);

         mapInput = document.createElement("input");
         mapInput.type = "text";
         mapInput.name = "txtdate";
         mapInput.value = fila.find('td:eq(0)').text();
         mapForm.appendChild(mapInput);

         //document.body.appendChild(mapForm);
         document.getElementById('formdatatemp').appendChild(mapForm);

         map = window.open("", "Map", "status=1,title=0,width=1200,height=800,scrollbars=1");

         if (map) {
            mapForm.submit();
            $("#formdatatemp").html('');
         } else {
            alert('You must allow popups for this map to work.');
         }
   });
</script> 