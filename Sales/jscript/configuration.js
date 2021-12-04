$.getJSON('jscript/config.json', function(data) {
    if(data.options.itemAddOption == "TRUE")
    {
        $(".items-container").css("display","block")
        
    }else{
        $(".items-container").css("display","none")
    }

  
});

function editSelected(e)
{   
    
    if(editGlobal != "TRUE" || invoiceStatus == "close")
    {
       
        return
    }
    
    if(!$("#uniqueId").length == 0) {
        
        document.getElementById("uniqueId").id = ""
    }
    oldValue = e.innerText
    e.id ="uniqueId"
    e.innerHTML = `<input class="w-50" type="text" id="temp-input" onkeypress="inputhandleKey(event)" onfocusout="deleteTempInput(this)"></input>`
    
    $("#temp-input").val(oldValue)
    $("#temp-input").focus()
    $("#temp-input").select()

    
}
function inputhandleKey(e) {
    if (e.keyCode == 13) {
        deleteTempInput(e.target)
    }
}

function deleteTempInput(obj)
{
    
    var objVal = (obj.value).trim()
    
    if(objVal == "" || isNaN(objVal) || objVal == 0)
    {
        objVal = 1
    }
    rowId = $(obj).closest('tr').attr('id');

    document.getElementById("uniqueId").innerHTML = ""
   document.getElementById("uniqueId").innerText = objVal
   

   update(rowId)
   // document.getElementById("uniqueId").id = ""

}


function update(tableRow)
{
    var qty , price, vat , totalWithoutVat, totalAmount

    $("#" +tableRow + " td").each(function(){

        if($(this).attr('name') == "qty")
        {
            qty = parseFloat(this.innerText).toFixed(2)

        }
        if($(this).attr('name') == "price")
        {
            price = parseFloat(this.innerText).toFixed(2)

        }
        if($(this).attr('name') == "vat")
        {
            vat = parseInt(this.innerText)

        }
        if($(this).attr('name') == "totalWithoutVat")
        {
            totalWithoutVat = parseFloat(this.innerText).toFixed(2)

        }
        if($(this).attr('name') == "totalAmount")
        {
            totalAmount = parseFloat(this.innerText).toFixed(2)

        }
        
    })
   
    
    
     
    addedVat = parseFloat(1 + (vat/100)).toFixed(2)
    
    vat = parseFloat(qty*(price*vatGlobal)/100).toFixed(2)
    
    vatAddedToItemPrice = parseFloat(price*$addedVat).toFixed(2)
    totalWithoutVat=parseFloat(price * qty).toFixed(2)
    totalAmount = parseFloat(vatAddedToItemPrice * qty).toFixed(2)
   
    $("#" +tableRow + " td").each(function(){

        if($(this).attr('name') == "qty")
        {
            this.innerText = qty

        }
        if($(this).attr('name') == "price")
        {
            this.innerText = price

        }
        if($(this).attr('name') == "vat")
        {
            this.innerText = vat

        }
        if($(this).attr('name') == "totalWithoutVat")
        {
            this.innerText = totalWithoutVat

        }
        if($(this).attr('name') == "totalAmount")
        {
            this.innerText = totalAmount

        }
        
    })
}

