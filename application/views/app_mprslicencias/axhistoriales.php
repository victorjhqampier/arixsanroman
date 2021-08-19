<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="hist-tab-tuc" data-toggle="tab" href="#hist-href-tuc" role="tab" aria-controls="home" aria-selected="true">Consultar TUC</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="hist-tab-empresas" data-toggle="tab" href="#hist-href-empresas" role="tab" aria-controls="profile" aria-selected="false">Historial de empresas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="hist-tab-vehicles" data-toggle="tab" href="#hist-href-vehicles" role="tab" aria-controls="profile" aria-selected="false">Historial Vehicular</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="hist-tab-drives" data-toggle="tab" href="#hist-href-drives" role="tab" aria-controls="profile" aria-selected="false">Historial de conductores</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="hist-tab-certif" data-toggle="tab" href="#hist-href-certif" role="tab" aria-controls="profile" aria-selected="false">Consultar certificación vehicular</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="hist-href-tuc" role="tabpanel" aria-labelledby="hist-tab-tuc">
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
    <div class="tab-pane fade" id="hist-href-empresas" role="tabpanel" aria-labelledby="hist-tab-empresas">
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
    <div class="tab-pane fade" id="hist-href-vehicles" role="tabpanel" aria-labelledby="hist-tab-vehicles">
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
    <div class="tab-pane fade" id="hist-href-drives" role="tabpanel" aria-labelledby="hist-tab-drives">
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
    <div class="tab-pane fade" id="hist-href-certif" role="tabpanel" aria-labelledby="hist-tab-certif">
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
</div>
