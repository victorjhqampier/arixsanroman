/*----------------------------------------
arixshell_cargar_llave_local(0-1-2)
----------------------------------------
> 0 = cargar el id de los botones
> 1 = cargar el id del contenido
> 2 = los dos
-------------------------------------------*/
/*function axconfiguraciones_mostrar_icono_sucursales(btns='btn-detalles,btn-borrar', tipo = true){
    lista = arixshell_upload_datos('configuraciones/axconfiguraciones_cargar_lista_sucursales','type='+tipo);
    if (lista != false) {
        for (var i = 0; i < lista.length; i++) { 
            temp = arixshell_mostrar_targeta_imagetop_simple('public/images/config/'+lista[i].imagen, lista[i].nombre, lista[i].direccion, lista[i].fregistro, btns, lista[i].uid);         
            $(arixshell_cargar_llave_local(1)).append(temp);//agregas al final : 1 = para el contenido 0 = para los botones
        }
    }else{
        console.log('axconfiguraciones_mostrar_lista_sucursales -> error');
    }
}*/
/*function axconfiguraciones_mostrar_icono_usuarios(btns='btn-detalles,btn-borrar', tipo = true){
    lista = arixshell_upload_datos('configuraciones/axconfiguraciones_cargar_lista_usuarios','type='+tipo);
    if (lista != false) {
        for (var i = 0; i < lista.length; i++) { 
            temp = arixshell_mostrar_targeta_imageleft_simple(lista[i].fotografia, lista[i].nombres+' '+lista[i].paterno+' '+lista[i].materno, lista[i].documento+' - '+lista[i].codigo, 'INgeniero de sistemas', lista[i].correo, 'Actualizado el '+lista[i].fmodificacion, lista[i].estado, btns, lista[i].uid);         
            $(arixshell_cargar_llave_local(1)).append(temp);
        }
    }else{
        console.log('axconfiguraciones_mostrar_lista_usuarios -> error');
    }
}*/

//sucursales
function config_pass_random(numero){
    //let abecedario = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9",".","-","_","$","&","#","@"];
    let abecedario = ["a","Z","0","b","Y","1","c","X","2","d","W","3","e","V","4","f","U","5","g","T","6","h","S","7","i","R","8","j","Q",,"9","k","P","l","O","m","N","n","M","o","L","p","K","q","J","r","I","s","H","t","G","u","F","v","E","w","D","x","C","y","B","z","A"];
    let numeroAleatorio = '';
	for(var i = 0; i<numero; i++){
		numeroAleatorio += abecedario[parseInt(Math.random()*abecedario.length)];         
    }
    return numeroAleatorio;
}
function config_showHidePwd(location,btnEye) {
    var input = document.getElementById(location);
    if (input.type === "password") {
        input.type = "text";
        document.getElementById(btnEye).className = "far fa-eye";
    } else {
        input.type = "password";
        document.getElementById(btnEye).className = "far fa-eye-slash";
    }
}

function config_loadPwd(location) {
    $(location).val(config_pass_random(15));
}
function config_sucursales_check(location="#user-sucursales select"){
    let data = $("#user-sucursales").find('option:selected');
    data = data.filter(function(){return this.value=="54F747562B763N0twL3NoSXp0ZmJaSElYYVM5Mi9SUT09"}).length;    
    if(data == 0){        
        //$(location).first().find("option:contains('Permitir')").attr('selected', 'selected');
        $("#user-sucursales").find('select').first().find("option:contains('Permitir')").prop('selected', true);
        //$("#user-sucursales").find('select').first().val("54F747562B763N0twL3NoSXp0ZmJaSElYYVM5Mi9SUT09");//.find("option:contains('Permitir')").attr('selected', true);
    }else{
        return;
    }
}