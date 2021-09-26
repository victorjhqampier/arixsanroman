<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-4 col-md-4">
        <div class="card bg-light border-light mb-4">
            <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Datos del vehículo</h6>
                <div class="table-responsive-sm">
                    <table class="table table-sm" id="evalsub-table-vehicle">
                        <tbody>
                            <tr>
                                <th scope="row">Placa</th>
                                <td>@mdo ArixCorp</td>
                            </tr>
                            <tr>
                                <th scope="row">Marca y Modelo</th>
                                <td>@fat ArixCorp.</td>
                            </tr>
                            <tr>
                                <th scope="row">Descripcion</th>
                                <td>@mdo ArixCorp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-md-8">
        <div class="card bg-light border-light mb-4">
            <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Datos de la certificación</h6>
                <div class="table-responsive-sm">
                    <table class="table table-sm" id="evalsub-table-vehicleresa">
                        <tbody>
                            <tr>
                                <th scope="row">N° de certificación</th>
                                <td>@mdoArixCorp</td>
                            </tr>
                            <tr>
                                <th scope="row">RUC</th>
                                <td>@mdoArixCorp</td>
                            </tr>
                            <tr>
                                <th scope="row">Empresa</th>
                                <td>@fatArixCorp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12">
        <div class="card text-white bg-info mb-4">
            <div class="card-header text-center"><strong>EVALUAR INSPECCIÓN VEHICULAR</div>
            <div class="card-body">               
                <form id="form-evaluation">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="eval-claseeval">Condición de evaluación</label>
                            <select id="eval-claseeval" name="txtevalclase" class="form-control">
                                <option value="Resolucion de tipo -R1" selected>Elegir</option>
                            </select>
                            <input type="hidden" class="d-none" id="eval-certifid" name="txtcertifid" readonly />
                        </div>
                        <div class="form-group col-md-8">
                            <label for="eval-obserbations">Observaciones</label>
                            <textarea class="form-control" id="eval-obserbations" name="txtevalobserbations" rows="3"></textarea>
                        </div>
                    </div>
                </form>
                <div class="alert alert-dark text-center" role="alert">
                    <button class="btn btn-success" id="btn-enviar-evaluation">Enviar</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    (function(){
        $("#evalsub-table-vehicle").find('td:eq(0)').text(mpsr_eval_basevar['placa']);
        $("#evalsub-table-vehicle").find('td:eq(1)').text(mpsr_eval_basevar['marca']);
        $("#evalsub-table-vehicle").find('td:eq(2)').text(mpsr_eval_basevar['descripcion']);
        $("#evalsub-table-vehicleresa").find('td:eq(0)').text(mpsr_eval_basevar['ncertificado']);
        $('#form-evaluation #eval-certifid').val(mpsr_eval_basevar['axidcert']);
        $("#evalsub-table-vehicleresa").find('td:eq(1)').text(mpsr_eval_basevar['ruc']);
        $("#evalsub-table-vehicleresa").find('td:eq(2)').text(mpsr_eval_basevar['emp']);
    })();
    arixshell_cargar_opciones('#form-evaluation #eval-claseeval','mpsrlicencias/mpsr_get_eval_options');
    $('#form-evaluation').validate({
        errorClass: "text-danger",
        rules: {
            txtevalclase: {required: true},
            txtcertifid: {required: true, maxlength: 80, minlength: 13},
            txtevalobserbations: {required: true, maxlength: 255, minlength: 5}
        }
    }); 

    $('#second-content-evaluation').on('click', '#btn-enviar-evaluation', function(){       
        if($('#form-evaluation').valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_save_eval', $("#form-evaluation").serialize());            
            if(request['status']===true){
                $("#second-content-evaluation .card-body").last().addClass('text-center').html('<i class="material-icons" style="color: #5cb85c; font-size:7rem">done</i>');
                $('#main-content-evaluation #eval-search-certif').focus();
                arixshell_alert_notification('success','Guardado correctamente...');                
             }else{
                //console.log('EVALUATION_SHOW -> NO GUARDAR');
                $("#second-content-evaluation .card-body").last().addClass('text-center').html('<i class="material-icons" style="color: red; font-size:7rem">cancel</i>');
                $('#main-content-evaluation #eval-search-certif').focus();
                arixshell_alert_notification('error','Algo salió mal, no guardamos los datos');
            }
        }else{
            return;
        }
    });

</script>