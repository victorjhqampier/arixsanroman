<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#empactibes" role="tab" aria-controls="home" aria-selected="true">Contratos Activos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#emphistorial" role="tab" aria-controls="profile" aria-selected="false">Contratos Archivados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#empbusqueda" role="tab" aria-controls="contact" aria-selected="false">Buscar empleado</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="empactibes" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover" id="dataTable_activos"><!-- table-sm  table-dark-->
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
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="emphistorial" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover" id="dataTable_inactivos"><!-- table-sm  table-dark-->
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
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="empbusqueda" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="input-group input-group-sm mb-3">
                  <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                  </div>
                </div>                
            </div>
        </div>         
    </div>
</div>