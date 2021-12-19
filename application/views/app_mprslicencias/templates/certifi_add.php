<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
        
                <div class="table-responsive-sm">
                    <table class="table table-sm table-dark" id="retif-table-vehicledata">
                        <tbody>
                            <tr>
                                <th scope="row">Vehículo</th>
                                <td>@mdo ArixCorp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    </div>
    <div class="col-xl-12 col-md-12" id="second-content-certif-eval">
        <div class="card bg-info mb-4">
            <div class="card-header text-center">CERTIFICAR VEHÍULO</div>
            <div class="card-body">               
                <form id="form-certif-eval">
                    <input type="hidden" class="d-none" id="eval-certifid" name="txtcertifid" readonly />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="eval-claseeval">¿Presenta todos los requisitos?</label>
                            <select id="eval-claseeval" name="txtevalclase" class="form-control">                                
                                <option value="E2F9DEA02F443NWNRUVVmWGphRWZuRUVmNmhEc3VsUT09">No, Esperar regularización</option>
                                <option value="78A8A91824B27cFlFMlRPVFJBcHFQMWt0eVhvRXd0Zz09" selected>Si, listo para programación</option>
                            </select>                            
                        </div>
                        <div class="form-group col-md-8">
                            <label for="eval-obserbations">Descripción</label>
                            <textarea class="form-control" id="eval-obserbations" name="txtevalobserbations" rows="3"></textarea>
                        </div>
                    </div>
                </form>
                <div class="alert alert-dark text-center" role="alert">
                    <button class="btn btn-success" id="btn-enviar-certifevaluation">Enviar</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    (function(){
        let mpsr_var=arixshell_read_cache_serial('mpsrevalcertification');
        $("#retif-table-vehicledata").find('td:eq(0)').text(mpsr_var.data);
        $("#form-certif-eval #eval-certifid").val(mpsr_var.id);
    })();
    //arixshell_cargar_opciones('#form-certif-eval #eval-claseeval','mpsrlicencias/mpsr_get_eval_options');
    $('#form-certif-eval').validate({
        errorClass: "text-danger",
        rules: {
            txtevalclase: {required: true},
            txtcertifid: {required: true, maxlength: 120, minlength: 13},
            txtevalobserbations: {required: true, maxlength: 255, minlength: 2}
        }
    }); 

    $('#second-content-certif-eval').on('click', '#btn-enviar-certifevaluation', function(){       
        if($('#form-certif-eval').valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certification_eval', $("#form-certif-eval").serialize());            
            if(request.status==true){
                $('#dataTable-recertif-real').DataTable().ajax.reload();             
                arixshell_cerrar_modalbase();
                arixshell_alert_notification('success','Guardado correctamente...');              
             }else{
                arixshell_cerrar_modalbase();
                arixshell_alert_notification('error','Algo salió mal, no guardamos los datos');
            }
        }else{
            return;
        }
    });

</script>