<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="first-tab-vehicle" data-toggle="tab" href="#first-href-vehicle" role="tab" aria-controls="home" aria-selected="true">Buscar Vehiculo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="sec2-tab-vehicle" data-toggle="tab" href="#sec2-href-vehicle" role="tab" aria-controls="profile" aria-selected="false">Cambiar Conductor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="second-tab-vehicle" data-toggle="tab" href="#second-href-vehicle" role="tab" aria-controls="profile" aria-selected="false">Cambiar Propietario</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="third-tab-vehicle" data-toggle="tab" href="#third-href-vehicle" role="tab" aria-controls="contact" aria-selected="false">Dar de Baja</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="change-tab-vehicle" data-toggle="tab" href="#change-href-vehicle" role="tab" aria-controls="contact" aria-selected="false">Registro Unitario</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="fourth-tab-vehicle" data-toggle="tab" href="#fourth-href-vehicle" role="tab" aria-controls="temp" aria-selected="false">Migrar datos (temporal)</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="first-href-vehicle" role="tabpanel" aria-labelledby="first-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h2>En proceso de desarrollo</h2>
                <h5>Ud. Puede probar agregando vehiculos, click en el botón [+]</h5>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
            <!--div class="col-xl-12 col-md-12 mt-2">
                <div class="table-responsive-md">
                    <table class="table table-striped table-hover" id="table_vehicles_added">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N. Contrato</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Tienda</th>
                                <th scope="col">Vencimiento</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div-->
        </div>
    </div>
    <div class="tab-pane fade" id="second-href-vehicle" role="tabpanel" aria-labelledby="second-tab-vehicle">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <table class="table table-striped table-hover" id="dataTable_inactivos">
                        <!-- table-sm  table-dark-->
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">N. Contrato</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Empleado</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">Tienda</th>
                                <th scope="col">Fechas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="sec2-href-vehicle" role="tabpanel" aria-labelledby="sec2-tab-vehicle">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <h2>cambiar conductor</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="third-href-vehicle" role="tabpanel" aria-labelledby="third-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h2>ArixCorp todos los pasos para obtener la licencia</h2>
                <h5>con este paso se termina todo el proceso, y sistematiza los documentos existentes</h5>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="change-href-vehicle" role="tabpanel" aria-labelledby="change-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h2>Cambiar propietario</h2>
                <h5>con este paso se termina todo el proceso, y sistematiza los documentos existentes</h5>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="fourth-href-vehicle" role="tabpanel" aria-labelledby="fourth-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h2>Salta todos los pasos para obtener la licencia</h2>
                <h5>con este paso se termina todo el proceso, y sistematiza los documentos existentes</h5>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<script type="text/javascript">
$(document).ready(function(){
    arixshell_iniciar_llaves_locales("#btn_id_vehiculos");
    arixshell_cargar_botones_menu('btn-agregar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
        arixshell_cargar_contenido('mpsrlicencias/vehicles_add','Agregar Vehículos');
    });
});
</script>