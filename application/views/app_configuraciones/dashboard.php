<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-4 col-md-4">
        mama
    </div>
    <div class="col-xl-4 col-md-4">
        php_sapi_name
    </div> 
    <div class="col-xl-4 col-md-4">
        hijos
    </div> 
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_dashboard");
    arixshell_cargar_botones_menu('btn-guardar,btn-cerrar,btn-borrar');

    $(arixshell_cargar_llave_local(0)).on("click", ".btn-borrar", function() {       
        data = arixshell_download_datos('configuraciones/axconfig_get_usuarios');
        alert('mira lamcponsola');
        console.log(data);
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-cerrar", function() {
        arixshell_alert_notification('success','click en el boton cerrar');
        
    });
</script>
