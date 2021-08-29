<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12 mt-2" id="main-content-recertif-show">
        <div class="row">
            <div class="col-xl-8 col-md-8">
                <div class="card bg-light border-light mb-4">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Empresa de Transporte</h6>
                        <div class="table-responsive-sm">
                            <table class="table table-sm" id="sub-table-emp">
                                <tbody>
                                    <tr>
                                        <th scope="row">RUC</th>
                                        <td>@mdo arixcorp</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td>@mdo arixcorp.</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Razón Social</th>
                                        <td>@mdo arixcorp</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Datos de contacto</th>
                                        <td>@mdo arixcorp</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="d-none" id="certif-empid" readonly/>
            </div>            
            <div class="col-xl-4 col-md-4">
                <div class="card bg-light border-light mb-4">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Datos de la Autorización</h6>
                        <div class="table-responsive-sm">
                            <table class="table table-sm" id="sub-table-resol">
                                <tbody>
                                    <tr>
                                        <th scope="row">Resolución</th>
                                        <td>@mdoArixCorp</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vigente hasta</th>
                                        <td>@mdoArixCorp</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tipo y Modalidad</th>
                                        <td>@fatArixCorp</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Flota Vehicular</th>
                                        <td>@mdoArixCorp</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 mt-2" id="load-recertif-show">
        <div class="card bg-light border-light mb-4">
            <div class="card-header d-flex align-items-left justify-content-between">
                <h6 class="d-flex align-items-center mt-2"><i class="material-icons text-info mr-2">assignment</i><span>Certificación Vehicular</span></h6>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning" id="btn-restart-recertifi">Renovar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table table-hover table-sm table-striped" id="dataTable-recertif-real">
                        <!-- LOS CERTIFICADOS RENOVADOS YA NO SE VERÁN AQUI, SINO EN RENOVACIONES. HASTA QUE ENTRA EN VIGENCIA ALÑ PROXMI AÑO-->
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">N° Certificado</th>
                                <th scope="col">Vehículo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Condición</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_recertificadoas_addshow");
    arixshell_cargar_botones_menu('btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    (function(){
        //console.log(mpsr_vehiadd_basevar);
        let btnOne = arixshell_cargar_botones('btn-editar,btn-detalles');
        let btnTwo = arixshell_cargar_botones('btn-detalles');
        //let todo =0;

        $("#sub-table-emp").find('td:eq(0)').text(mpsr_vehiadd_basevar.ruc);
        $("#sub-table-emp").find('td:eq(1)').text(mpsr_vehiadd_basevar.nombre);
        $("#sub-table-emp").find('td:eq(2)').text(mpsr_vehiadd_basevar.rsocial);
        $("#sub-table-emp").find('td:eq(3)').text('('+mpsr_vehiadd_basevar.telefono+') - '+mpsr_vehiadd_basevar.direccion);        
        $("#sub-table-resol").find('td:eq(0)').text(mpsr_vehiadd_basevar.nresolucion);
        $("#sub-table-resol").find('td:eq(1)').text(mpsr_vehiadd_basevar.aufin);
        $("#sub-table-resol").find('td:eq(2)').text(mpsr_vehiadd_basevar.code+' '+mpsr_vehiadd_basevar.servicio);
        $("#sub-table-resol").find('td:eq(3)').text(mpsr_vehiadd_basevar.numv);
        $("#load-recertif-show").find('span').html('Certificacion Vehicular <strong>(Para el año '+mpsr_vehiadd_basevar.anio+')</strong>');
        $("#main-content-recertif-show #certif-empid").val(mpsr_vehiadd_basevar.axuidemp);
        //$("#main-content-recertif-show #certif-placa").val(mpsr_vehiadd_basevar.axuidemp)
        
        $('#dataTable-recertif-real').DataTable({
                "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No se ha encontrado nada, (Click en renovar)",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay registros disponibles",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)"
               },
               "ajax": {
                  "url" : "mpsrlicencias/mpsr_get_certifiction_real",
                  "dataSrc":"",
                  "type": "POST",
                  "data": {"txtdata" : mpsr_vehiadd_basevar.axuidemp,"txtdataextra":"E2F9DEA02F443TGpqeTBrZWQ5aERWdTdVbG15RDlPdz09"}
               },
               "columns":[
                    {"data": 'axuid'},
                    {"data": 'fecha'},                
                    {"data": 'ncertificado'},
                    {"data": 'vehicle'},
                    {"data": 'descripcion'},
                    {"data": 'vigencia'},
                    {"data": 'condicion'},   
                    {"data": null, render: function ( data, type, row ) {return 1==data.stcond?btnOne:btnTwo;}}
               ],
               "order": [
                  [ 1, "asc" ]
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
                    $(row).attr('odd', data.axuid);       
               }
      });   
    })();

    /*$('#second-content-vehiadd').on( 'click', '#btn-refresh-certif', function () {
        $('#second-content-vehiadd').addClass('d-none');
        arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_form","#load-vehiculos-addform");
    });
    $('#dataTable_emp_activos tbody').on( 'click', '.btn-detalles', function () {
        return;
    });*/
    $('#load-recertif-show').on('click', '#btn-restart-recertifi', function(){
        let request = $('#main-content-recertif-show #certif-empid').val();
        request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certification_create_renove', 'txtdata='+request+'&');
        $('#btn-restart-recertifi').parent().html('');
        if(request.status ==true){
                arixshell_alert_notification('success','Se actualizó el registro de datos.');
                $('#dataTable-recertif-real').DataTable().ajax.reload();
        }else{
                arixshell_alert_notification('error','Sin resultados. Por favor, Asocie vehículos a la empresa');
        }         
    });
    $('#dataTable-recertif-real tbody').on( 'click', '.btn-editar',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_write_cache_serial('mpsrevalcertification',uid, fila.find('td:eq(1)').text()+' - '+fila.find('td:eq(2)').text());
        arixshell_abrir_modalbase('REVISAR CERTIFICADO N°: '+fila.find('td:eq(0)').text(),'mpsrlicencias/temp_certification_eval','btn-modal-certification-eval');
   });
   
   $('#dataTable-recertif-real tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_write_cache_serial('mpsrevalcertification',uid, fila.find('td:eq(1)').text()+' - '+fila.find('td:eq(2)').text());
        arixshell_abrir_modalbase('HISTORIAL DE CERTIFICADO N°: '+fila.find('td:eq(0)').text(),'mpsrlicencias/temp_historial_certif','btn-modal-certification-eval');
   });
   $(document).on('click', '#btn-modal-certification-eval', function(){
        arixshell_cerrar_modalbase();
    });
</script>