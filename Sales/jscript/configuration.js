$.getJSON('jscript/config.json', function(data) {
    if(data.options.itemAddOption === "TRUE")
    {
        $(".items-container").css("display","block")
        
    }else{
        $(".items-container").css("display","none")
    }

    if(data.options.vat === "TRUE")
    {
        $(".vat-display").css("display","block")
        
    }else{
        $(".vat-display").css("display","none")
    }
  
});

function editSelected(e)
{   
    
    oldValue = e.innerText
    e.id ="uniqueId"
    e.innerHTML = `<input class="w-50" type="text" id="temp-input" onfocusout="deleteTempInput(this)"></input>`
    
    $("#temp-input").val(oldValue)
    $("#temp-input").focus()
    $("#temp-input").select()

    
}

function deleteTempInput(obj)
{
    var objVal = (obj.value).trim()
    if(objVal == "" || isNaN(objVal))
    {
        objVal = 1
    }
    rowId = $(obj).closest('tr').attr('id');

    document.getElementById("uniqueId").innerHTML = ""
   document.getElementById("uniqueId").innerText = objVal
   document.getElementById("uniqueId").id = ""

   update(rowId)

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
    addedVat = 1 + (vat/100)
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

