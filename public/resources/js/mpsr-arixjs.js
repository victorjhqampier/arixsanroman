console.log('estoy en San roman');
jQuery.datetimepicker.setLocale('es');

function formatoFecha(fecha, formato) {
    const map = {
        dd: fecha.getDate(),
        mm: fecha.getMonth() + 1,
        yy: fecha.getFullYear().toString().slice(-2),
        yyyy: fecha.getFullYear()
    }
    return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
}
function verifyMpsr(s){
    return s.split("").reverse().join("");
}
/*function mpsr_autoload_btnadd(params) {
    if(params < mpsr_vehiadd_basevar[3]){
        $('#second-content-vehiadd').parent().parent().siblings().first().html('<div class="alert alert-primary text-right" role="alert"><button class="btn btn-primary" id="btn-add-veh2emp">Agregar</button></div>');
    }else{
        return;
    }        
}*/
function mpsr_message_color(cert){
    if(cert == true){
        return '<span class="badge badge-success">Activo</span>';
    }else{
        return '<span class="badge badge-warning">Pendiente</span>';
    }
}
function mpsr_message_color_data(message,status){
    if(status == false){
        return '<span class="badge badge-danger">'+message+'</span>';        
    }else{
        return message;
    }
}
function mpsr_message_color_multiple(num = 1,message='Pendiente'){
    switch (num) {
        case 1:
            return '<span class="text-danger">'+message+'</span>';
        case 2:
            return '<span class="text-warning">'+message+'</span>';
        case 3:
            return '<span class="text-success">'+message+'</span>';
        default:
            return '<span class="text-info">'+message+'</span>';
      }
}
/*
function mpsr_autoload_datatable(){
    $('#dataTable_emp_activos tbody').html("");
    var request = arixshell_upload_datos('mpsrlicencias/mpsr_get_vehicle_byemp', 'txtdata='+mpsr_vehiadd_basevar[0]+'&');//esta variable se encuanta el el padre
    if(typeof(request)==='object'){
        if(request.length>=1){ 
            mpsr_autoload_btnadd(request.length);                       
            for(var i = 0; i<request.length; i++){
                $('#dataTable_emp_activos tbody').append('<tr odd="'+
                    request[i]['axuidemp']+'"><td>'+
                    request[i]['placa']+'</td><td>'+
                    request[i]['hmarca']+'</td><td>'+
                    request[i]['modelo']+'</td><td>'+
                    request[i]['descripcion']+'</td><td>('+
                    mpsr_message_color_data(request[i]['driv_data']+' | '+request[i]['driv_licen'],request[i]['driv_status'])+')</td><td>'+
                    request[i]['cert_num']+'</td><td>'+mpsr_message_color(request[i]['cert_status'])+'</td><td>'+
                    arixshell_cargar_botones('btn-borrar,btn-detalles,btn-imprimir')+'</td></tr>'
                );
            }
        }else{
            mpsr_autoload_btnadd(0);
        }            
    }else{
        $('#dataTable_emp_activos tbody').append('<tr><h6>Sin vehículos</h6></tr>');
    }
}*/

function mpsr_subir_fechas(location, year,number=0){//years == años que se ejetutaran
    const hoy = new Date();
    if(typeof(year)==='number'){   
        anio = hoy.getFullYear();    
        $(location).html('');
        for(var i =0; i<year; i++){
            $(location).append('<option value="'+(anio+i)+'/12/31">31/12/'+(anio+i+number)+'</option>');
        }
    }else{        
        //$(location).val(hoy.getDate() + "/" + (hoy.getMonth() +1) + "/" + hoy.getFullYear());
        $(location).val("01/01/" + parseInt(hoy.getFullYear()+number));
    }
}
function mpsradd_get_emp(ruc){
    let request = arixshell_download_datos('https://dniruc.apisperu.com/api/v1/ruc/'+
    ruc+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaG5hbGFtdXNAZ21haWwuY29tIn0.afUd28wIqmAoFV9CbIu9JZcIRynhCi1t1P--Sru3kRY');
     if (request['ruc']== ruc){
         $("#form-empr-new-add #emp-rsocial").val(request.razonSocial);
         $("#form-empr-new-add #emp-nombre").val(request.nombreComercial);
         $("#form-empr-new-add #emp-direccion").val(request.direccion+' '+request.distrito+' '+request.provincia+' '+request.departamento);
     }else{
         return;
     }
}
function mpsradd_get_mpsrvehicle(placa){
    let request = arixshell_upload_datos('arixapi/arixapi_ger_vehicles','txtdata='+arixshell_verify_data(placa)+'&');
    //console.log(request);
     if (request.status== true){
         $("#vehi-form-base #vehi-matpre").val(request[0].plac_ant);
         $("#vehi-form-base #vehi-serial").val(request[0].serie);
         $("#vehi-form-base #vehi-engine").val(request[0].motor);
         $("#vehi-form-base #vehi-brand option:contains("+request[0].marca+")").attr('selected', 'selected');
         $("#vehi-form-base #vehi-model").val(request[0].modelo);
         $("#vehi-form-base #vehi-color").val(request[0].color);
         $("#vehi-form-base #vehi-seats").val(request[0].asient);
         $("#vehi-form-base #vehi-year").val(request[0].anio);
         $("#vehi-form-base #vehi-weigth").val(request[0].peso);
         $("#vehi-form-base #vehi-descript").val(request[0].clase);         
     }else{
         return;
     }
}
//solo debe cargar los datos y mostrar el boton agregar
function mpsr_load_table_activevehicle(ubication,data,long){
    $('#second-content-vehiadd').removeClass('d-none'); 
    request = arixshell_upload_datos('mpsrlicencias/mpsr_get_vehicle_byemp', 'txtdata='+data+'&');    
    long = Object.keys(request).length - 1 < long?'<div class="alert alert-primary text-right" role="alert"><button class="btn btn-primary" id="btn-add-veh2emp">Agregar</button></div>':'';
    $(ubication).parent().parent().siblings().last().html(long);
    if(request.status==true){   
        data = arixshell_cargar_botones('btn-detalles');
        $(ubication+'#dataTable_emp_activos tbody').html('');
        for( i = 0; i<Object.keys(request).length-1; i++){
            $(ubication+' tbody').append('<tr odd="'+
                request[i].axuidemp+'"><th scope="row">'+(i+1)+'</th><td>'+
                request[i].placa+'</td><td>'+
                request[i].hmarca+'</td><td>'+
                request[i].modelo+'</td><td>'+
                request[i].descripcion+'</td><td>'+
                mpsr_message_color_data(request[i].driv_data,request[i].driv_status)+'</td><td class="text-center">'+
                data+'</td></tr>'
            );
        }           
    }else{
        return;
    }
}
/*function mpsr_emp_loaddata (id,btn='btn-detalles, btn-imprimir'){
    $('#main-emp-active').html('');
    table = '<div class="table-responsive-md"><table class="table table-sm" id="table-data-emp"><thead><tr><th scope="col">ID</th><th scope="col">fecha</th>'+
    '<th scope="col">RUC</th><th scope="col">Resolución</th><th scope="col">Nombre</th><th scope="col">Razon social</th><th scope="col">Vigente hasta</th>'+
    '<th scope="col">Flota</th><th scope="col">Categoría</th><th scope="col">Acciones</th></tr></thead><tbody></tbody></table></div>';
    //btnss = arixshell_cargar_botones(btn);
    $('#main-emp-active').html(table);
    $('#table-data-emp').DataTable({
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se ha encontrado nada, lo siento",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)"
            },
            "ajax": {
                "url" : "mpsrlicencias/mpsr_get_activeemp",
                "dataSrc":"",
                "type": "POST",
                "data": {"txtdata" : id}
            },
            "columns":[
                {"data": 'axuidemp'},
                {"data": 'fecha'},
                {"data": 'ruc'},            
                {"data": 'nresolucion'},
                {"data": 'nombre'},
                {"data": 'rsocial'},
                {"data": 'aufin'},
                {"data": 'numv'},
                {"data": 'code'},            
                {"data": null, render: function ( data, type, row ) {return arixshell_cargar_botones(btn);}}
            ],
            "order": [
                [ 1, "desc" ]
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": true
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                }
            ],
            "createdRow": function( row, data, dataIndex ) {
                $(row).attr('odd', data.axuidemp);         
            }
    });
    $('#table-data-emp tbody').on( 'click', '.btn-detalles',function(){
        let fila = $(this).closest("tr"), uid = fila.attr('odd');
        arixshell_cargar_contenido('mpsrlicencias/compania_view',fila.find('td:eq(0)').text()+' - '+fila.find('td:eq(2)').text());
    });
}*/
