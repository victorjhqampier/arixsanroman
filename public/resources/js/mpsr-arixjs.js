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
function mpsr_autoload_btnadd(params) {
    if(params < mpsr_vehiadd_basevar[3]){
        $('#dataTable_emp_activos').parent().parent().siblings().first().html('<div class="alert alert-primary text-right" role="alert"><button class="btn btn-primary" id="btn-add-veh2emp">Agregar</button></div>');
    }else{
        return;
    }        
}
function mpsr_message_color(cert){
    if(cert == true){
        return '<span class="badge badge-success">Activo</span>';
    }else{
        return '<span class="badge badge-warning">Pendiente</span>';
    }
}
function mpsr_message_color_data(message,cert){
    if(cert == true){
        return message;
    }else{
        return '<span class="text-danger">'+message+'</span>';
    }
}
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
}

function mpsr_subir_fechas(location, year){//years == años que se ejetutaran
    const hoy = new Date();
    if(typeof(year)==='number'){   
        anio = hoy.getFullYear();    
        $(location).html('');
        for(var i =0; i<year; i++){
            $(location).append('<option value="'+(anio+i)+'/12/31">31/12/'+(anio+i)+'</option>');
        }
    }else{        
        $(location).val(hoy.getDate() + "/" + (hoy.getMonth() +1) + "/" + hoy.getFullYear());
    }
}
function mpsr_emp_loaddata (id,btn='btn-detalles, btn-imprimir'){
    $('#main-emp-active').html('');
    table = '<div class="table-responsive-md"><table class="table table-sm" id="table-data-emp"><thead><tr><th scope="col">ID</th><th scope="col">fecha</th>'+
    '<th scope="col">RUC</th><th scope="col">Resolución</th><th scope="col">Nombre</th><th scope="col">Razon social</th><th scope="col">Vigente hasta</th>'+
    '<th scope="col">Flota</th><th scope="col">Categoría</th><th scope="col">Acciones</th></tr></thead><tbody></tbody></table></div>';
    btnss = arixshell_cargar_botones(btn);
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
                {"data": null, render: function ( data, type, row ) {return btnss;}}
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
}
