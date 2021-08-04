<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-12 col-md-12">
    <form id="form-vehicertif-newadd">
        <div class="card-group">
            <div class="card bg-light">
                <div class="card-header text-center"><strong>Datos Vehiculares</strong></div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="certif-vehiplacadoc">Placa Vehicular</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="certif-vehiplacadoc" name="txtcertifvehiplacadoc" placeholder="Placa del vehículo" />
                                <input type="text" class="form-control d-none" id="certif-vehiplacadescribe" name="txtcertifvehiplacadescribe" readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-search-placacertif"><i class="fa fa-search"></i></button>
                                    <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-placacertif"><i class="fa fa-times"></i></button>
                                </div>
                                <input type="hidden" class="d-none" id="certif-vehiplacaid" name="txtcertifvehiplacaid" readonly />
                            </div>
                        </div>
                        <input type="hidden" class="d-none" id="certif-empid" name="txtcertifempid" readonly />
                        <div class="form-group col-md-12">
                            <label for="certif-vehiplacadoc">Conductor</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="certif-driverdoc" name="txtcertifdriverdoc" placeholder="DNI del conductor" />
                                <input type="text" class="form-control d-none" id="certif-driverdescribe" name="txtcertifdriverdescribe" readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btn-search-drivercertif"><i class="fa fa-search"></i></button>
                                    <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-drivercertif"><i class="fa fa-times"></i></button>
                                </div>
                                <input type="hidden" class="d-none" id="certif-driverid" name="txtcertifdriverid" readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><small class="text-muted">Se verificarán datos duplicados</small></div>
            </div>
            <div class="card bg-light">
                <div class="card-header text-center"><strong>Certifificación Vehicular (Programación)</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="certif-place">Lugar de la Inspección</label>
                        <input type="text" class="form-control" id="certif-place" name="txtcertifplace" placeholder="Lugar de la inspección" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="certif-times">Fecha y hora de la Inspección</label>
                            <input type="text" class="form-control" id="certif-date" name="txtcertifdate" placeholder="Día/mes/año hh:mm" />
                        </div>
                    </div>
                </div>
                <div class="card-footer"><small class="text-muted">Se creará un codigo de identificación única</small></div>
            </div>
        </div>
    </form>
</div>
<div class="col-xl-12 col-md-12">
    <div class="alert alert-info text-right" role="alert">    
        <button class="btn btn-secondary" id="btn-cancel-veh2certif">Cancelar</button>
        <button class="btn btn-success" id="btn-add-veh2certif">Guardar</button>
    </div>
</div>
<script type="text/javascript">
    $('#btn-cancel-veh2certif').click(function() {
        arixshell_cargar_subpaginas("mpsrlicencias/vehicles_add_show","#main-content-vehiadd #second-content-vehiadd");
    });
    
    $('#form-vehicertif-newadd #certif-times').mask('00/00/0000 00:00');
    $("#form-vehicertif-newadd #certif-date").datetimepicker({theme:'dark', timepicker:true, datepiker:true, format: 'd/m/Y H:i', hours12:false, step:30});
    $('#form-vehicertif-newadd #certif-driverdoc').mask('99999999');
    $('#form-vehicertif-newadd #certif-vehiplacadoc').mask('AAA999', {reverse: true}).focus();
    $('#form-vehicertif-newadd #certif-empid').val(mpsr_vehiadd_basevar[0]);
    $('#form-vehicertif-newadd #certif-place').val(mpsr_vehiadd_basevar[4]);
    $('#form-vehicertif-newadd').validate({
        errorClass: "text-danger",
        rules: {
            txtcertifvehiplacadoc: {required: true, maxlength: 6, minlength: 6},
            txtcertifvehiplacadescribe: {required: true, maxlength: 200, minlength: 11},
            txtcertifvehiplacaid: {required: true, maxlength: 80, minlength: 13},
            txtcertifempid: {required: true, maxlength: 80, minlength: 9},
            txtcertifdriverdoc: {required: true, maxlength: 8, minlength: 8},
            txtcertifdriverdescribe: {required: true, maxlength: 200, minlength: 11},
            txtcertifdriverid: {required: true, maxlength: 80, minlength: 11},
            txtcertifplace: {required: true, maxlength: 80, minlength: 9},
            txtcertifdate: {required: true, maxlength: 16, minlength: 16}
        }
    }); 
    $('#btn-add-veh2certif').click(function() {        
        if($('#form-vehicertif-newadd').valid()){
            var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certificado_add', $('#form-vehicertif-newadd').serialize());
             if(request['status']===true){
                $('#btn-cancel-veh2certif').click();
                arixshell_notification_alert('success','Guardado correctamente...');                
             }else{
                console.log('certif_add_vehi -> NO GUARDAR');
                $('#btn-cancel-veh2certif').click();
                arixshell_notification_alert('error','Algo salió mal, no guardamos los datos');
            }
        }else{
            return;
        }
    });
    $("#form-vehicertif-newadd #btn-restart-placacertif").click(function () {
        $(this).addClass('d-none');
        $("#form-vehicertif-newadd #certif-vehiplacadescribe").val("").addClass('d-none');
        $("#form-vehicertif-newadd #btn-search-placacertif").removeClass('d-none');
        $("#form-vehicertif-newadd #certif-vehiplacadoc").removeClass('d-none').val("").focus();
    });
    $("#form-vehicertif-newadd #btn-restart-drivercertif").click(function () {
        $(this).addClass('d-none');
        $("#form-vehicertif-newadd #certif-driverdescribe").val("").addClass('d-none');
        $("#form-vehicertif-newadd #btn-search-drivercertif").removeClass('d-none');
        $("#form-vehicertif-newadd #certif-driverdoc").removeClass('d-none').val("").focus();
    });
    //(1) PARA EL MODAL AGREGAR VEHICULOS
    $("#form-vehicertif-newadd #btn-search-placacertif").click(function () {
        var temp = $("#form-vehicertif-newadd #certif-vehiplacadoc").val();
        if(temp.length==6){
            var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicate_certifvehi', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $('#form-vehicertif-newadd #certif-vehiplacadescribe').val(request['data']).removeClass('d-none');                
                $('#form-vehicertif-newadd #certif-vehiplacaid').val(request['id']);
                $("#form-vehicertif-newadd #btn-restart-placacertif").removeClass('d-none');
                $("#form-vehicertif-newadd #certif-vehiplacadoc").addClass('d-none');
                $(this).addClass('d-none');
             }else if(request['status']==false){
                arixshell_write_cache_serial('mpsr0x005477newVehicle',temp);//clave y dato manejado por el progrmama
                arixshell_abrir_mainModal('AGREGAR NUEVO VEHÍCULO','mpsrlicencias/temp_vehicleadd','btn-modalNewUser-forcertif');
             }else{
                $("#form-vehicertif-newadd #certif-vehiplacadoc").val('');
                arixshell_notification_alert('warning',request['data']);
             }
        }else{
             return;
        } 
    });
     //(2)PARA EL MODAL DE AGREGAR vehiculos
    $(document).on('click', '#btn-modalNewUser-forcertif', function(){
        var request = arixshell_read_cache_serial('mpsr0x005477newVehicle');
        if(request!==null){
            $('#form-vehicertif-newadd #certif-vehiplacadescribe').val(request['data']).removeClass('d-none');                
            $('#form-vehicertif-newadd #certif-vehiplacaid').val(request['id']);
            $("#form-vehicertif-newadd #btn-restart-placacertif").removeClass('d-none');
            $("#form-vehicertif-newadd #certif-vehiplacadoc").addClass('d-none');
            $('#form-vehicertif-newadd #btn-search-placacertif').addClass('d-none');
            arixshell_cerrar_mainModal();    
        }else{
            arixshell_cerrar_mainModal();
        }
    });
    //(2)PARA EL MODAL DE AGREGAR conductores
    $("#form-vehicertif-newadd #btn-search-drivercertif").click(function () {
        var temp = $("#form-vehicertif-newadd #certif-driverdoc").val();
        if(temp.length==8){
            var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicate_certifdriver', 'txtdata='+temp+'&');//true or false
            if(request['status']==true){//ya existe en la base de datos
                $('#form-vehicertif-newadd #certif-driverdescribe').val(request['data']).removeClass('d-none');                
                $('#form-vehicertif-newadd #certif-driverid').val(request['id']);
                $("#form-vehicertif-newadd #btn-restart-drivercertif").removeClass('d-none');
                $("#form-vehicertif-newadd #certif-driverdoc").addClass('d-none');
                $(this).addClass('d-none');
             }else{
                //arixshell_write_cache_serial('mpsr0x005477newVehicle',temp);//clave y dato manejado por el progrmama
                arixshell_abrir_mainModal('AGREGAR NUEVO CONDUCTOR','mpsrlicencias/temp_driveradd','btn-modalNewDriver-fordriver');
             }
        }else{
             return;
        } 
    });
     //(2)PARA EL MODAL DE AGREGAR conductores
    $(document).on('click', '#btn-modalNewDriver-fordriver', function(){
        var request = arixshell_read_cache_serial('mpsr0x005477newDriver');//EL FORMULARIO LO GUARDA AQUI
        if(request!==null){
            $('#form-vehicertif-newadd #certif-driverdescribe').val(request['data']).removeClass('d-none');                
            $('#form-vehicertif-newadd #certif-driverid').val(request['id']);
            $("#form-vehicertif-newadd #btn-restart-drivercertif").removeClass('d-none');
            $("#form-vehicertif-newadd #certif-driverdoc").addClass('d-none');
            $('#form-vehicertif-newadd #btn-search-drivercertif').addClass('d-none');
            arixshell_cerrar_mainModal();    
        }else{
            arixshell_cerrar_mainModal();
        }
    });

    //---------------------examples-----------------------
    //<button class="btn btn-outline-secondary" type="button" id="button-probe">eliminar</button>
    $('#button-probe').click(function(){
        //arixshell_confirm_alert('mpsrlicencias/mpsr_pruebas','txtdata=txtexample&','#btn-cancel-veh2certif','¿Desea anular el registro?','Registro 123',btntext='Si, Anular',icono='warning')
        //mpsr_notification_alert();
    });    
</script>