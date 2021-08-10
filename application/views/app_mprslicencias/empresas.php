<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="ul-list-emp">
  <li class="nav-item">
    <a class="nav-link active" odd="1" href="javascript:;">Empresas Activas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" odd="2" href="javascript:;">Con autorizacion vencida</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" odd="3" href="javascript:;">Busqueda Específica</a>
  </li>
</ul>
<div class="row">
    <div class="col-xl-12 col-md-12 mt-2" id="main-emp-active"></div>
</div> 
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_empresas","#con_id_empresas");//esta ultima se carga en el DOM secundario
    arixshell_cargar_botones_menu('btn-agregar');
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {
        arixshell_cargar_contenido('mpsrlicencias/compania_add','Agregar Nueva Empresa');
    });
    //(function(){})();
    (function(){mpsr_emp_loaddata("6ACA79F493CEEeEQ3Zk9LVUo3bTdEWThOaWcxK1VNQT09");})();
    $('#ul-list-emp').on("click", "a", function() {
        $('#ul-list-emp').find('a').removeClass('active');$(this).addClass('active');
        var val = parseInt($(this).attr('odd'));
        switch (val) {
            case 1:
                mpsr_emp_loaddata("6ACA79F493CEEeEQ3Zk9LVUo3bTdEWThOaWcxK1VNQT09");
                break;
            case 2:                
                mpsr_emp_loaddata("42B1F54D1306DRVB1NktVNUUrTkpnZHlJUEg4WFdKQT09",'btn-detalles,btn-borrar,btn-imprimir');
                $('#table-data-emp tbody').addClass('text-danger');
                break;
            default:
                $('#main-emp-active').html('en construccion');
                break;
        }
    });    
</script>     