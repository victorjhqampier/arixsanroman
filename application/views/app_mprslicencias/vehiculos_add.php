<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12" id="main-content-vehiadd">
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="ruc-search" placeholder="RUC de la empresa" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-search-empruc"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="alert alert-warning p-2" role="alert">
                    Antes de asociar, asegúrese que el conductor esté habilitado.
                </div>
            </div>
        </div>
        <hr class="my-4" />
    </div>
    <div class="col-xl-12 col-md-12 mt-2 d-none" id="main-content-vehiautoriz">
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
                                        <td>@mdo 20601394023 - EMPRESA DE TRANSPOR</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td>@fat 20601394023 - EMPRESA DE A.C.</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Razón Social</th>
                                        <td>@mdo 20601394023 - EMPRESA E PUNO PERU S.A.C.</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Datos de contacto</th>
                                        <td>@mdo 20601394023 - EMPRESA DE TRA S.A.C.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div class="card bg-light border-light mb-4">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Datos de aprobación</h6>
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
    <div class="col-xl-12 col-md-12 mt-2 d-none" id="second-content-vehiadd">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Vehículos Asociados</h6>
                <div class="table-responsive-md">
                    <table class="table table-hover table-sm table-striped" id="dataTable_emp_activos">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Conductor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-12 col-md-12 mt-2">
            </div>            
        </div>
    </div>
    <div class="col-xl-12 col-md-12 mt-2 d-none" id="load-vehiculos-addform">
    </div>
</div>

<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_veh2empresas_add");
    arixshell_cargar_botones_menu('btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });

    mpsr_vehiadd_basevar='';       
    $('#main-content-vehiadd #ruc-search').mask('99999999999');
    $('#main-content-vehiadd #ruc-search').focus();

    $('#main-content-vehiadd').on('click', '#btn-search-empruc', function(){
        let request = $('#main-content-vehiadd #ruc-search').val();
        if(request.length==11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_get_activeemp_byruc', 'txtdataruc='+verifyMpsr(request)+'&');
            if(request.status ==true){
                $("#sub-table-emp").find('td:eq(0)').text(request.ruc);
                $("#sub-table-emp").find('td:eq(1)').text(request.nombre);
                $("#sub-table-emp").find('td:eq(2)').text(request.rsocial);
                $("#sub-table-emp").find('td:eq(3)').text('('+request.telefono+') - '+request.direccion);
                mpsr_vehiadd_basevar=[request.axuidemp,request.axuiaut,request.code,request.numv];
                $("#sub-table-resol").find('td:eq(0)').text(request.nresolucion);
                $("#sub-table-resol").find('td:eq(1)').text(request.aufin);
                $("#sub-table-resol").find('td:eq(2)').text(request.code+' '+request.servicio);
                $("#sub-table-resol").find('td:eq(3)').text(request.numv);
                $("#main-content-vehiadd").addClass('d-none');
                $("#main-content-vehiadd").siblings().removeClass('d-none');
                mpsr_load_table_activevehicle('#dataTable_emp_activos',request.axuidemp,request.numv);
            }else{
                arixshell_alert_notification('error','No encontramos resultados. Por favor, verifique el número RUC');
                $('#main-content-vehiadd #ruc-search').val('');
            }
        }else{
            return;
        }        
    });
    /*$('#second-content-vehiadd #btn-add-veh2emp').click(function() {
        alert('entrenadora');
        //arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_form","#main-content-vehiadd #second-content-vehiadd");
    });*/
    $('#second-content-vehiadd').on( 'click', '#btn-add-veh2emp', function () {
        $('#second-content-vehiadd').addClass('d-none');
        arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_form","#load-vehiculos-addform");
    });
    $('#dataTable_emp_activos tbody').on( 'click', '.btn-detalles', function () {
        return;
    });
</script>