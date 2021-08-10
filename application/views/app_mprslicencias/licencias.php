<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabEmp" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="licencia-impresa" data-toggle="tab" href="#hrefLicenciaImpresa" role="tab" aria-controls="home" aria-selected="true">TUC Impresas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="licencia-imp-buscar" data-toggle="tab" href="#hrefLicencia-imp-buscar" role="tab" aria-controls="profile" aria-selected="false">Buscar TUC impresa</a>
    </li>
</ul>
<div class="tab-content">
   <div class="tab-pane fade show active" id="hrefLicenciaImpresa" role="tabpanel" aria-labelledby="home-tab">
      <div class="row">
         <div class="col-xl-12 col-md-12 mt-2">
            <div class="table-responsive-md">
               <table class="table table-sm" id="dataTable-licenciasImpresas">
                  <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">fregistro</th>
                        <th scope="col">N° TUC</th>
                        <th scope="col">N° Certificado</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Empresa</th>
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
   <div class="tab-pane fade" id="hrefLicencia-imp-buscar" role="tabpanel" aria-labelledby="profile-tab">
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
$(document).ready(function(){
    //arixshell_iniciar_llaves_locales("#btn_id_empresas","#con_id_empresas");
    //arixshell_cargar_botones_menu('btn-agregar');
    // $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
    //     arixshell_cargar_contenido(window.location.href+'/compania_add','Agregar Nueva Empresa');
    // });
    
    /*$('#use-container-primary').on("click", "#profile-tab", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //arixshell_cargar_contenido(window.location.href+'/sucursales_sub1');
        arix_search_btns('btn-borrar, btn-guardar');
        //console.log(arixshell_cargar_llave_local(1)); console.log(tbtns);
    });
    $('a #profile-tab').click(function() {
        alert( "Handler for .click() called." );
    });*/

    btnss = arixshell_cargar_botones('btn-detalles');    
    $('#dataTable-licenciasImpresas').DataTable({
      "language": {
             "lengthMenu": "Mostrar _MENU_ registros por página",
             "zeroRecords": "No se ha encontrado nada, lo siento",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros disponibles",
             "infoFiltered": "(filtrado de _MAX_ registros totales)"
         },
        "ajax": {
            "url" : "mpsrlicencias/mpsr_get_imp_licencias",
            "dataSrc":"",
            "type": "POST",
            "data": {"txtdata" : "54F747562B763Rzkva2RYNXFaT1gwSFppZEhtUzRxQT09"}
        },
        "columns":[
            {"data": 'axlicid'},
            {"data": 'fregistro'},
            {"data": 'licencia'},
            {"data": 'certificado'},
            {"data": 'placa'},
            {"data": 'hmarca'},
            {"data": 'modelo'},
            {"data": 'descript'},
            {"data": 'emp'},            
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
            $(row).attr('odd', data.axlicid);         
        }
    });
    $('#dataTable-licenciasImpresas tbody').on( 'click', '.btn-detalles', function () {
        //let fila = $(this).closest("tr"), uid = fila.attr('odd');
        alert('cargar modal con las imagenes de la licncia')
        //arixshell_cargar_contenido(window.location.href+'/compania_view',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(2)').text());
   } );
});
</script>