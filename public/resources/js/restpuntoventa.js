function restpv_lista_card(location,ids,nombre,user,status){
    user = status == true?user:"Libre";
    status = status == false ? "bg-success" : "bg-danger";    
    $(location).append('<div class="col-xl-3 col-md-6">'+
                            '<div class="card '+status+' text-white mb-4" odd="'+ids+'">'+
                                '<div class="card-body">'+nombre+'</div>'+
                                 '<div class="card-footer d-flex align-items-center justify-content-between">'+
                                    '<a class="small text-white stretched-link" href="javascript:;">'+user+'</a>'+
                                    '<div class="small text-white"><i class="fas fa-angle-right"></i></div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');
}
function rest_card_product_show(location,barcode,title,descripcion,img){    
    $(location).append('<div class="col-xl-4 col-md-6">'+
                '<div class="card shadow" odd="'+barcode+'">'+
                    '<img class="card-img" src="'+img+'"/>'+
                    '<div class="card-body" style="margin: -0.3rem; margin-bottom: -0.3rem;">'+
                        '<small class="font-weight-bold">'+title+'</small>'+
                    '</div>'+
                    '<div class="card-footer">'+
                        '<small class="text-muted">'+descripcion+'</small>'+
                    '</div>'+
                '</div>'+
            '</div>');
}
const rest_filtrar = (request,text) =>{    
    $('#products-lists').html("");
    for(let producto of request){
        let nombre = producto.barcode +' '+producto.producto+' '+producto.descripcion;
        nombre = nombre.toLowerCase();
        if(nombre.indexOf(text) !==-1){
            rest_card_product_show("#products-lists",producto.barcode,producto.producto,producto.descripcion,"public/apps/img/"+producto.image);
        }        
    }
}