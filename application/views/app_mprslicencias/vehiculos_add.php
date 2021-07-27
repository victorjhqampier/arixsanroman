<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">        
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="vehi-ownerdoc" name="txtvehiownerdoc" placeholder="RUC de la empresa" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-search-vehicle"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-md-8">
        <div class="card bg-light border-light mb-4">
            <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Empresa de Transporte</h6>
                <div class="table-responsive-sm">
                    <table class="table table-sm">
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
                                <th scope="row">Administrador</th>
                                <td>@mdo 20601394023 - EMPRESA DE TRA S.A.C.</td>
                            </tr>
                            <tr>
                                <th scope="row">Datos de contactos</th>
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
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Resolucion de aprobación</h6>
                <div class="table-responsive-sm">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Resolución</th>
                                <td>@mdo 20601394023</td>
                            </tr>
                            <tr>
                                <th scope="row">Vigente hasta</th>
                                <td>@mdo 20601394023</td>
                            </tr>
                            <tr>
                                <th scope="row">Tipo y Modalidad</th>
                                <td>@fat 20601394023.</td>
                            </tr>
                            <tr>
                                <th scope="row">Registrado</th>
                                <td>@mdo 20601394023</td>
                            </tr>
                            <tr>
                                <th scope="row">Flota</th>
                                <td>@mdo 20601394023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="table-responsive-md">
                    <table class="table table-sm" id="dataTable_emp_activos">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">fecha</th>
                                <th scope="col">RUC</th>
                                <th scope="col">Resolución</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Razon social</th>
                                <th scope="col">Vigente hasta</th>
                                <th scope="col">Flota</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-12 col-md-12">
                <div class="alert alert-primary text-center" role="alert">
                    <button class="btn btn-secondary" id="btn-enviar-empadd">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
