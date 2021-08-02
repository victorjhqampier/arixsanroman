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

/*function mpsr_subir_fechax(location, years){
    //https://www.freecodecamp.org/espanol/news/javascript-date-now-como-obtener-la-fecha-actual-con-javascript/
    //const fecha = new Date('12/12/2021');
    //const aafecha = fecha.getFullYear();
    const tiempoTranscurrido = Date.now();
    const hoy = new Date(tiempoTranscurrido);    
    if(typeof(years)=='number'){   
        var anio = hoy.toLocaleDateString();     
        const fecha = new Date(anio);   
        anio = fecha.getFullYear();    
        $(location).html('');
        for(var i =0; i<years; i++){
            $(location).append('<option value="'+(anio+i)+'/12/31">31/12/'+(anio+i)+'</option>');
        }
    }else{        
        $(location).val(formatoFecha(anio, 'dd/mm/yy'));
    }
}*/

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
Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
  });