<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
        
                <div class="table-responsive-sm">
                    <table class="table table-sm" id="retif-table-vehicledata">
                        <tbody>
                            <tr>
                                <th scope="row">Empresa</th>
                                <td>@mdo ArixCorp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="my-4" />
    </div>
    <div class="col-xl-12 col-md-12" id="second-content-certif-eval">
        <div class="card bg-light border-secondary mb-4">
            <div class="card-body">               
                <form id="form-inspect-programe">
                    <input type="text" class="form-control" id="inspect-emp-id" name="txtinspectempid" readonly />
                    <div class="form-row">
                        <div class="form-group col-md-8">
                        <label for="inspect-place">Lugar de inpección</label>
                        <input type="text" class="form-control form-control-sm" id="inspect-place" name="txtinspectplace" placeholder="Dirección de empresa" />


                        </div>
                        <div class="form-group col-md-4">
                            
                        <label for="inspect-date">Fecha de inspección</label>
                                <input type="text" class="form-control form-control-sm" id="inspect-date" name="txtinspectdate" placeholder="dd/mm/aaaa" />


                        </div>
                    </div>
                </form>
                <div class="alert alert-dark text-right" role="alert">
                    <button class="btn btn-success btn-sm" id="btn-enviar-inspecteval">Enviar</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    (function(){
        let mpsr_var=arixshell_read_cache_serial('mpsrevalcertification');
        $("#retif-table-vehicledata").find('td:eq(0)').text(mpsr_var.data);
        $("#form-inspect-programe #inspect-emp-id").val(mpsr_var.id);
    })();
    //arixshell_cargar_opciones('#form-inspect-programe #eval-claseeval','mpsrlicencias/mpsr_get_eval_options');
    //$('#form-inspect-programe #inspect-date').mask('00/00/0000 00:00');
    $("#form-inspect-programe #inspect-date").datetimepicker({theme:'dark', timepicker:false, datepiker:true, format: 'd/m/Y', weeks:true});
    $('#form-inspect-programe').validate({
        errorClass: "text-danger",
        rules: {
            txtevalclase: {required: true},
            txtinspectempid: {required: true, maxlength: 120, minlength: 13},
            txtevalobserbations: {required: true, maxlength: 255, minlength: 2}
        }
    }); 

    /*$('#second-content-certif-eval').on('click', '#btn-enviar-certifevaluation', function(){       
        if($('#form-inspect-programe').valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certification_eval', $("#form-inspect-programe").serialize());            
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
    });*/
    

</script>