<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="main-content-vehiadd">
    <div class="col-xl-12 col-md-12">
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="ruc-search" placeholder="RUC de la empresa" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-search-empruc"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-md-8 d-none">
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
    <div class="col-xl-4 col-md-4 d-none">
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
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="row" id="second-content-vehiadd"></div>
    </div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_veh2empresas_add");
    arixshell_cargar_botones_menu('btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    var mpsr_vehiadd_basevar;       
    $('#main-content-vehiadd #ruc-search').mask('99999999999');
    $('#main-content-vehiadd #ruc-search').focus();

    $('#main-content-vehiadd').on('click', '#btn-search-empruc', function(){
        let request = $('#main-content-vehiadd #ruc-search').val();
        if(request.length==11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_get_activeemp_byruc', 'txtdataruc='+verifyMpsr(request)+'&');
            if(typeof(request['axuidemp']) !== 'undefined'){
                $("#sub-table-emp").find('td:eq(0)').text(request['ruc']);
                $("#sub-table-emp").find('td:eq(1)').text(request['nombre']);
                $("#sub-table-emp").find('td:eq(2)').text(request['rsocial']);
                $("#sub-table-emp").find('td:eq(3)').text('('+request['telefono']+') - '+request['direccion']);
                mpsr_vehiadd_basevar=[request['axuidemp'],request['aufin'],request['code'],request['numv'],request['direccion']];
                $("#sub-table-resol").find('td:eq(0)').text(request['nresolucion']);
                $("#sub-table-resol").find('td:eq(1)').text(request['aufin']);
                $("#sub-table-resol").find('td:eq(2)').text(request['code']+' '+request['servicio']);
                $("#sub-table-resol").find('td:eq(3)').text(request['numv']);
                $('#main-content-vehiadd').children().removeClass('d-none');
                $('#main-content-vehiadd').children().first().addClass('d-none').val("");//ESONDE EL FORMURARIO
                arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_show","#main-content-vehiadd #second-content-vehiadd");
            }else{
                arixshell_alert_notification('error','No encontramos resultados. Por favor, verifique el número RUC');
                $('#main-content-vehiadd #ruc-search').val('');
            }
        }else{
            return;
        }        
    });
</script>