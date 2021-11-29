<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="list-card-cajas"></div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn-id-en-cajas");
    arixshell_cargar_botones_menu('btn-refrescar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //$('#datat-products'').DataTable().clear();
        //$('#datat-products-list').DataTable().ajax.reload();
    });
    $("footer").removeClass("d-none");
    $("#nav-idont-know").parent().removeClass("d-none");
    (function(){
       let request = arixshell_download_datos('restpuntodeventa/cajas_get_cajas');       
       $("#list-card-cajas").html("");
       for(i =0; i<request.length; i++){
            restpv_lista_card("#list-card-cajas", request[i].axid, request[i].caja, request[i].person, request[i].sesion);
       }
    }());
    $('#list-card-cajas').on( 'click', '.card',function(){
        let request = $(this).attr('odd');
        request = arixshell_upload_datos('restpuntodeventa/cajas_post_user_access', 'txtdata='+request+'&');
        //console.log(request);
        if(request.status==true){
            arixshell_cargar_contenido('restpuntodeventa/punto_venta_view','Caja activa');
        }else{
            arixshell_alert_notification('warning','Hay una sesión activa en la caja');
        }
    });
</script>