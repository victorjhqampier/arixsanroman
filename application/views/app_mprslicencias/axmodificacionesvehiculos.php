<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="first-tab-vehicle" data-toggle="tab" href="#first-href-vehicle" role="tab" aria-controls="home" aria-selected="true">Cambiar Vehículo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="sec2-tab-vehicle" data-toggle="tab" href="#sec2-href-vehicle" role="tab" aria-controls="profile" aria-selected="false">Cambiar Conductor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="second-tab-vehicle" data-toggle="tab" href="#second-href-vehicle" role="tab" aria-controls="profile" aria-selected="false">Cambiar Propietario</a>
    </li>    
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="first-href-vehicle" role="tabpanel" aria-labelledby="first-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="in-vehicle-bysearch" placeholder="Placa del vehículo" maxlength="6"/>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-bysearch"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="col-xl-12 col-md-12 mt-2" id="content-vehicle-bysearch"></div>    
                </div> 
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="second-href-vehicle" role="tabpanel" aria-labelledby="second-tab-vehicle">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="in-vehicle-chgowner" placeholder="Placa del vehículo" maxlength="6"/>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-chgowner"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                        </div>
                        <div class="col-xl-12 col-md-12 mt-2">
                            <div class="row" id="content-vehicle-chgowner"></div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="sec2-href-vehicle" role="tabpanel" aria-labelledby="sec2-tab-vehicle">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="in-vehicle-chgdriver" placeholder="Placa del vehículo" maxlength="6"/>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-chgdriver"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                        </div>
                        <div class="col-xl-12 col-md-12 mt-2">
                            <div class="row" id="content-vehicle-chgdriver"></div>
                        </div>    
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="third-href-vehicle" role="tabpanel" aria-labelledby="third-tab-vehicle">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="in-vehicle-down" placeholder="Placa del vehículo" maxlength="6"/>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-down"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="col-xl-12 col-md-12 mt-2">
                        <div class="row" id="content-vehicle-down"></div>
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