<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card-group">
            <div class="card">
                <div class="card-header text-center"><strong>Datos de la Empresa de Transportes</strong></div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-sm" id="table-emp-data">
                            <tbody>
                                <tr>
                                    <th scope="row">RUC</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Razon Social</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombre Comercial</th>
                                    <td>@fatArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Teléfono</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Dirección</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Administrador</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Autorización Vigente Hasta</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                                <tr>
                                    <th scope="row">Resolución</th>
                                    <td>@mdoArixCorp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body text-info">
                        <p><mark>Nota: </mark>Apartir de la renovación de autorización, tanto los certificados como la TUC se basaran en esta nueva autorización.</p>
                    </div>
                </div>
                <div class="card-footer"><small class="text-muted">Esta informacion no se puede actualizar en esta sección</small></div>
            </div>
            <div class="card">
                <div class="card-header text-center"><strong>Datos de la Autorización (Renovación)</strong></div>
                <div class="card-body">
                    <form id="form-empr-renew-add">
                        <input type="hidden" class="d-none" id="aut-emp-id" name="txtempid" readonly/>
                        <input type="hidden" class="d-none" id="aut-aut-id" name="txtautid" readonly/>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-nresolucion">Número de Resolución</label>
                                <input type="text" class="form-control" id="aut-nresolucion" name="txtnresolucion" placeholder="Número de resolución" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-cresolucion">Clase de Resolución</label>
                                <input type="text" class="form-control" id="aut-cresolucion" name="txtcresolucion" value="Resolución de renovación de Autorización" placeholder="Número de resolución" />
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-modalidad">Modalidad se servicio</label>
                                <select id="aut-modalidad" name="txtmodalidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-tunidad">Tipo de Unidad</label>
                                <select id="aut-tunidad" name="txtunidad" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="aut-horarios">Horarios</label>
                                <input type="text" class="form-control form-control-sm" id="aut-horarios" name="txthorarios" placeholder="Horarios" />
                            </div>
                            <div class="form-group col-md-5">
                                <label for="aut-frecuencia">Frecuencia</label>
                                <input type="text" class="form-control form-control-sm" id="aut-frecuencia" name="txtfrecuencia" placeholder="Frecuencia" />
                            </div>
                            <div class="form-group col-md-2">
                                <label for="aut-flota">Flota</label>
                                <input type="number" class="form-control form-control-sm" id="aut-flota" name="txtflota" placeholder="Flota" value="10" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="aut-finicio">Vigente desde</label>
                                <input type="text" class="form-control form-control-sm" id="aut-finicio" name="txtfinicio" placeholder="Fecha de inicio de vigencia" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="aut-ffinal">Vigente hasta</label>
                                <select id="aut-ffinal" name="txtffinal" class="form-control form-control-sm">
                                    <option selected>Cargarndo...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aut-rinicio">Ruta Inicio</label>
                            <textarea class="form-control" id="aut-rinicio" name="txtrinicio" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="aut-rfinal">Ruta Retorno</label>
                            <textarea class="form-control" id="aut-rfinal" name="txtrfinal" rows="3"></textarea>
                        </div>                        
                    </form>
                </div>
                <div class="card-footer"><small class="text-muted">Verificaremos el número de resolución</small></div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 mt-2">
        <div class="alert alert-dark text-right" role="alert">
            <button class="btn btn-success" id="btn-enviar-renewemp">Renovar</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function(){
        //console.log(Object.keys(mpsr_vehiadd_basevar).length);
        //console.log(mpsr_vehiadd_basevar);
        $("#table-emp-data").find('td:eq(0)').text(mpsr_vehiadd_basevar.ruc);
        $("#table-emp-data").find('td:eq(1)').text(mpsr_vehiadd_basevar.rsocial);
        $("#table-emp-data").find('td:eq(2)').text(mpsr_vehiadd_basevar.nombre);
        $("#table-emp-data").find('td:eq(3)').text(mpsr_vehiadd_basevar.telefono);
        $("#table-emp-data").find('td:eq(4)').text(mpsr_vehiadd_basevar.direccion);
        $("#table-emp-data").find('td:eq(5)').text(mpsr_vehiadd_basevar.admindata);
        $("#table-emp-data").find('td:eq(6)').text(mpsr_vehiadd_basevar.aufin);
        $("#table-emp-data").find('td:eq(7)').text(mpsr_vehiadd_basevar.nresolucion);
        $('#form-empr-renew-add #aut-frecuencia').val(mpsr_vehiadd_basevar.frecuencia);
        $('#form-empr-renew-add #aut-horarios').val(mpsr_vehiadd_basevar.horario);
        $('#form-empr-renew-add #aut-flota').val(mpsr_vehiadd_basevar.nvehiculos);
        $('#form-empr-renew-add #aut-rinicio').val(mpsr_vehiadd_basevar.rutaini);
        $('#form-empr-renew-add #aut-rfinal').val(mpsr_vehiadd_basevar.rutafin);
        $('#form-empr-renew-add #aut-emp-id').val(mpsr_vehiadd_basevar.axuidemp);
        $('#form-empr-renew-add #aut-aut-id').val(mpsr_vehiadd_basevar.extra);//setDate(fecha.getDate() + dias
        //let hoy = new Date(); $('#form-empr-renew-add #aut-finicio').val("01/01/" + parseInt(hoy.getFullYear()+1));
    })();

    arixshell_cargar_opciones('#form-empr-renew-add #aut-modalidad','mpsrlicencias/mpsr_get_modalidad').then(function(){
        $("#aut-modalidad option:contains("+mpsr_vehiadd_basevar.servicio+")").attr('selected', 'selected');
    });    
    arixshell_cargar_opciones('#form-empr-renew-add #aut-tunidad','mpsrlicencias/mpsr_get_tipounidad').then(function(){
        $("#aut-tunidad option:contains("+mpsr_vehiadd_basevar.clasificacion+")").attr('selected', 'selected');
    });   
   
    mpsr_subir_fechas('#form-empr-renew-add #aut-ffinal',6,1);
    mpsr_subir_fechas('#form-empr-renew-add #aut-finicio',true,1);

    $("#form-empr-renew-add #aut-nresolucion").blur(function(){
        let request = $(this).val();
        if(request.length > 11){
            request = arixshell_upload_datos('mpsrlicencias/mpsr_post_duplicateres', 'txtdata='+request+'&');
            if(request['status']==false){
                $("#form-empr-renew-add #aut-nresolucion").addClass('is-valid');
            }else{
                arixshell_alert_notification('warning','El número de resolución se encuntra registrado ...');
                $("#form-empr-renew-add #aut-nresolucion").val("");
                $("#form-empr-renew-add #aut-nresolucion").removeClass('is-valid');            
            }
        }else{
            return;
        }        
    });
    $("#form-empr-renew-add").validate({
        errorClass: "text-danger",
        rules: {
            txtempid:{required: true,maxlength: 255,minlength: 11},
            txtautid:{required: true,maxlength: 255,minlength: 11},
            txtnresolucion:{required: true,maxlength: 80,minlength: 7},
            txtcresolucion:{required: true,maxlength: 100,minlength: 7},
            txtmodalidad:{required: true},
            txtunidad:{required: true},
            txthorarios:{required: true,maxlength: 90,minlength: 5},
            txtfrecuencia:{required: true,maxlength: 90,minlength: 5},
            txtflota:{required: true,maxlength: 100,minlength: 1},
            txtfinicio:{required: true,maxlength: 10,minlength: 9},
            txtffinal:{required: true},
            txtrinicio:{required: true,maxlength: 700,minlength: 7},
            txtrfinal:{required: true,maxlength: 700,minlength: 7}
        }
    });
    
    $("#btn-enviar-renewemp").click(function () {     
        if($("#form-empr-renew-add").valid()){
            let request = arixshell_upload_datos('mpsrlicencias/mpsr_post_renovaciones', $('#form-empr-renew-add').serialize());
            if(request.status==true){//el servidor siempre responde con un obejeto
                arixshell_alert_notification('success','Guardado correctamente...');
                arixshell_hacer_pagina_atras();
            }
            else{
                arixshell_alert_notification('error','Lo sentimos, no pudimos guardar los datos...');
                arixshell_hacer_pagina_atras();
            }
        }
        else{
            return;
        }
    });
</script>