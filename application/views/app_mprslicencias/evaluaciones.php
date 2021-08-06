<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="main-content-evaluation">
    <div class="col-xl-12 col-md-12">
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="eval-search-certif" placeholder="N° de certificación" maxlength="15"/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-search-evalcertif"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
    </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="row" id="second-content-evaluation"></div>
    </div>    
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_evaluaciones_check");
    var mpsr_eval_basevar;       
    $('#main-content-evaluation #eval-search-certif').focus();    
    $('#main-content-evaluation #eval-search-certif').keypress(function (a) {
        13 == a.which && $("#main-content-evaluation #btn-search-evalcertif").click();
    });
    $('#main-content-evaluation').on('click', '#btn-search-evalcertif', function(){
        let request = $('#main-content-evaluation #eval-search-certif').val();
        if(request.length==15){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_get_vehicle_bycertif', 'txtdata='+verifyMpsr(request)+'&');
            if(typeof(request['axidcert']) !== 'undefined'){
                mpsr_eval_basevar=request;
                $('#main-content-evaluation #eval-search-certif').val(''); 
                arixshell_cargar_subpaginas("mpsrlicencias/evaluations_show","#main-content-evaluation #second-content-evaluation");                             
            }else{
                arixshell_notification_alert('error','No encontramos resultados. Por favor, verifique el número de certificación');
                //$('#main-content-evaluation #eval-search-certif').val('');
                $("#main-content-evaluation #second-content-evaluation").html("");
            }
        }else{
            return;
        }        
    });
</script>