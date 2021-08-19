<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTabVehicles" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="down-tab-empresa" data-toggle="tab" href="#down-href-empresa" role="tab" aria-controls="home" aria-selected="true">Inhabilitar Empresa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="up-tab-empresa" data-toggle="tab" href="#up-href-empresa" role="tab" aria-controls="profile" aria-selected="false">Habilitar Empresa</a>
    </li>    
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="down-href-empresa" role="tabpanel" aria-labelledby="down-tab-empresa">
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
    <div class="tab-pane fade" id="up-href-empresa" role="tabpanel" aria-labelledby="up-tab-empresa">
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