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
