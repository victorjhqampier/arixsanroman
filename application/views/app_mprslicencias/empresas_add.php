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
                                <select id="aut-cresolucion" name="txtcresolucion" class="form-control">
                                    <option value="Resolucion de tipo -R1" selected>Resolucion de tipo -R1</option>
                                    <option value="Resolucion de tipo -R2" >Resolucion de tipo -R2</option>
                                    <option value="Resolucion de tipo -R3" >Resolucion de tipo -R3</option>
                                    <option value="Resolucion de tipo -R4" >Resolucion de tipo -R4</option>
                                    <option value="Resolucion de tipo -R5" >Resolucion de tipo -R5</option>
                                    <option value="Resolucion de tipo -R6" >Resolucion de tipo -R6</option>
                                    <option value="Resolucion de tipo -R7" >Resolucion de tipo -R7</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="aut-modalidad">Modalidad se servicio</label>
                                <select id="aut-modalidad" name="txtmodalidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="aut-categoria">Categoria de Unidad</label>
                                <select id="aut-categoria" name="txtcategoria" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="aut-tunidad">Tipo de Unidad</label>
                                <select id="aut-tunidad" name="txtunidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
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
                                <input type="number" class="form-control form-control-sm" id="aut-flota" name="txtflota" placeholder="Flota" value="10"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-finicio">Fecha de inicio de vigencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-finicio" name="txtfinicio" placeholder="Fecha de inicio de vigencia"> </div>
                            <div class="form-group col-md-6">
                                <label for="aut-ffinal">Fecha de vencimiento</label>
                                <select id="aut-ffinal" name="txtffinal" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
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
                <button class="btn btn-success" id="btn-enviar-empadd">Guardar</button>
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
    //const hoy = new Date();
    //console.log(formatoFecha(hoy, 'dd/mm/yy'));
    mpsr_cargar_opciones('#form-empr-new-add #aut-modalidad','mpsrlicencias/mpsr_get_modalidad');    
    mpsr_cargar_opciones('#form-empr-new-add #aut-categoria','mpsrlicencias/mpsr_get_categoria', '<option selected>Escoja...</option>');
    mpsr_subir_fechas('#form-empr-new-add #aut-finicio',true);
    mpsr_subir_fechas('#form-empr-new-add #aut-ffinal',6);
    $('#form-empr-new-add #aut-categoria').change(function(){
        var r = $(this).val();
        mpsr_subir_opciones('#form-empr-new-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad', 'txtdata='+r+'&');
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
                maxlength: 150,
                minlength: 7
            },
            txtdireccion: {
                required: true,
                maxlength: 150,
                minlength: 7
            },
            txttelefonos: {
                required: true,
                maxlength: 150,
                minlength: 7
            },
            txtnresolucion: {
                required: true,
                maxlength: 80,
                minlength: 5
            },
            txtcresolucion: {
                required: true
            },
            txtmodalidad: {
                required: true,                
            },
            txtcategoria: {
                required: true,
            },
            txtunidad: {
                required: true,
            },
            txthorarios: {
                required: true,
                maxlength: 80,
                minlength: 7
            },
            txtfrecuencia: {
                required: true,
                maxlength: 80,
                minlength: 7
            },
            txtflota: {
                required: true,
                maxlength: 3,
                minlength: 1
            },
            txtfinicio: {
                required: true,
                maxlength: 10,
                minlength: 6
            },
            txtffinal: {
                required: true,
            },
            txtrinicio: {
                required: true,
                minlength: 5
            },
            txtrfinal: {
                required: true,
                minlength: 5
            }
        }
    })
    $("#btn-enviar-empadd").click(function () {
        if($("#form-empr-new-add").valid()){
            console.log($('form').serialize());
        }
        else{
            console.log($("#form-empr-new-add").valid());
            return;
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