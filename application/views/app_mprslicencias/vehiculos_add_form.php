<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="card bg-light border-light mb-4">
                    <div class="card-header">
                        DESCRIPCIÓN RÁPIDA
                    </div>
                    <div class="card-body text-info">
                        <p><mark>Placa vehicular</mark> El vehículo no puede estar asociado a otras empresas. Si fuera el caso, debe Desasociarlo primero.</p>
                        <p><mark>Conductor</mark> Una persona solo puede operar con un vehiculo de la empresa. Además, el conductor debe estar habilitado.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-8">
                <div class="card bg-light border-light mb-4">
                    <div class="card-header">
                        AGREGAR VEHÍCULO Y CONDUCTOR
                    </div>
                    <div class="card-body">
                        <form id="form-vehicertif-newadd">
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
                                    </div>
                                </div>
                                <input type="hidden" class="d-none" id="certif-vehiplacaid" name="txtcertifvehiplacaid" readonly />
                                <input type="hidden" class="d-none" id="certif-empid" name="txtcertifempid" readonly />
                                <input type="hidden" class="d-none" id="certif-autid" name="txtcertifautid" readonly />
                                <input type="hidden" class="d-none" id="certif-driverid" name="txtcertifdriverid" readonly />
                                <div class="form-group col-md-12">
                                    <label for="certif-driverdoc">Conductor</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="certif-driverdoc" name="txtcertifdriverdoc" placeholder="DNI del conductor" />
                                        <input type="text" class="form-control d-none" id="certif-driverdescribe" name="txtcertifdriverdescribe" readonly />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="btn-search-drivercertif"><i class="fa fa-search"></i></button>
                                            <button class="btn btn-outline-secondary d-none" type="button" id="btn-restart-drivercertif"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12">
        <div class="alert alert-info text-right" role="alert">
            <button class="btn btn-secondary" id="btn-cancel-veh2certif">Cancelar</button>
            <button class="btn btn-success" id="btn-add-veh2certif">Guardar</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#btn-cancel-veh2certif').click(function() {
        $('#second-content-vehiadd').removeClass('d-none');
        $('#load-vehiculos-addform').html('');
        //mpsr_load_table_activevehicle('#dataTable_emp_activos',mpsr_vehiadd_basevar[0],mpsr_vehiadd_basevar[3]);
    });
    
    //$('#form-vehicertif-newadd #certif-times').mask('00/00/0000 00:00');
    //$("#form-vehicertif-newadd #certif-date").datetimepicker({theme:'dark', timepicker:true, datepiker:true, format: 'd/m/Y H:i', hours12:false, step:30});
    $('#form-vehicertif-newadd #certif-driverdoc').mask('99999999');
    $('#form-vehicertif-newadd #certif-vehiplacadoc').mask('AAA999', {reverse: true}).focus();
    $('#form-vehicertif-newadd #certif-empid').val(mpsr_vehiadd_basevar[0]);
    $('#form-vehicertif-newadd #certif-autid').val(mpsr_vehiadd_basevar[1]);
    //$('#form-vehicertif-newadd #certif-place').val(mpsr_vehiadd_basevar[4]);
    $('#form-vehicertif-newadd').validate({
        errorClass: "text-danger",
        rules: {
            txtcertifvehiplacadoc: {required: true, maxlength: 6, minlength: 6},
            txtcertifvehiplacadescribe: {required: true, maxlength: 200, minlength: 11},
            txtcertifvehiplacaid: {required: true, maxlength: 200, minlength: 13},
            txtcertifempid: {required: true, maxlength: 200, minlength: 9},
            txtcertifempid: {required: true, maxlength: 200, minlength: 9},
            txtcertifdriverdoc: {required: true, maxlength: 8, minlength: 8},
            txtcertifdriverdescribe: {required: true, maxlength: 200, minlength: 11},
            txtcertifdriverid: {required: true, maxlength: 200, minlength: 11}
            //txtcertifplace: {required: true, maxlength: 80, minlength: 9},
            //txtcertifdate: {required: true, maxlength: 16, minlength: 16}
        }
    }); 
    $('#btn-add-veh2certif').click(function() {        
        if($('#form-vehicertif-newadd').valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_asociacion_add', $('#form-vehicertif-newadd').serialize());
             if(request.status==true){
                //$('#btn-cancel-veh2certif').click();
                $('#load-vehiculos-addform').html(''); //cambiar de poscion
                arixshell_alert_notification('success','Guardado correctamente...');                            
                mpsr_load_table_activevehicle('#dataTable_emp_activos',mpsr_vehiadd_basevar[0],mpsr_vehiadd_basevar[3]);        
             }else{
                console.log('certif_add_vehi -> NO GUARDAR');
                $('#btn-cancel-veh2certif').click();
                arixshell_alert_notification('error','No pudimos guardar los datos, verifique la fota del vehiculo');
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
        let temp = $("#form-vehicertif-newadd #certif-vehiplacadoc").val();
        if(temp.length==6){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicate_asociation', 'txtdata='+arixshell_verify_data(temp)+'&');//true or false
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
                arixshell_alert_notification('warning',request.data);
             }
        }else{
             return;
        } 
    });
     //(2)PARA EL MODAL DE AGREGAR vehiculos
    $(document).on('click', '#btn-modalNewUser-forcertif', function(){
        let request = arixshell_read_cache_serial('mpsr0x005477newVehicle');
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
    //(1)PARA EL MODAL DE AGREGAR conductores
    $("#form-vehicertif-newadd #btn-search-drivercertif").click(function () {
        let temp = $("#form-vehicertif-newadd #certif-driverdoc").val();
        if(temp.length==8){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicate_driver', 'txtdata='+arixshell_verify_data(temp)+'&txtextra='+$('#form-vehicertif-newadd #certif-empid').val());//true or false
            if(request.status==true){//ya existe en la base de datos
                $('#form-vehicertif-newadd #certif-driverdescribe').val(request.data).removeClass('d-none');                
                $('#form-vehicertif-newadd #certif-driverid').val(request.id);
                $("#form-vehicertif-newadd #btn-restart-drivercertif").removeClass('d-none');
                $("#form-vehicertif-newadd #certif-driverdoc").addClass('d-none');
                $(this).addClass('d-none');
             }else if (request.status==false){
                //arixshell_write_cache_serial('mpsr0x005477newVehicle',temp);//clave y dato manejado por el progrmama
                arixshell_abrir_mainModal('HABILITAR NUEVO CONDUCTOR','mpsrlicencias/temp_driveradd','btn-modalNewDriver-fordriver');
             }else{
                arixshell_alert_notification('warning',request.data);
                $("#form-vehicertif-newadd #certif-driverdoc").val('');
             }
        }else{
             return;
        } 
    });
     //(2)PARA EL MODAL DE AGREGAR conductores
    $(document).on('click', '#btn-modalNewDriver-fordriver', function(){
        let request = arixshell_read_cache_serial('mpsr0x005477newDriver');//EL FORMULARIO LO GUARDA AQUI
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