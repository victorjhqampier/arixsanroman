<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="certif-tab-first" data-toggle="tab" href="#certif-href-first" role="tab" aria-controls="home" aria-selected="true">Número de Certificado</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="certif-tab-second" data-toggle="tab" href="#certif-href-second" role="tab" aria-controls="profile" aria-selected="false">RUC de empresa</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="certif-href-first" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="row">
                    <div class="form-group col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="in-certificaction-bycert" placeholder="Número de Certificado" maxlength="15" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btn-certificaction-bycert"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="alert alert-info p-2" role="alert"><strong>(Resultados para este año)</strong> Reune los requisitos necesarios para la inspección vehicular.</div>
                    </div>
                </div>
                <hr class="my-4" />
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="certif-href-second" role="tabpanel" aria-labelledby="certif-tab-first">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="in-certificaction-byruc" placeholder="RUC de empresa" maxlength="15" />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-certificaction-byruc"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="alert alert-info p-2" role="alert"><strong>(Resultados para este año)</strong> Reune los requisitos necesarios para la inspección vehicular.</div>
                        </div>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //verifica que la empresa esté activo
    //conprueba las fechas de caucidad e laautorizacion
    //compruba las fechas de vigencia de la certificacion
    //PROBAR SI YA HAY CERTIFICACION PARA ÉSTE AÑO !!IMPORTANTE
    //PROBAR SI TIENE RENOVACIÓN
    arixshell_iniciar_llaves_locales("#btn_id_realcertification");
    
    mpsr_vehiadd_basevar='';
    $('#certif-href-first #in-certificaction-bycert').focus();
    $('#certif-href-second #in-certificaction-byruc').mask('99999999999');

    $('#certif-href-second').on('click', '#btn-certificaction-byruc', function(){
        let request = $('#certif-href-second #in-certificaction-byruc').val();
        if(request.length==11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_get_certification_byruc', 'txtdataruc='+verifyMpsr(request)+'&txtdata=6ACA79F493CEERkpkclNDV2IrejF2VG1BNlJkUmhEZz09');
            //console.log(request)
            if(request.status ==true){
                mpsr_vehiadd_basevar=request;//certificados_add_show
                arixshell_cargar_contenido("mpsrlicencias/certificados_add_show",request.ruc+' - '+request.nombre);
            }else{
                arixshell_alert_notification('error','No encontramos resultados. Por favor, verifique el estado de la renovación');
                $('#certif-href-second #in-certificaction-byruc').val('');
            }
        }else{
            return;
        }        
    });
</script>