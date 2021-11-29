function arixshell_download_datos(urls){//Solicita datos a un determinado servidor
	//var a= null;
    $.ajax({
     	type: 'GET',
        url: urls,
        async: !1,
        dataType: 'json',
        success: function (data){
	        if (!$.isEmptyObject(data)){
	            urls = data;
	        }else{ 
	            urls = false;
	        }
        },
        error: function(e){
            urls = false;
        }
    });
    return urls; 
}
function arixshell_upload_datos(urls, datas) { // si es uno solo archivo
    $.ajax({
        type: 'POST',
        url: urls,
        async: !1,
        dataType: 'json',
        data: datas,
        success: function(data) {
            if (!$.isEmptyObject(data)) {
                urls = data;
            } else {
                urls = false;
            }
        },
        error: function(e) {
            urls = false;
        }
    });
    return urls;
}

async function arixshell_async_upload_datos(urls,datas) { // si es uno solo archivo
    try {
        urls = await $.ajax({
            type: 'POST',
            url: urls,
            async: true,
            dataType: 'json',
            data: datas
        });
        return urls;
    }catch{
        console.error('error -> arixshell_async_upload_datos');
        return false;
    }    
}

async function arixshell_async_download_datos(urls) { // si es uno solo archivo
    try {
        urls = await $.ajax({
            type: 'GET',
            url: urls,
            async: true,
            dataType: 'json'
        });
        return urls;
    }catch{
        console.error('error -> arixshell_async_download_datos');
        return false;
    }    
}
function arixshell_upload_json(urls, datas) { // si es uno solo archivo
    $.ajax({
        type: 'POST',
        url: urls,
        async: !1,
        dataType: 'json',
        data: {txtdata:datas},
        success: function(data) {
            if (!$.isEmptyObject(data)) {
                urls = data;
            } else {
                urls = false;
            }
        },
        error: function(e) {
            urls = false;
        }
    });
    return urls;
}

function arixshell_limpiar_string(s) {//elimina caracteres raros de un string *#$
    s = s.replace(/[^a-zA-Z0-9\_]/g,'');
    return s;
}
//FUNCION OBSOLETA
/*function arixshell_localdata_restarting(){
    sessionStorage.setItem("last_page", false);
    sessionStorage.setItem("current_page", false);
    sessionStorage.setItem("last_serial", null);
}
//FUNCION OBSOLETA
function arixshell_add_cache_page(location, url){
    var current_page = sessionStorage.getItem('current_page');
    current_page = JSON.parse(current_page);
    if (url !=  current_page[1]) {
        var last_page = [current_page[0],current_page[1]];
        current_page = [location, url];
        sessionStorage.setItem('current_page', JSON.stringify(current_page));
        sessionStorage.setItem('last_page', JSON.stringify(last_page));
    }
    else{
        return;
    }
}*/
var arixshellmainvar;
function arixshell_autoload_sessiondata(){
    arixshellmainvar = arixshell_download_datos('arixapi/arixapi_autoload_session_data');
}
function arixshell_write_cache_serial(serial,dataOne, dataTwo = ''){
    sessionStorage.setItem('axtemp'+serial, '{ "id":"'+dataOne+'", "data": "'+dataTwo+'"}');
}
function arixshell_read_cache_serial(serial){
    var temp=JSON.parse(sessionStorage.getItem('axtemp'+serial));
    sessionStorage.setItem('axtemp'+serial, null);
    return temp;
}
function arixshell_cargar_auto_subtitulos(){
    number = $('#sucursal-db-list').first().text();number = number.split(',');
    $('#user-title-breadcrumb').html('<li class="breadcrumb-item active" aria-current="page">'+number[0]+'</li>');
    $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+$("#navbarNav li.active" ).text()+'</li>');
}
function arixshell_cargar_third_subtitulo(title){
    var data = window.location.href+'/'+$('#sidenavAccordion .nav').find('.active').attr('controller');
    sessionStorage.setItem("pages", JSON.stringify([data]));//renicia los valores del caché
    //console.log($('#sidenavAccordion .nav').find('.active').attr('controller'));
    if (2 == $('#nav-idont-know .breadcrumb-item').length) {
        $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+title+'</li>');
    }else{
        $( "#user-title-breadcrumb li:eq( 1 )" ).nextAll().remove();
        $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+title+'</li>');
    }
}
function arixshell_verify_data(s){
    return s.split("").reverse().join("");
}
//FUNCION OBSOLETA
/*function arixshell_agregar_subtitulo(title,position = 4){
    a = $('#nav-idont-know .breadcrumb-item').length;    
    if (a >= position - 1 && position > 3){
        if (a== position-1) {
            $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+title+'</li>');
            a = [title];
            //sessionStorage.setItem('pages', JSON.stringify(a));//agregar simplemente position[]
        }else{
            $( "#user-title-breadcrumb li:eq("+(position - 2)+")" ).nextAll().remove();
            $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+title+'</li>');
        }
    }
    else{
        return;
    }
}*/
function arixshell_cargar_titulo_page(){
    title = $("#navbarNav li.active" ).text();
    $('title').text(title+" - Arix Corporation");
}
function arixshell_activeshadow_app(a,b){return b==a?"active":""}//dessaroolando su mejora
function arixshell_desactivehref_app(r,a){return r==a?("javascript:;"):r}//para desactivar url
function arixshell_cargar_apps() {//esta funcion es estatica -> siempre cargará en el mismo lugar
    //let apps = arixshell_download_datos('arixapi/arixapi_mostrar_apps_usuario');
    let apps =  arixshellmainvar[0];
    if (apps!= false) {
        control=window.location.pathname;
        control= control.split("/"); ////********b[2] restar menos uno -> si arixmee no esta en un directorio
        control = arixshell_limpiar_string(control[2]);
        let list = '', elocation = '#navbarNav .navbar-nav';        
        $(elocation).html(list);//borras los registros actuales
        for (i = 0; i < apps.length; i++) {
            list ='<li class="nav-item '+arixshell_activeshadow_app(apps[i].controller,control)+'"><a class="nav-link" href="'+arixshell_desactivehref_app(apps[i].controller,control,apps[i].app)+'">'+apps[i].app+'</a></li>';
            $(elocation).append(list);//agregas al final
        }
        list = ''; //limpias la memoria
    }else{
        console.log('arixshell_cargar_apps -> error');
    }
}
function arixshell_cargar_menu(){
    //var menu = arixshell_download_datos('arixapi/arixapi_mostrar_menu_aplicaciones');
    let menu = arixshellmainvar[1];
    let list = '', elocation = '#sidenavAccordion .nav';
    $(elocation).html(list);//borras los registros actuales
    if(menu != 403){
        for (var i = 0; i < menu.length; i++) {
            list = '<div class="sb-sidenav-menu-heading">'+menu[i].submenu+'</div>';
            for (var j = 0; j < menu[i][0].length; j++) {
                list += '<a class="nav-link" href="javascript:;" controller = '+menu[i][0][j].controller+'><div class="sb-nav-link-icon"><i class="fas fa-angle-right"></i></div>'+menu[i][0][j].subapp+'</a>';
            }
            $(elocation).append(list);//agregas al final
        }
        list = ''; //limpias la memoria
        $( "#sidenavAccordion a" ).first().click(); //click automatico en el primer item de la aplicacion
    }else{
        console.log('arixshell_cargar_menu -> error');
    }
}

function arixshell_cargar_usuario(){
    //var user = arixshell_download_datos('arixapi/arixapi_mostrar_usuario_actual');
    let user = arixshellmainvar[2];
    if (user != null && user != 403) {
        $("nav").find('#dropdown-item-u1').text(user.documento+" | "+user.nombres+" "+user.paterno+" "+user.materno);
    }else{
        console.log('arixshell_cargar_usuario -> error');
    }
}
function arixshell_cargar_sucursal_auto(){
    let sucursal = arixshellmainvar[3][0];
    $("nav").find('#sucursal-db small').text(sucursal.nombre.substring(0,20)+"...");
    $('nav #sucursal-db-list').html('<a class="dropdown-item active" href="javascript:;" id="0xFF">N-'+sucursal.numero+', '+sucursal.nombre+'</a>');
    $('#user-title-breadcrumb li').first().text(sucursal.numero);
    sucursal = arixshellmainvar[3];
    if (sucursal.length > 1) {
        for (i = 1; i < sucursal.length; i++) {
            $('nav #sucursal-db-list').append('<a class="dropdown-item" href="javascript:;" id="'+sucursal[i].serial+'">N-'+sucursal[i].numero+', '+sucursal[i].nombre+'</a>');//agregas al final 
         }        
    }else{
        return;
    }
}
function arixshell_cargar_sucursal(){
    //var sucursal = arixshell_download_datos('arixapi/arixapi_mostrar_sucursal_actual');
    let sucursal = arixshell_download_datos('arixapi/arixapi_mostrar_sucursal_actual');
    if (sucursal != null && !$.isNumeric(sucursal.nombre)) {
        $("nav").find('#sucursal-db small').text(sucursal.nombre.substring(0,20)+"...");
        $('nav #sucursal-db-list').html('<a class="dropdown-item active" href="javascript:;" id="0xFF">N-'+sucursal.numero+', '+sucursal.nombre+'</a>');
    }else{
        console.log('arixshell_cargar_sucursal -> error');
    }
}
function arixshell_cargar_sucursal_lista(){
    var sucursal = arixshell_download_datos('arixapi/arixapi_mostrar_sucursales'), ubicacion = 'nav #sucursal-db-list';
    if (sucursal != null && sucursal != 403) {
        //$(ubicacion).html('');//limias todo
        for (i = 0; i < sucursal.length; i++) {
           $(ubicacion).append('<a class="dropdown-item" href="javascript:;" id="'+sucursal[i].serial+'">N-'+sucursal[i].numero+', '+sucursal[i].nombre+'</a>');//agregas al final 
        }
    }else{
        console.log('arixshell_cargar_sucursal_lista-> error');
    }
}
function arixshell_probar_url(){//Ocurre un error fatal cunado se añade un / al final de la URL, esto lo soluciona
    a = window.location.href;
    b = window.location.pathname;
    a = a.replace(b, '');
    b = b.split('/',4); //********restar menos uno -> si arixmee no esta en un directorio
    if (b.length >=4) {
        b = b.join('/');
        b = b.split('/',3);
        b = b.join('/');
        window.location=a+b;
    }else{
        return;
    }
}
function arixshell_vaciar_botones_menu(){
    $('main #nav-item-input-buscar').html('')
    $('main #nav-item-input-botones').html('');
}
function arixshell_vaciar_paginas(){
    $('main #use-container-secondary').html('')
    $('main #use-container-primary').html('');
}
function arixshell_cargar_paginas(url,lugar = '#use-container-primary'){//borra todo y carga una pagina
    arixshell_vaciar_paginas();
    arixshell_vaciar_botones_menu();
    //arixshell_add_cache_page(lugar,url);    
    $(lugar).load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Arixcore encontró el siguiente error: ";//<h3>'+msg + ' - ' +xhr.status + " - " + xhr.statusText+'</h3>
            $(lugar).html('<div class="row"><div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">'+msg + xhr.status + " - " + xhr.statusText+' en '+url+'<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado el acceso a la página ...</a></div></div></div></div></div>');
        }
    });
}
function arixshell_cargar_subpaginas(url,lugar){//carga paginas en un modal
    $(lugar).load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Arixcore encontró el siguiente error: ";
            $(lugar).html('<div class="col-xl-12 col-md-12"><div class="card bg-danger text-white mb-4"><div class="card-body">'+msg + xhr.status + " - " + xhr.statusText+' en '+url+'<div class="card-footer d-flex align-items-center justify-content-between"><a class="small text-white stretched-link" href="javascript:;"><strong>¡Lo siento! </strong>El servidor a denegado su petición ...</a></div></div></div></div>');
        }
    });
}
//aqui trabajo, falta agregar funcionalidad de caché
function arixshell_cargar_contenido(url,titulo = 'Sin Subtitulo', position = 4){//esta es una funcion muy especifica para llenar subtitulos y paginas(caches)
    a = $('#nav-idont-know .breadcrumb-item').length;
    if (a >= position - 1 && position > 3){
        arixshell_cargar_paginas(url,'#use-container-primary');
        if (a== position-1) {
            $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+titulo+'</li>');
            leer = JSON.parse(sessionStorage.getItem('pages'));//el primer registro
            leer.push(url);//agregas el nuevo
            sessionStorage.setItem('pages', JSON.stringify(leer));//lo guardas
            //sessionStorage.setItem('pages', JSON.stringify([url]));//agregar simplemente position[0]
        }else{
            $( "#user-title-breadcrumb li:eq("+(position - 2)+")" ).nextAll().remove();
            $('#user-title-breadcrumb').append('<li class="breadcrumb-item active">'+titulo+'</li>');
            leer = JSON.parse(sessionStorage.getItem('pages'));
            for (i = 1; i < leer.length; i++) {//no toues el el registro 0
                leer.pop();
            }
            leer.push(url);
            sessionStorage.setItem('pages', JSON.stringify(leer));//actualizas el dato
        }
    }
    else{
        return;
    }
}
function arixshell_iniciar_llaves_locales(id1="#btn_error", id2="#con_error"){
    var id1 = id1.replace(" ", "");
        id1 = id1.replace("#", "");
        //var id2 = id2.replace(" ", "");
        //    id2 = id2.replace("#", "");
    //$('#nav-idont-know ul:last').attr('id', id1);
    $('#nav-item-input-botones').html('<div class="btn-group btn-group-sm" id="'+id1+'"></div>');
        //$('#use-container-secondary').html('<div class="row" id="'+id2+'"></div>');
}
function arixshell_cargar_llave_local(one = 0){
    li = ['#'+$('#nav-item-input-botones div:first').attr('id'), '#'+$('#use-container-secondary div:first').attr('id')];
    if (one >= 0 && one < 2) {
        return li[one]
    }else{
        return li;
    }
}
function arixshell_cargar_botones_auto(){
    //var apps = arixshell_download_datos('arixapi/arixapi_cargar_botones');
    let apps = arixshellmainvar[4];//arixshell_download_datos('arixapi/arixapi_cargar_botones');
    if (apps !== null) {
        arixshellmainvar = apps;
    }else{
        console.log('arixshell_cargar_botones_auto -- error!');
    }
}
function arix_search_btns(btns){
    btns = btns.replace(" ", "");
    btns = btns.split(",");
    let temp = [];
    for (var i = 0; i < btns.length; i++) {
        let name = arixshellmainvar.find(data => data.boton == btns[i]);
        if (typeof(name) !== 'undefined'){
            temp.push(name); 
        }
    }
    return temp;
}
//trabajando en los botones locales
function arixshell_cargar_botones_menu(botones='btn-refrescar, btn-cerrar'){
    botones = arix_search_btns(botones);
    for (i = 0; i < Object.keys(botones).length; i++) {           
        $(arixshell_cargar_llave_local(0)).append('<button type="button" class="btn '+botones[i].clase+' '+botones[i].boton+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i].titulo+'"><i class="'+botones[i].icono+'"></i></button>');//agregas al final
    }
}

function arixshell_cargar_botones(botones='btn-detalles,btn-borrar', attr=""){//devuelve botones en bormato html
    //botones = arixshell_upload_datos('arixapi/arixapi_cargar_botones', 'data='+botones+'&');
    botones = arix_search_btns(botones);    
    attr = attr.split(',');
        let list = '<div class="btn-group btn-group-sm">';
        for (var i = 0; i < Object.keys(botones).length; i++) {
            if(typeof(attr[i]) != "undefined"){
                list+='<button type="button" '+attr[i]+' class="btn '+botones[i]['clase']+' '+botones[i]['boton']+'"><i class="'+botones[i]['icono']+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i]['titulo']+'"></i></button>';
            }else{
                list+='<button type="button" class="btn '+botones[i]['clase']+' '+botones[i]['boton']+'"><i class="'+botones[i]['icono']+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i]['titulo']+'"></i></button>';
            }
        }
        return list+'</div>';
    /*if (botones != false) {
        let list = '<div class="btn-group btn-group-sm">';
        for (var i = 0; i < Object.keys(botones).length; i++) {
            if(typeof(attr[i]) != "undefined"){
                list+='<button type="button" '+attr[i]+' class="btn btn-secondary '+botones[i]['boton']+'"><i class="'+botones[i]['icono']+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i]['titulo']+'"></i></button>';
            }else{
                list+='<button type="button" class="btn btn-secondary '+botones[i]['boton']+'"><i class="'+botones[i]['icono']+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i]['titulo']+'"></i></button>';
            }
        }
        return list+'</div>';
    }else{
        console.log('arixshell_cargar_boton_simple -> error');
    }*/
}

/*function arixshell_cargar_botones_tabla(botones='btn-detalles,btn-borrar'){//devuelve botones en bormato html
    botones = arixshell_upload_datos('arixapi/arixapi_cargar_botones', 'data='+botones+'&');
    if (botones != false) {
        var list = '<div class="btn-group btn-group-sm">';
        for (var i = 0; i < botones.length; i++) {
            list+='<button type="button" class="btn btn-secondary '+botones[i]['boton']+'"><i class="'+botones[i]['icono']+'" data-toggle="tooltip" data-placement="bottom" title="'+botones[i]['titulo']+'"></i></button>';
        }
        return list+'</div>';
    }else{
        console.log('arixshell_cargar_boton_simple -> error');
    }
}*/
function arixshell_cargar_idcontenedor_en_secondary(id){
    var id = id.replace(" ", "");
        id = id.replace("#", "");
    $('#nav-idont-know ul:last').attr('id', 'btn'+id);
    $('#use-container-secondary').html('<div class="row" id="'+id+'"></div>');
}
function arixshell_mostrar_targeta_borde_color(estado = true){
    return estado==true?"border-success":"border-danger";
}
function arixshell_mostrar_targeta_imagetop_simple(image, titulo, subtitulo, fecha, btns='btn-detalles,btn-borrar', uid = '_error_de_cifrado_'){
    return '<div class="card card-arix" style="font-size: 12px;"><img loading="lazy" src="'+image+'" class="card-img-top img-fluid" alt="..."> <div class="card-body"><dl class="dl-horizontal"><dt>'+
    titulo.substring(0,34)+'</dt><dd>'+subtitulo.substring(0,34)+'</dd></dl></div><div class="card-footer text-muted d-flex align-items-left justify-content-between" style="margin-top: -20px;"><span class="text-info" style="margin-top: 4px">'+
    fecha+'</span><div class="btn-group btn-group-sm" style="margin: -3px" id="'+uid+'">'+arixshell_cargar_boton_simple(btns)+'</div></div></div>';
}
function arixshell_mostrar_targeta_imageleft_simple(image, titulo, subtitulo, subtitulo2, subtitulo3, fecha, estado = true, btns='btn-detalles,btn-borrar', uid = '_error_de_cifrado_'){
    return '<div class="card card-arix '+arixshell_mostrar_targeta_borde_color(estado)+'" style="font-size: 12px;"> <div class="card-header">'+titulo+'</div><div class="row no-gutters"> <div class="col-md-2"> <img loading="lazy" class="img-fluid" style="margin: 1px" src="'+
    image+'" alt="..."> </div><div class="col-md-10"> <div class="card-body"> <ul class="list-unstyled" style="margin: 0px"><dt>'+subtitulo+'</dt><li>'+subtitulo2+'</li><li>'+subtitulo3+'</li></ul></div></div></div><div class="card-footer text-muted d-flex align-items-left justify-content-between"> <span class="text-info" style="margin-top: 4px">'+
    fecha+'</span> <div class="btn-group btn-group-sm" style="margin: -3px" id="'+uid+'">'+arixshell_cargar_boton_simple(btns)+'</div></div></div>';    
}
//solucion
function arixshell_cargar_boton_buscar(placeholder = 'Buscar ...'){
    var elocation = 'main #nav-item-input-buscar';
    $(elocation).html('')
    buscar = '<div class="input-group input-group-sm mb-1" style="padding-right: 5px;"><input type="text" class="form-control" placeholder="'+placeholder+'" aria-label="Buscar ..." aria-describedby="button-addon2"><div class="input-group-append"><button class="btn btn-outline-secondary btn-sm" type="button" id="button-addon2"><i class="fas fa-search"></i></button></div></div>';
    $(elocation).append(buscar);
}
//cerrar sessiom
$('nav #dropdown-item-u3').click(function(){
    dato = arixshell_download_datos('arixapi/arixapi_cerrar_sesion');
    if (dato.status == true) {
        window.location.replace('./');
        //window.location.replace(window.location.href);
    }else{
        window.location.replace('./inicio');
        //location.reload();
        //return;
    }
});
//Cuando haces click en algundo de los menus 
$('#layoutSidenav_nav').on("click", ".nav-link", function() { //Clic en alguno de los elementos del munu
    $('#use-container-secondary').html('');//reestablce el primer contenedor
    var a = $(this).attr('controller'), b = $(this).text();//titulo
    arixshell_cargar_paginas(window.location.href+'/'+a);
    $('#sidenavAccordion').find('a').removeClass('active').removeClass('disabled');
    $(this).addClass('active').addClass('disabled');
    arixshell_cargar_third_subtitulo(b);//esto debe ser generalizado (titulo,url,position)
});
//usa pila, ultimo en entrar ultimo en salir 
function arixshell_hacer_pagina_atras(){
    leer = JSON.parse(sessionStorage.getItem('pages'));
    if (leer.length > 1) {
        $('#user-title-breadcrumb li').last().remove();//eliminar el ultimo subtitulo        
        leer.pop();//eliminar la url del ultimo subtitulo        
        sessionStorage.setItem('pages', JSON.stringify(leer));
        arixshell_cargar_paginas(leer[leer.length -1]);        
    }else{
        return;
    }
}
function arixshell_hacer_pagina_reiniciar(){
    $('#layoutSidenav_nav .active').click();
}
function arixshell_actualizar_sucursal(a){
    if (!$.isNumeric(a)) {
        return arixshell_upload_datos('arixapi/arixapi_change_sucursal','data='+a);
    }else{
        return '_error_de_cifrado';
    }
}
$('#sucursal-db-list').on("click", ".dropdown-item", function() { //Clic en alguno de los elementos sucursal
    var a = $(this).attr('id');
    a = arixshell_actualizar_sucursal(a);
    if(typeof(a)==='boolean') {
        arixshell_cargar_sucursal();//no se puede cambiar
        arixshell_cargar_sucursal_lista();//no se puede cambiar       
        arixshell_hacer_pagina_reiniciar();
        number = $('#sucursal-db-list').first().text();number = number.split(',');
        $('#user-title-breadcrumb li').first().text(number[0]);//actualiza el numero de la sucursal
    }else{
        //location.reload();
        //puede que haya cambiado los permisos
        return;
    }    
});
function arixshell_cargar_lista_cards(tabla,btns='btn-detalles,btn-borrar',cant){
   let lista = arixshell_upload_datos('arixapi/arixapi_cargar_lista_card','data='+tabla+'&cant='+cant);
    if (lista != false) {
        var elocation = '#use-container-secondary';
        $(elocation).html('');//borras los registros actuales
        for (i = 0; i < lista.length; i++) { 
            temp = arixshell_mostrar_card_users(lista[i].fotografia,lista[i].nombres+', '+lista[i].paterno+' '+lista[i].materno, lista[i].documento+' - '+lista[i].codigo, lista[i].codigo, lista[i].fregistro,lista[i].fregistro, lista[i].fregistro, btns, lista[i].uid);         
            $(elocation).append(temp);//agregas al final
        }
    }else{
        console.log('arixshell_cargar_lista_cards -> error');
    }
}
function arixshell_alert_continue(icono='error',titl='Error',message='Arix Corp',btntext='Anular',url,data){
    Swal.fire({
        title: titl,
        text: message,
        icon: icono,
        showCancelButton: true,
        confirmButtonText: btntext,
        cancelButtonText:'Cerrar',
        allowOutsideClick:false,
        customClass:{
            confirmButton:'btn btn-info btn-sm',
            cancelButton:'btn btn-secondary btn-sm'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            arixshell_write_cache_serial("local_cache_id",data);
            arixshell_cargar_contenido(url,message);             
        }
    })
}
function arixshell_alert_delete(icono='error',titl='Error',message='Arix Corp',btntext='Anular',url,data,btnClickExit){
    Swal.fire({
        title: titl,
        text: message,
        icon: icono,
        showCancelButton: true,
        confirmButtonText: btntext,
        cancelButtonText:'Cerrar',
        allowOutsideClick:false,
        customClass:{
            confirmButton:'btn btn-info btn-sm',
            cancelButton:'btn btn-secondary btn-sm'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let request = arixshell_upload_datos(url,data);
            if(request.status===true){
                $(btnClickExit).click();
                Swal.fire(
                    'Correcto...!',
                    'La petición fue realizada correctamente',
                    'success'
                )
            }else{
                Swal.fire(
                    'Error...!',
                    'La petición no fue realizada correctamente',
                    'error'
                )
            }                
        }
    })
}
function arixshell_alert_notification(icone,message){
    Swal.fire({
        title: message,
        icon: icone,
        padding:'1rem',
        width:'500px',
        timer:5000,
        showCancelButton: false,
        showConfirmButton:false,
        stopKeydownPropagation:false,
        position:'bottom-end',
        toast:true
    })
}
async function arixshell_cargar_opciones(location, url, html=''){
    let data = await arixshell_download_datos(url),keys=[];
    if(typeof(data)==='object'){
        $(location).html(html);
        for (var key in data[0]) {keys.push(key);}
        for(i =0; i<data.length; i++){
            $(location).append('<option value="'+data[i][keys[0]]+'" >'+data[i][keys[1]]+'</option>');
        }
    }else{
        console.log('mpsr_cargar_servicios -- Error');
    }
}
async function arixshell_subir_opciones(location,url,data,html=''){
    var data = await arixshell_upload_datos(url, data), keys=[];
    if(typeof(data)==='object'){
        $(location).html(html);
        for (var key in data[0]) {keys.push(key);}
        for(var i =0; i<data.length; i++){
            $(location).append('<option value="'+data[i][keys[0]]+'" >'+data[i][keys[1]]+'</option>');
        }
    }else{
        console.log('mpsr_subir_opciones -- Error');
    }
}
//perfecto par BLUR
async function  arixshell_check_duplicate(location,url,request,message='El dato ingresado se encuentra registrado ...'){
        request = await arixshell_upload_datos(url, 'txtdata='+request+'&');
        if(request.status==false){
            $(location).addClass('is-valid');
        }else{
            arixshell_alert_notification('warning',message);
            $(location).val("");
            $(location).removeClass('is-valid');            
        }
}
//IDEAL PARA RESPUIEST INMEDIATA
/*function  arixshell_isn_duplicated(url,request){
    request = arixshell_upload_datos(url, 'txtdata='+request+'&');
    if(request.status==false){
        return true;//esto se intercambia por si occurre un error de arixshell_upload_datos
    }else{
        arixshell_alert_notification('warning','El dato ingresado se encuentra registrado ...');        
        return false;           
    }
}*/
function arixshell_abrir_modalbase(titulo,loadurl,btnkey=null){//btn- personalizado    
    $('#arixgeneralmodal .modal-title').text(titulo);
    arixshell_cargar_subpaginas(loadurl,'#arixgeneralmodal .modal-body');
    btnkey = btnkey==null?'':'<button type="button" class="btn btn-primary btn-sm" id="'+btnkey+'">Salir</button>';    
    $('#arixgeneralmodal .modal-footer').html(btnkey);
    $('#arixgeneralmodal').modal({
        keyboard: false,
        backdrop: "static",
        show:true
    });
}
function arixshell_abrir_mainModal(titulo,loadurl,btnkey){    
    $('#arixgeneralmodal2 .modal-title').text(titulo);
    arixshell_cargar_subpaginas(loadurl,'#arixgeneralmodal2 .modal-body');
    $('#arixgeneralmodal2 .modal-footer').html('<button type="button" class="btn btn-secondary btn-sm" id="'+btnkey+'">Cerrar</button>');
    $('#arixgeneralmodal2').modal({
        keyboard: false,
        backdrop: "static",
        show:true
    });
}

function arixshell_cargar_obigeo(depa,prov,dist,txtdist = false,txtprov=false,txtdepa=false){
    if(txtdist == false){
        arixshell_cargar_opciones(depa, 'arixapi/arixapi_get_departamentos').then(function(){
            let dep = $(depa+" option:eq(20)").attr("selected", "selected").val();
            arixshell_subir_opciones(prov,'arixapi/arixapi_get_provincias', 'txtdata='+dep+'&').then(function(){
                dep = $(prov+" option:eq(10)").attr("selected", "selected").val();
                arixshell_subir_opciones(dist,'arixapi/arixapi_get_distritos', 'txtdata='+dep+'&');
            });        
        });
    }else{
        arixshell_cargar_opciones(depa, 'arixapi/arixapi_get_departamentos').then(function(){
            let dep = $(depa+" option:contains("+txtdepa+")").prop('selected', true).val();
            arixshell_subir_opciones(prov,'arixapi/arixapi_get_provincias', 'txtdata='+dep+'&').then(function(){
                dep = $(prov+" option:contains("+txtprov+")").prop('selected', true).val();
                arixshell_subir_opciones(dist,'arixapi/arixapi_get_distritos', 'txtdata='+dep+'&').then(function(){
                    $(dist+" option:contains("+txtdist+")").prop('selected', true);
                });
            });        
        });
    }/*
    $(depa).change(function(){
        var r = $(this).val();
        $(dist).html('');
        arixshell_subir_opciones('#per-form-base #per-province','arixapi/arixapi_get_provincias', 'txtdata='+r+'&');
    });
    $(prov).change(function(){
        var r = $(this).val();
        arixshell_subir_opciones(dist,'arixapi/arixapi_get_distritos', 'txtdata='+r+'&');
    });*/
}
function arixshell_cerrar_mainModal(){
    $('#arixgeneralmodal2 .modal-footer').html('');
    $('#arixgeneralmodal2 .modal-body').html('');
    $('#arixgeneralmodal2').modal('hide');
}
function arixshell_cerrar_modalbase(){
    $('#arixgeneralmodal .modal-footer').html('');
    $('#arixgeneralmodal .modal-body').html('');
    $('#arixgeneralmodal').modal('hide');
}
function arixshell_get_entities(dni){       
    if (dni.length==8){//request['dni']== dni            
        try {
            request = arixshell_download_datos('https://dniruc.apisperu.com/api/v1/dni/'+dni+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaG5hbGFtdXNAZ21haWwuY29tIn0.afUd28wIqmAoFV9CbIu9JZcIRynhCi1t1P--Sru3kRY');
            $("#per-form-base #per-names").val(request.nombres);
            $("#per-form-base #per-lastname").val(request.apellidoPaterno);
            $("#per-form-base #per-firstname").val(request.apellidoMaterno);            
        } catch (error) {
            console.error(error);            
        }
    }else if (dni.length==11){            
        try {
            request = arixshell_download_datos('https://dniruc.apisperu.com/api/v1/ruc/'+dni+'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaG5hbGFtdXNAZ21haWwuY29tIn0.afUd28wIqmAoFV9CbIu9JZcIRynhCi1t1P--Sru3kRY');
            $("#per-form-base #per-names").val(request.nombreComercial);
            $("#per-form-base #per-lastname").val(request.razonSocial);
            $("#per-form-base #per-address").val(request.direccion);            
        } catch (error) {
            console.error(error);        
        }
    }else{
        
        return;
    }
}
function arixshell_print_get_pdf(url,data){
    printJS({printable:location.href+'/'+url+'/'+data, type:'pdf', showModal:true});
}

/*----------------REDESARROLLAR MODULO DE TITULOS---------*/

/*--------------------------MAIN----------------*/
arixshell_autoload_sessiondata(); //inicializa los valores de la interfaz
arixshell_cargar_apps();
arixshell_cargar_titulo_page();
arixshell_cargar_auto_subtitulos();
arixshell_cargar_menu();
arixshell_cargar_usuario();
arixshell_cargar_sucursal_auto();
arixshell_cargar_botones_auto();