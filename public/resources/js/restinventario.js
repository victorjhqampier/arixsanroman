function rest_en_add_cant (num, location = '#product-cant',focuse = "#product-barcode"){
    $(location).val(num);
    $(focuse).focus();
}
function rest_en_sum_cant ( num, location, types = false){
    let temp = $(location).val();
    if(types==false){
        $(location).val(parseInt(temp) + (parseInt(num)));
    }else{
        //$(location).val(parseFloat(temp) + 1);
        temp = parseFloat(temp);
        // //temp = temp.toFixed(2);
        //let temp2 = num;
        //temp += temp2;
        temp.toFixed(2);
        $(location).val(temp + (num));
    }
}

function rest_en_calcular_importe(htmlObject, addCant, rowCant = 5, rowPcompra = 6, rowImporte = 7){
    addCant = parseInt(htmlObject.find("td:eq("+rowCant+")").html()) + parseInt(addCant);
    //igual a Importe = rowPcompra 
    rowPcompra = parseFloat(htmlObject.find("td:eq("+rowPcompra+")").html()) * addCant;
    rowPcompra  = rowPcompra.toFixed(2);
    htmlObject.find("td:eq("+rowCant+")").html(addCant);
    htmlObject.find("td:eq("+rowImporte+")").html(rowPcompra);
}
function rest_en_recalcular_importe(htmlObject, /*addCant,*/ rowCant = 5, rowPcompra = 6, rowImporte = 7){
    let addCant = parseInt(htmlObject.find("td:eq("+rowCant+")").html());// + parseInt(addCant);
    //igual a Importe = rowPcompra 
    rowPcompra = parseFloat(htmlObject.find("td:eq("+rowPcompra+")").html()) * addCant;
    rowPcompra  = rowPcompra.toFixed(2);
    htmlObject.find("td:eq("+rowCant+")").html(addCant);
    htmlObject.find("td:eq("+rowImporte+")").html(rowPcompra);
}

function rest_en_calcular_total(htmlObject, location){
    let sum=0;
    htmlObject.each(function(){ 
        sum += parseFloat($(this).text().replace(/,/g, ''), 10);  
    });
    sum = sum.toFixed(1);
    $(location).text(sum+"0");
}

function rest_en_add_row(arrData,location){
    let keys=[];
    let btns = arixshell_cargar_botones('btn-borrar,btn-editar');
    for (let key in arrData) {keys.push(key);}
    $(location).append('<tr><td>'+btns+'</td><td class="d-none">'+arrData[keys[0]]+'</td><td></td><td>'+arrData[keys[1]]+'</td><td>'+arrData[keys[2]]+'</td><td class="text-center">'+arrData[keys[3]]+'</td><td class="text-right">'+arrData[keys[4]]+'</td><td class="text-right">'+arrData[keys[5]]+'</td></tr>');
}

function rest_en_product_edit(htmlObject){
    $("#product-edit-form #product-dateven-change").val(htmlObject.find('td:eq(2)').text());
    $("#product-edit-form #product-cant-change").val(htmlObject.find('td:eq(5)').text());
    $("#product-edit-form #product-compra-change").val(htmlObject.find('td:eq(6)').text());
    $("#product-edit-form").removeClass('d-none');
}
function rest_en_product_edit_close(htmlObject,btnInfo,rowCant = 5, rowPcompra = 6, rowImporte = 7){
    htmlObject.removeClass();
    if (btnInfo){
        let addCant = parseInt($("#product-cant-change").val());
        let addPcompra = $("#product-compra-change").val();
        
        htmlObject.find('td:eq(2)').html($("#product-dateven-change").val());
        htmlObject.find("td:eq("+rowCant+")").html(addCant);
        htmlObject.find("td:eq("+rowPcompra+")").html(addPcompra);
                
        addPcompra = parseFloat(addPcompra) * addCant;
        addPcompra = addPcompra.toFixed(2);
        htmlObject.find("td:eq("+rowImporte+")").html(addPcompra);
    }
}
function rest_en_htmltable_object(htmlTableTr,rowId=1,rowVencin = 2,rowBarcode = 3, rowName=4,rowCant=5,rowPcompra=6,rowImporte=7){
    let itemArray = {}, itemObject = [];
    if (htmlTableTr.length > 0){
        htmlTableTr.each(function(){//esto es es for
            itemArray  = {
                txtproductid : $(this).find('td').eq(rowId).text(),
                txtproductvenc : $(this).find('td').eq(rowVencin).text(),
                txtproductbarcode : $(this).find('td').eq(rowBarcode).text(),
                txtproductname : $(this).find('td').eq(rowName).text(),
                txtproductcant : $(this).find('td').eq(rowCant).text(),
                txtproductpcompra : $(this).find('td').eq(rowPcompra).text(),
                txtproductimporte : $(this).find('td').eq(rowImporte).text(),
            }
            itemObject.push(itemArray);
        });
        return itemObject; 
    }else{
        return [];
    }               
}


function rest_load_datatable_producto(location,datas){
    let btns = arixshell_cargar_botones('btn-banear,btn-editar,btn-detalles');
    $(location).DataTable({                
                //"destroy": true,
                "language":{
                    "processing": "Procesando...",
                    "lengthMenu": "_MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "info": "Total _MAX_, página _PAGE_ de _PAGES_",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                 /*{
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se ha encontrado nada, lo siento",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)"
                },*/
                //"scrollX": true,
                "ajax": {
                        "url" : "restinventario/productos_get",
                        "type": "POST",
                        "data": {"txtdata" : datas},
                        "dataSrc":""
                },                				
                "columns":[
                        
                        {"data": 'barcode'},
                        {"data": 'producto'},
                        {"data": 'descripcion'},
                        {"data": 'categoria'},
                        {"data": 'cant'},
                        {"data": 'pcompra'},
                        {"data": 'pventa'},
                        {"data": null, render: function ( data, type, row ) {return btns;}}
                ],
                "order": [
                        [ 5, "asc" ]
                ],
                "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('odd', data.axid);      
                }
    })
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

function rest_sell_add_row(arrData,location){
    //console.log(arrData);
    let keys=[];
    let btns = arixshell_cargar_botones('btn-borrar,btn-agregar,btn-restar');
    for (let key in arrData) {keys.push(key);}
    $(location).append('<tr><td>'+btns+'</td><td class="d-none">'+arrData[keys[0]]+'</td><td>'+arrData[keys[1]]+'</td><td>'+arrData[keys[2]]+'</td><td class="text-center">'+arrData[keys[3]]+'</td><td class="text-right">'+arrData[keys[4]]+'</td><td class="text-right">'+arrData[keys[5]]+'</td><td class="text-right">'+arrData[keys[6]]+'</td></tr>');
}

function rest_sell_calcular_importe(htmlObject, addCant, addDscto){
    addDscto = parseFloat(addDscto) * parseInt(addCant);//descuento
    addDscto = addDscto.toFixed(2);    

    addCant = parseInt(htmlObject.find("td:eq(4)").html()) + parseInt(addCant);    
    addDscto = parseFloat(htmlObject.find("td:eq(6)").html()) + parseFloat(addDscto);
    
    addDscto = addDscto.toFixed(2);
    
    let pVenta = parseFloat(htmlObject.find("td:eq(5)").html()) * addCant;
    pVenta = pVenta.toFixed(2);
    pVenta = parseFloat(pVenta) - parseFloat(addDscto);
    pVenta = pVenta.toFixed(2);

    htmlObject.find("td:eq(4)").html(addCant);
    htmlObject.find("td:eq(6)").html(addDscto);
    htmlObject.find("td:eq(7)").html(pVenta);
}