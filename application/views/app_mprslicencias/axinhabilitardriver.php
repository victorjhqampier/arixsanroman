<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="in-vehicle-bysearch" placeholder="RUC" maxlength="6" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-vehicle-bysearch"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="alert alert-primary p-2" role="alert">
                    Dejar si efecto la licencia de conducir.
                </div>
            </div>
        </div>
        <hr class="my-4" />
    </div>
    <div class="col-xl-12 col-md-12 mt-2" id="content-vehicle-bysearch"></div>
</div>