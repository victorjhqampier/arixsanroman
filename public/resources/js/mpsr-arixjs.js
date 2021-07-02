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

