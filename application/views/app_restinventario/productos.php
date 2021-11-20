<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#empleadosactive" role="tab" aria-controls="home" aria-selected="true">            
            <select class=" form-control-plaintext form-control-sm" style="margin: -6px 6px;" id="product-list-cat"><option value="CDC84DE2700EEbjFUYmxzb0w4TWpGT2lMbGtBTm50QT09">Todas las categorias</option></select>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#empbusqueda" role="tab" aria-controls="contact" aria-selected="false">Búqueda Avanzada</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="empleadosactive" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-md">
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-2">               
                    <table class="table table-striped table-hover table-sm" id="datat-products"><!-- table-sm  table-dark-->
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">CÓDIGO</th>
                          <th scope="col">PRODUCTO</th>
                          <th scope="col">DESCRIPCION</th>
                          <th scope="col">CATEG.</th>
                          <th scope="col">STOCK</th>
                          <th scope="col">COMPRA</th>
                          <th scope="col">VENTA</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="empbusqueda" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <div class="col-xl-12 col-md-12 mt-2">
                <div class="input-group input-group-sm mb-3">
                  <input type="text" class="form-control" placeholder="Documento del empleado" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                  </div>
                </div>                
            </div>
        </div>         
    </div>
</div>
<script type="text/javascript">
    arixshell_iniciar_llaves_locales("#btn_id_productos");
    arixshell_cargar_botones_menu('btn-refrescar,btn-agregar');
    $("footer").addClass("d-none");
    $("#nav-idont-know").parent().removeClass("d-none");
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-agregar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        arixshell_cargar_contenido('restinventario/productos_add','Agregar Nuevo Producto');
    });
    $(arixshell_cargar_llave_local(0)).on("click", ".btn-refrescar", function() {// 0 = #btn_id_empleados_1; 1 = #con_id_empleados
        //$('#datat-products'').DataTable().clear();
        $('#datat-products').DataTable().ajax.reload(); 
        console.log('reloades')      
    });

    arixshell_cargar_opciones('#product-list-cat','restinventario/productos_get_category').then(function(){
        rest_load_datatable_producto('#datat-products',$('#product-list-cat').val());
    });
          
    $('#datat-products tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_alert_notification('success',uid);
    });
    $('#datat-products tbody').on( 'click', '.btn-editar',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_write_cache_serial('e0x005477arixNewUser',uid);//clave y valor
        arixshell_cargar_contenido('restinventario/productos_edit_form','Editar '+fila.find('td:eq(1)').text());
    });
    $('#datat-products tbody').on( 'click', '.btn-banear',function(){
        let fila = $(this).closest("tr");
        let uid = fila.attr('odd');
        arixshell_alert_delete('question','Desea suspender el Producto ',fila.find('td:eq(1)').text(),'Si, Suspender','restinventario/productos_path_suspend','txtdata='+uid+'&',arixshell_cargar_llave_local(0)+' .btn-refrescar');
    });
    $("#product-list-cat").change(function(){
        $('#datat-products').DataTable().destroy();
        rest_load_datatable_producto('#datat-products',$(this).val()); 
    });
</script>