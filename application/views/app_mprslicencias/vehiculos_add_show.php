<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Vehículos Habilitados</h6>
    <div class="table-responsive-md">
        <table class="table table-hover table-sm" id="dataTable_emp_activos">
            <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Conductor</th>
                    <th scope="col">Certificación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<div class="col-xl-12 col-md-12"></div>
<script type="text/javascript">
    function mpsr_autoload_btnadd(params) {
        if(params < mpsr_vehiadd_basevar[3]){
            $('#dataTable_emp_activos').parent().parent().siblings().first().html('<div class="alert alert-primary text-right" role="alert"><button class="btn btn-primary" id="btn-add-veh2emp">Agregar</button></div>');
        }else{
            return;
        }        
    }
    function mpsr_autoload_datatable(){
        $('#dataTable_emp_activos tbody').html('');
        var request = arixshell_upload_datos('mpsrlicencias/mpsr_get_vehicle_byemp', 'txtdata='+mpsr_vehiadd_basevar[0]+'&');//esta variable se encuanta el el padre
        //console.log(request);        
        if(typeof(request)==='object'){
            if(request.length>=1){ 
                mpsr_autoload_btnadd(request.length);                       
                for(var i = 0; i<request.length; i++){
                    $('#dataTable_emp_activos tbody').append('<tr odd="'+request[i]['axuidemp']+'"><td>'+request[i]['placa']+'</td><td>'+request[i]['hmarca']+'</td><td>'+request[i]['modelo']+'</td><td>'+request[i]['descripcion']+'</td><td>'+request[i]['driv_data']+' ('+request[i]['driv_licen']+')</td><td><span class="badge badge-success">'+request[i]['cert_status']+'</span></td><td>Acciones</td></tr>');
                }
            }else{
                mpsr_autoload_btnadd(0);
            }            
        }else{
            $('#dataTable_emp_activos tbody').append('<tr><h6>Sin vehículos</h6></tr>');
        }
    }    
    mpsr_autoload_datatable();
    $('#dataTable_emp_activos tbody').on( 'click', '.btn-detalles', function () {
        return;
    });
    $('#btn-add-veh2emp').click(function() {
        arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_form","#main-content-vehiadd #second-content-vehiadd");
    });
</script>