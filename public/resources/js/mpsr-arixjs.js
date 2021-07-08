console.log('estoy en San roman')

function mpsr_cargar_opciones(location, url, html=''){
    var data = arixshell_download_datos(url);
    if(typeof(data)==='object'){
        $(location).html(html);
        for(var i =0; i<data.length; i++){
            $(location).append('<option value="'+data[i]['axuidemp']+'" >'+data[i]['descripcion']+'</option>');
        }
    }else{
        console.log('mpsr_cargar_servicios -- Error');
    }
}

function mpsr_subir_opciones(location, url,data){
    var data = arixshell_upload_datos(url, data)
    if(typeof(data)==='object'){
        $(location).html('');
        for(var i =0; i<data.length; i++){
            $(location).append('<option value="'+data[i]['axuidemp']+'" >'+data[i]['descripcion']+'</option>');
        }
    }else{
        console.log('mpsr_subir_opciones -- Error');
    }
}

function formatoFecha(fecha, formato) {
    const map = {
        dd: fecha.getDate(),
        mm: fecha.getMonth() + 1,
        yy: fecha.getFullYear().toString().slice(-2),
        yyyy: fecha.getFullYear()
    }
    return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
}

function mpsr_subir_fechax(location, year){
    //https://www.freecodecamp.org/espanol/news/javascript-date-now-como-obtener-la-fecha-actual-con-javascript/
    //const fecha = new Date('12/12/2021');
    //const aafecha = fecha.getFullYear();
    const tiempoTranscurrido = Date.now();
    const hoy = new Date(tiempoTranscurrido);    
    if(typeof(year)=='number'){   
        var anio = hoy.toLocaleDateString();     
        const fecha = new Date(anio);   
        anio = fecha.getFullYear();    
        $(location).html('');
        for(var i =0; i<year; i++){
            $(location).append('<option value="'+(anio+i)+'/12/31">31/12/'+(anio+i)+'</option>');
        }
    }else{        
        $(location).val(formatoFecha(anio, 'dd/mm/yy'));
    }
}

function mpsr_subir_fechas(location, year){
    const hoy = new Date();
    if(typeof(year)==='number'){   
        anio = hoy.getFullYear();    
        $(location).html('');
        for(var i =0; i<year; i++){
            $(location).append('<option value="'+(anio+i)+'/12/31">31/12/'+(anio+i)+'</option>');
        }
    }else{        
        $(location).val(formatoFecha(hoy, 'dd/mm/yy'));
    }
}
Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
  });