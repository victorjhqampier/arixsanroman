<div class="row gutters-sm">
    <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body">
                <form id="per-form-base">
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-dni">Número de Documento</label>
                            <input type="text" class="form-control" id="per-dni" name="txtperdni" placeholder="DNI">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-names">Nombres</label>
                            <input type="text" class="form-control" id="per-names" name="txtpername" placeholder="Nombres">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-lastname">Apellido Paterno</label>
                            <input type="text" class="form-control" id="per-lastname" name="txtperlasname" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-firstname">Apellido Materno</label>
                            <input type="text" class="form-control" id="per-firstname" name="txtfirstname" placeholder="Apellido Materno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-borndate">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" id="per-borndate" name="txtborndate" placeholder="Fecha de Nacimiento">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-sexe">Género/sexo</label>
                            <select id="per-sexe" name="txtpersexe" class="form-control">
                                <option value="1" selected>No definido</option>
                                <option value="2">Masculino</option>
                                <option value="3">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group input-group-sm">
                        <label for="per-address">Direccion del Domicilio Actual</label>
                        <input type="text" class="form-control" id="per-address" name="txtperaddress" placeholder="Dirección del domicilio">
                    </div>                
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-departament">Departamento</label>
                            <select id="per-departament" name="txtperdepartment" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-province">Provincia</label>
                            <select id="per-province" name="txtperprovince" class="form-control">
                                <option selected>...</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-distrite">Distrito</label>
                            <select id="per-distrite" name="txtperdistrite" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-email">Direccion de Correo Electrónico</label>
                            <input type="email" class="form-control" id="per-email" name="txtperemail" placeholder="Direccion de correo electrónico">
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="per-phone">Número de teléfono/celular</label>
                            <input type="text" class="form-control" id="per-phone" name="txtperphone" placeholder="Número de teléfono">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
   </div>
  <div class="col-md-2 mb-2">
    <div class="form-group">
        <img src="public/images/users/tu39hnri84fheg.png" alt="Victor CAxi" class="img-thumbnail mt-4">
    </div>
    <!--div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
          
        </div>
      </div>
    </div-->
  </div>
  <div class="col-xl-12 col-md-12 mt-2">
        <div class="alert alert-dark text-center" role="alert">
            <button class="btn btn-success" id="btn-enviar-peradd">Guardar</button>
        </div>
    </div> 
</div>
<script type="text/javascript">
    arixshell_cargar_opciones('#per-form-base #per-departament', 'arixapi/arixapi_get_departamentos');
    var dep = $("#per-departament option:eq(20)").attr("selected", "selected").val();arixshell_subir_opciones('#per-form-base #per-province','arixapi/arixapi_get_provincias', 'txtdata='+dep+'&');
    dep = $("#per-province option:eq(10)").attr("selected", "selected").val();arixshell_subir_opciones('#per-form-base #per-distrite','arixapi/arixapi_get_distritos', 'txtdata='+dep+'&');
    $('#per-form-base #per-departament').change(function(){
        var r = $(this).val();
        $('#per-form-base #per-distrite').html('');
        arixshell_subir_opciones('#per-form-base #per-province','arixapi/arixapi_get_provincias', 'txtdata='+r+'&');
    });
    $('#per-form-base #per-province').change(function(){
        var r = $(this).val();
        arixshell_subir_opciones('#per-form-base #per-distrite','arixapi/arixapi_get_distritos', 'txtdata='+r+'&');
    });
    $("#per-form-base").validate({
        errorClass: "text-danger",
        rules: {
            txtperdni: {
                required: true,
                maxlength: 8,
                minlength: 8
            },
            txtpername: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtperlasname: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtfirstname: {
                required: true,
                maxlength: 60,
                minlength: 3
            },
            txtborndate: {
                required: true,
                minlength: 5
            },
            txtpersexe: {
                required: true,
            },
            txtperaddress: {
                required: true,
                maxlength: 70,
                minlength: 5
            },
            txtperdepartment: {
                required: true
            },
            txtperprovince: {
                required: true
            },
            txtperdistrite: {
                required: true
            },
            txtperemail: {
                required: true,
                email: true
            },
            txtperphone:{
                maxlength: 70,
                maxlength: 60,
                minlength: 9
            }
        }
    });
	$("#btn-enviar-peradd").click(function () {
            console.log($('#per-form-base').serialize());
            $("#per-form-base").valid();

        /*if($("#form-empr-new-add").valid()){
            var request = arixshell_upload_datos('mpsrlicencias/mpsr_post_emprmpsr', $('form').serialize());
            console.log(request);
            if(request['status']===true){
            }
            else{
                alert('Lo sentimos, los datos no fueron guardados ...!');
            }
        }
        else{
            return;
        }*/
    });
</script>