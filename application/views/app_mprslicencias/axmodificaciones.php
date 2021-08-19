<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="change-tab-route" data-toggle="tab" href="#change-href-route" role="tab" aria-controls="home" aria-selected="true">Modificación de ruta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="change-tab-flote" data-toggle="tab" href="#change-href-flote" role="tab" aria-controls="profile" aria-selected="false">Incremento de flota</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="change-tab-admin" data-toggle="tab" href="#change-href-admin" role="tab" aria-controls="profile" aria-selected="false">Cambiar Administrador</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="change-href-route" role="tabpanel" aria-labelledby="change-tab-route">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="in-vehicle-bysearch" placeholder="Placa del vehículo" maxlength="6" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-bysearch"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                    </div>
                    <div class="col-xl-12 col-md-12 mt-2" id="content-vehicle-bysearch"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="change-href-admin" role="tabpanel" aria-labelledby="change-tab-admin">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="in-vehicle-chgowner" placeholder="Placa del vehículo" maxlength="6" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-chgowner"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                        </div>
                        <div class="col-xl-12 col-md-12 mt-2">
                            <div class="row" id="content-vehicle-chgowner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="change-href-flote" role="tabpanel" aria-labelledby="change-tab-flote">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="in-vehicle-chgdriver" placeholder="Placa del vehículo" maxlength="6" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-chgdriver"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                        </div>
                        <div class="col-xl-12 col-md-12 mt-2">
                            <div class="row" id="content-vehicle-chgdriver"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
