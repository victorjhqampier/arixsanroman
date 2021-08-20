<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12" id="renovaction-first">
        <div class="row">
            <div class="form-group col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="input-search-emp" placeholder="RUC de la empresa"/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btn-search-emp"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="alert alert-primary p-2" role="alert">
                    Para continuar, La autorizacion actual debe caducar el 31 de diciembre de éste año.
                </div>
            </div>
        </div>
        <hr class="my-4"/>
    </div>
    <div class="col-xl-12 col-md-12 mt-2" id="renovation-second"></div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btns-menu-renova-add");
    arixshell_cargar_botones_menu('btn-cerrar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_hacer_pagina_atras();
    });
    mpsr_vehiadd_basevar='';
    $('#renovaction-first #input-search-emp').mask('99999999999').focus();
    $('#renovaction-first').on('click', '#btn-search-emp', function(){
        let request = $('#renovaction-first #input-search-emp').val();
        if(request.length==11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_renovacion', 'txtdata='+arixshell_verify_data(request)+'&');
            $('#renovaction-first #input-search-emp').val('');           
            if(request.status==true){
                mpsr_vehiadd_basevar=request;
                $('#renovaction-first').addClass('d-none');                 
                arixshell_cargar_subpaginas("mpsrlicencias/renovacion_add_form","#renovation-second");                                          
            }else{
                arixshell_alert_notification('error','La empresa no reune las condiciones para la renovación');
                $("#renovation-second").html("");
            }
        }else{
            return;
        }
    });
</script>