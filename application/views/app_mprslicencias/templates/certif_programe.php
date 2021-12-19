<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
    <div class="table-responsive-sm">
        <table class="table table-sm table-dark" id="retif-table-vehicledata">
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
<div class="col-xl-12 col-md-12" id="second-content-certif-programe">
    <div class="card bg-info border-secondary mb-4">
        <div class="card-body">
            <form id="form-inspect-programe">
                <input type="hidden" class="d-none" id="inspect-emp-id" name="txtinspectempid" readonly />
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
                <button class="btn btn-success btn-sm" id="btn-enviar-programe">Enviar</button>
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

    $("#form-inspect-programe #inspect-place").focus();
    $("#form-inspect-programe #inspect-date").datetimepicker({theme:'dark', timepicker:false, datepiker:true, format: 'd/m/Y', weeks:true});
    $('#form-inspect-programe').validate({
        errorClass: "text-danger",
        rules: {
            txtinspectplace: {required: true},
            txtinspectempid: {required: true, maxlength: 120, minlength: 13},
            txtinspectdate: {required: true, maxlength: 255, minlength: 2}
        }
    }); 

    $('#second-content-certif-programe').on('click', '#btn-enviar-programe', function(){       
        if($('#form-inspect-programe').valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certification_programe', $("#form-inspect-programe").serialize()); 
            //console.log(request);          
            if(request.status==true){
                $('#table-for-progrmae-inspect').DataTable().ajax.reload();
                arixshell_alert_notification('success','Guardado correctamente...');            
                arixshell_cerrar_modalbase();                             
             }else{
                arixshell_alert_notification('error','Algo salió mal, no guardamos los datos');
                arixshell_cerrar_modalbase();                
            }
        }else{
            return;
        }
    });   

</script>