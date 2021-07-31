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
                                    <input type="text" class="form-control" id="certif-vehiplacadoc" name="txtcertifvehiplacadoc" placeholder="Placa del vehículo">
                                    </br>
                                    <input type="text" class="form-control" id="certif-vehiplacadescribe" name="txtcertifvehiplacadescribe" readonly>
                                    <div class="input-group-append">                                        
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-placacertif"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary" type="button" id="btn-restart-placacertif"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="certif-vehiplacaid" name="txtcertifvehiplacaid" readonly>
                                </div>
                        </div>
                        <input type="hidden" class="d-none" id="certif-empid" name="txtcertifempid" readonly>
                        <div class="form-group col-md-12">                                
                                <label for="certif-vehiplacadoc">Conductor</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="certif-driverdoc" name="txtcertifdriverdoc" placeholder="DNI del conductor">
                                    </br>
                                    <input type="text" class="form-control" id="certif-driverdescribe" name="txtcertifdriverdescribe" readonly>
                                    <div class="input-group-append">                                        
                                        <button class="btn btn-outline-secondary" type="button" id="btn-search-drivercertif"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-outline-secondary" type="button" id="btn-restart-drivercertif"><i class="fa fa-times"></i></button>
                                    </div>
                                    <input type="hidden" class="d-none" id="certif-driverid" name="txtcertifdriverid" readonly>
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
                        <input type="text" class="form-control" id="certif-place" name="txtcertifplace" placeholder="Lugar de la inspección">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="certif-times">Fecha y hora de la Inspección</label>
                            <input type="text" class="form-control" id="certif-times" name="txtcertiftimes" placeholder="Día/mes/año hh:mm">
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
    $('#btn-add-veh2certif').click(function() {
        console.log($('#form-vehicertif-newadd').serialize());
    });
    $('#form-vehicertif-newadd #certif-times').mask('00/00/0000 00:00');
    $('#form-vehicertif-newadd #certif-driverdoc').mask('99999999');
    $('#form-vehicertif-newadd #certif-vehiplacadoc').mask('AAA999', {reverse: true}).focus();
    $('#form-vehicertif-newadd #certif-empid').val(mpsr_vehiadd_basevar[0]);
    $('#form-vehicertif-newadd #certif-place').val(mpsr_vehiadd_basevar[4]);
    
//     function certif_autoLoad_data(placa){//en construccion
//          request = arixshell_download_datos('');
//          if (request['dni']==placa){
//              $(thisFormcertif+"#per-names").val(request.nombres);
//              $(thisFormcertif+"#per-lastname").val(request.apellidoPaterno);
//              $(thisFormcertif+"#per-firstname").val(request.apellidoMaterno);
//          }else{
//              return;
//          }
//     }


//     $(thisFormcertif+'#certif-licenseid').focus();
//     arixshell_cargar_opciones(thisFormcertif+'#certif-catclass','mpsrlicencias/mpsr_get_class_licencia');
//     $(thisFormcertif).validate({
//         errorClass: "text-danger",
//         rules: {
//             txtcertiflicense: {
//                 required: true,
//                 maxlength: 11,
//                 minlength: 9
//             },
//             txtcertifvehiplacadoc: {
//                 required: true,
//                 maxlength: 8,
//                 minlength: 8
//             },
//             txtcertifvehiplacadescribe: {
//                 required: true,
//                 maxlength: 220,
//                 minlength: 12
//             },
//             txtcertifvehiplacaid: {
//                 required: true,
//                 maxlength: 220,
//                 minlength: 12
//             },
//             txtcertifcatclass: {
//                 required: true
//             },
//             txtcertifvigencia: {
//                 required: true,
//                 maxlength: 10,
//                 minlength: 4
//             }
//         }
//     }); 
// 	$("#btn-enviar-certifadd").click(function () {
//         if($(thisFormcertif).valid()){
//              var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_certifadd', $(thisFormcertif).serialize());
//              if(request['status']===true){
//                 var data = $(thisFormcertif+'#certif-licenseid').val()+' - '+$(thisFormcertif+'#certif-catclass option:selected').text()+' '+$(thisFormcertif+' #certif-vigencia').val();
//                 $('#first-dom-certif').html('<div class="col-xl-12 col-md-12"><table class="table table-striped"> <tbody> <tr> <th scope="row">Licencia</th><td>'+data+'</td></tr><tr> <th scope="row">Conductor</th> <td>'+$(thisFormcertif+'#certif-vehiplacadescribe').val()+'</td></tr></tbody></table></div>');
//                 arixshell_write_cache_serial("mpsr0x005477newcertif",request['id'],data);//Pide 1= nombre clave de identificacion 2: (id)= alguna informacion y 3:(data) alguna descripcion
//              }else{
//                 //alert('todo mal');
//                 console.log('certif_add -> NO GUARDAR');             
//                 $('#first-dom-certif').html('<div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">Error 500<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado su petición ...</a></div></div></div></div>');
//              }
//         }else{
//             return;
//         }
//     });

//    $(thisFormcertif+"#btn-restart-placacertif").click(function () {
//         $(this).addClass('d-none');
//         $(thisFormcertif+"#certif-vehiplacadescribe").val("").addClass('d-none');
//         $(thisFormcertif+"#btn-search-placacertif").removeClass('d-none');
//         $(thisFormcertif+"#certif-vehiplacadoc").removeClass('d-none').val("").focus();
//     });
//     //(1) PARA EL MODAL AGREGAR PROPIETARIO
//     $(thisFormcertif+"#btn-search-placacertif").click(function () {
//         var temp = $(thisFormcertif+"#certif-vehiplacadoc").val();
//         if(temp.length==8){
//         var request = arixshell_upload_datos('arixapi/arixapi_check_duplicate_person', 'txtdata='+temp+'&');//true or false
//             if(request['status']==true){//ya existe en la base de datos
//                 $(thisFormcertif+'#certif-vehiplacadescribe').val(request['data']).removeClass('d-none');                
//                 $(thisFormcertif+'#certif-vehiplacaid').val(request['id']);
//                 $(thisFormcertif+"#btn-restart-placacertif").removeClass('d-none');
//                 $(thisFormcertif+"#certif-vehiplacadoc").addClass('d-none');
//                 $(this).addClass('d-none');
//             }else{
//                 arixshell_write_cache_serial('e0x005477arixNewUser',temp);//clave y dato
//                 arixshell_abrir_modalbase('AGREGAR NUEVO CONDUCTOR','arixapi/arixapi_get_form_person','btn-modalNewUser-forcertif');
//             }
//         }else{
//             return;
//         } 
//     });
//     //(2)PARA EL MODAL DE AGREGAR conductor
//     $(document).on('click', '#btn-modalNewUser-forcertif', function(){
//         var request = arixshell_read_cache_serial('e0x005477arixNewUser');
//         if(request!==null){
//             $(thisFormcertif+'#certif-vehiplacadescribe').val(request['data']).removeClass('d-none');                
//             $(thisFormcertif+'#certif-vehiplacaid').val(request['id']);
//             $(thisFormcertif+"#btn-restart-placacertif").removeClass('d-none');
//             $(thisFormcertif+"#certif-vehiplacadoc").addClass('d-none');
//             $(thisFormcertif+'#btn-search-placacertif').addClass('d-none');
//             arixshell_cerrar_modalbase();    
//         }else{
//             arixshell_cerrar_modalbase();
//         }
//     });
    
//     //antes de guardar, prueba la duplicidad
//     //esto puede actuar cunadose hace clic en el boton guardar  
//      $(thisFormcertif+"#certif-licenseid").blur(function(){
//         var placa = request = $(this).val();
//         if(request.length >= 9){           
//             request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicatecertif', 'txtdata='+request+'&');
//             if(request['status']==false){
//                 $(thisFormcertif+"#certif-licenseid").addClass('is-valid').attr('readonly',true);
//             }else{
//                $(thisFormcertif+"#certif-licenseid").val("").removeClass('is-valid').removeAttr('readonly');           
//             }
//         }else{
//             return;
//         }
//     });
</script>