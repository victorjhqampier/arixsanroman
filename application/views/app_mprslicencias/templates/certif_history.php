<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="table-responsive-sm">
            <table class="table table-sm" id="retif-table-vehicledata">
                <tbody>
                    <tr>
                        <th scope="row">Vehículo</th>
                        <td>@mdo ArixCorp</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-12 col-md-12" id="second-content-certif-hist">
        <table class="table table-sm table-striped" id="table-data-empone">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    (function(){
        let request=arixshell_read_cache_serial('mpsrevalcertification');
        $("#retif-table-vehicledata").find('td:eq(0)').text(request.data);
        request=arixshell_upload_datos('mpsrlicencias/mpsr_get_certification_history', 'txtdata='+request.id+'&');
        if(request.status==true){  
        for( i = 0; i<Object.keys(request).length-1; i++){
            $('#table-data-empone tbody').append('<tr><td>'+
                request[i].fregistro+'</td><td>'+
                request[i].affectedrow+'</td><td>'+
                request[i].rowafter+'</td><td>'+
                request[i].axdescribe+'</td></tr>'
            );
        }
    }else{
        return;
    }
    })();
</script>