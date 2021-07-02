<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-xl-12 col-md-12">
        <form id="form-empr-new-add">
            <div class="card-group">
                <div class="card">
                    <div class="card-header text-center"><strong>Datos de la Empresa de Transportes</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="emp-ruc">R.U.C.</label>
                            <input type="text" class="form-control col-sm-6" id="emp-ruc" name="txtruc" placeholder="RUC de la empresa"> </div>
                        <div class="form-group">
                            <label for="emp-rsocial">Razon Social</label>
                            <input type="text" class="form-control form-control-sm" id="emp-rsocial" name="txtrsocial" placeholder="Razon social de la empresa"> </div>
                        <div class="form-group">
                            <label for="emp-nombre">Nombre Comercial</label>
                            <input type="text" class="form-control form-control-sm" id="emp-nombre" name="txtnombre" placeholder="Nombre comercial de la empresa"> </div>
                        <div class="form-group">
                            <label for="emp-direccion">Dirección Fiscal</label>
                            <input type="text" class="form-control form-control-sm" id="emp-direccion" name="txtdireccion" placeholder="Dirección fiscal de la empresa"> </div>
                        <div class="form-group">
                            <label for="emp-telefonos">Teléfonos</label>
                            <input type="text" class="form-control form-control-sm" id="emp-telefonos" name="txttelefonos" placeholder="Teléfonos de la empresa"> </div>
                    </div>
                    <div class="card-footer"> <small class="text-muted">El ruc se comprobará para evitar duplicidad</small> </div>
                </div>
                <div class="card">
                    <div class="card-header text-center"><strong>Datos de la Autorización</strong></div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-nresolucion">Número de Resolución</label>
                                <input type="text" class="form-control" id="aut-nresolucion" name="txtnresolucion" placeholder="Número de resolución"> </div>
                            <div class="form-group col-md-6">
                                <label for="aut-cresolucion">Clase de Resolución</label>
                                <input type="text" class="form-control" id="aut-cresolucion" name="txtcresolucion" placeholder="Clase de resolución"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="aut-modalidad">Modalidad se servicio</label>
                                <select id="aut-modalidad" name="txtmodalidad" class="form-control form-control-sm">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="aut-categoria">Categoria de Unidad</label>
                                <select id="aut-categoria" name="txtcategoria" class="form-control form-control-sm">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="aut-tunidad">Tipo de Unidad</label>
                                <select id="aut-tunidad" name="txtunidad" class="form-control form-control-sm">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="aut-horarios">Horarios</label>
                                <input type="text" class="form-control form-control-sm" id="aut-horarios" name="txthorarios" placeholder="Horarios"> </div>
                            <div class="form-group col-md-5">
                                <label for="aut-frecuencia">Frecuencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-frecuencia" name="txtfrecuencia" placeholder="Frecuencia"> </div>
                            <div class="form-group col-md-2">
                                <label for="aut-flota">Flota</label>
                                <input type="number" class="form-control form-control-sm" id="aut-flota" name="txtflota" placeholder="Flota"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-finicio">Fecha de inicio de vigencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-finicio" name="txtfinicio" placeholder="Cantidad"> </div>
                            <div class="form-group col-md-6">
                                <label for="aut-ffinal">Fecha de vencimiento</label>
                                <select id="aut-ffinal" name="txtffinal" class="form-control form-control-sm">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-rinicio">Paradero Inicio</label>
                                <textarea class="form-control" id="aut-rinicio" name="txtrinicio" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-rfinal">Paradero Retorno</label>
                                <textarea class="form-control" id="aut-rfinal" name="txtrfinal" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <small class="text-muted">Last updated 3 mins ago</small> </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 mt-2">
            <div class="alert alert-dark text-center" role="alert">
                <button class="btn btn-success btn-sm" id="btn-enviar-empadd">Guargar</button>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    arixshell_iniciar_llaves_locales("#btn_id_empresas_nuevo");
    arixshell_cargar_botones_menu('btn-cerrar');
    //$('#form-usuario-sucursal #select-permiso').selectpicker();//inicializa la multiple seleccion
    $(arixshell_cargar_llave_local(1)+' .card').on("click", "button", function() {//click unico en la página
        var a = $(this).closest('div').attr('id');
        alert('-> '+a);
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
        //arixshell_hacer_pagina_reiniciar();
    }); 
    $("#form-empr-new-add").validate({
        errorClass: "text-danger",
        rules: {
            txtruc: {
                required: true,
                maxlength: 11,
                minlength: 11
            },
            txtrsocial: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtnombre: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtdireccion: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txttelefonos: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtnresolucion: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtcresolucion: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtmodalidad: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtcategoria: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtunidad: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txthorarios: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtfrecuencia: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtflota: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtfinicio: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtffinal: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtrinicio: {
                required: true,
                maxlength: 32,
                minlength: 7
            },
            txtrfinal: {
                required: true,
                maxlength: 32,
                minlength: 7
            }
        }
    })
    $("#btn-enviar-empadd").click(function () {
        if($("#form-empr-new-add").valid()){
            console.log($('form').serialize());
        }
        else{
            console.log($("#form-empr-new-add").valid());
        }

    });
    /*$('#form-empr-new-add').on("click", "#btn-enviar-empadd", function(){
        if($("#form-empr-new-add").valid()){
            console.log($('form').serialize());
        }
        else{
            console.log($("#form-empr-new-add").valid());
            //return;
        }
    });*/
}); 
</script>