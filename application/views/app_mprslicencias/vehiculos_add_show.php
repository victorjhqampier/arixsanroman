<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Vehículos Habilitados</h6>
    <div class="table-responsive-md">
        <table class="table table-hover table-sm" id="dataTable_emp_activos">
            <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Certificación</th>
                    <th scope="col">Cert. estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<div class="col-xl-12 col-md-12"></div>
<script type="text/javascript">   
    mpsr_autoload_datatable();
    $('#dataTable_emp_activos tbody').on( 'click', '.btn-detalles', function () {
        return;
    });
    $('#btn-add-veh2emp').click(function() {
        arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_form","#main-content-vehiadd #second-content-vehiadd");
    });
</script>