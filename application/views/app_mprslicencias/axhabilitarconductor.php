<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="first-tab-responsability" data-toggle="tab" href="#first-href-responsability" role="tab" aria-controls="home" aria-selected="true">Conductores activos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="second-tab-responsability" data-toggle="tab" href="#second-href-responsability" role="tab" aria-controls="profile" aria-selected="false">Con licencias Caducas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="third-tab-responsability" data-toggle="tab" href="#third-href-responsability" role="tab" aria-controls="contact" aria-selected="false">Búsqueda Específica</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="fourth-tab-responsability" data-toggle="tab" href="#fourth-href-responsability" role="tab" aria-controls="temp" aria-selected="false">Migrar datos (temporal)</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="first-href-responsability" role="tabpanel" aria-labelledby="first-tab-responsability">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="table-responsive-md">
                    <table class="table table-striped table-hover" id="table-lastresp-added">
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
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="second-href-responsability" role="tabpanel" aria-labelledby="second-tab-responsability">
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
    <div class="tab-pane fade" id="third-href-responsability" role="tabpanel" aria-labelledby="third-tab-responsability">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <h2>PENE todos los pasos para obtener la licencia</h2>
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
    <div class="tab-pane fade" id="fourth-href-responsability" role="tabpanel" aria-labelledby="fourth-tab-responsability">
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