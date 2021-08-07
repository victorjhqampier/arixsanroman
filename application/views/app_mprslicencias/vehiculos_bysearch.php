<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="main-content-vehiadd">    
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
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="row" id="second-content-vehiadd"></div>
    </div>
</div>
<script type="text/javascript">
    (function(){
        $("#sub-table-emp").find('td:eq(0)').text(mpsr_vehiadd_basevar['ruc']);
        $("#sub-table-emp").find('td:eq(1)').text(mpsr_vehiadd_basevar['nombre']);
        $("#sub-table-emp").find('td:eq(2)').text(mpsr_vehiadd_basevar['rsocial']);
        $("#sub-table-emp").find('td:eq(3)').text('('+mpsr_vehiadd_basevar['telefono']+') - '+mpsr_vehiadd_basevar['direccion']);
        $("#sub-table-resol").find('td:eq(0)').text(mpsr_vehiadd_basevar['nresolucion']);
        $("#sub-table-resol").find('td:eq(1)').text(mpsr_vehiadd_basevar['aufin']);
        $("#sub-table-resol").find('td:eq(2)').text(mpsr_vehiadd_basevar['code']+' '+mpsr_vehiadd_basevar['servicio']);
        $("#sub-table-resol").find('td:eq(3)').text(mpsr_vehiadd_basevar['numv']);
        mpsr_vehiadd_basevar=[mpsr_vehiadd_basevar['axuidemp'],mpsr_vehiadd_basevar['aufin'],mpsr_vehiadd_basevar['code'],mpsr_vehiadd_basevar['numv'],mpsr_vehiadd_basevar['direccion']];
    })();
    arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_show","#main-content-vehiadd #second-content-vehiadd");    
</script>