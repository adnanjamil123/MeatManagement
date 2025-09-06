
function handleKey(e) {

    if (e.keyCode == 13) {
        if (e.target.id == "search") {

            fetch_item()
        }
        if (e.target.id == "createItemCode") {

            createItem()
        }
    }
}

function createItem() {
    //get data
    $("#createItemCode").css("border-color", "black")
    $("#createItemName").css("border-color", "black")
    $("#createItemPrice").css("border-color", "black")

    // let vl =  $("#createItemCode").val()
    // // if(vl != ""){
    // //     $("#createItemCode").val(parseInt(vl))
    // // }


    let createItemBarCode = $("#createItemCode").val()
    let createItemNameInput = $("#createItemName").val()
    let createItemPriceInput = $("#createItemPrice").val()


    let dataObj = { createItemCode: createItemBarCode, createItemName: createItemNameInput, createItemPrice: createItemPriceInput }

    if(validateItems(dataObj)){

        let xhr = new XMLHttpRequest

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200 ){



                $("#createItemCode").val("")
                $("#createItemName").val("")
                $("#createItemPrice").val("")

                $("#search").val(createItemBarCode)
                $("#search").focus()
            }
        }

        xhr.open("GET", "item.php?barcode="+createItemBarCode+"&itemName="+createItemNameInput+"&itemPrice="+createItemPriceInput+"&pass=true", true)
        xhr.send()


    }


}

function validateItems(items) {

    for (const [key, value] of Object.entries(items)) {
        if (value == "") {
            $("#" + key).css("border-color", "red")
            return false
        }
        // if (key == "createItemCode") {
        //     if (value == "0") {
        //         $("#" + key).css("border-color", "red")
        //         return false
        //     }

        //     if (value % 1 != 0) {
        //         $("#" + key).css("border-color", "red")
        //         return false
        //     }

        // }
        if (key == "createItemPrice") {
            if (value == "0") {
                $("#" + key).css("border-color", "red")
                return false
            }
            if (isNaN(value)) {
                $("#" + key).css("border-color", "red")
                return false
            }
        }
    }
    return true
}


function fetch_item() {
    item = document.getElementById("search").value;
    $("#search").val("")

    if (validate(item.trim())) {
        var xttp = new XMLHttpRequest;
        xttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {


                result = JSON.parse(xttp.response)
                document.getElementById("item-name").innerText = result[0].name
                addItem(result)
                $("#item-name").css('color', 'white')
                try {



                } catch (e) {

                    $("#item-name").css('color', 'red')
                    $("#item-name").text("Item not exits")
                }


            } else if (this.readyState == 4 && this.status != 200) {

            }
        }
        var params = `a=${item}`;
        xttp.open("POST", "item.php", true);
        xttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xttp.send(params);
    } else {
        $("#item-name").text("Please enter valid value.")
    }


}

function validate(data) {
    // if (isNaN(data)) {
    //     return false
    // }
    if (data === "") {
        return false
    }
    if (data === 0) {
        return false
    }

    return true

}



function addItem(item) {

    if ((!invoiceStatus) || invoiceStatus == "close") {
        $(".new").click()
    }
    //items id
    $itemId = item[0].id
    $itemBarcode = item[0].item_barcode
    //items description
    $itemName = item[0].name
    $itemQty = parseFloat(1.00).toFixed(2)
    //item UOM default PC
    $itemUom = "Pc"
    //item size default normal
    $itemSize = "normal"
    $itemPrice = item[0].price

    //vat pertange getting from config file


    $addedVat = parseFloat(1 + (vatGlobal / 100)).toFixed(2)

    $vatPercentage = parseFloat($itemQty * ($itemPrice * vatGlobal) / 100).toFixed(2)

    $vatAddedToItemPrice = parseFloat($itemPrice * $addedVat).toFixed(2)

    $totalWithoutVat = parseFloat($itemPrice * $itemQty).toFixed(2)

    $totalAmount = parseFloat($vatAddedToItemPrice * $itemQty).toFixed(2)

    var row = $('#tbody tr').length;

    $('#tbody').append(`<tr id="tr${row}">
    <td class="text-center noprint">
     <button class="btn btn-remove text-light" style="background:#204b6d"
         type="button" onclick='$(this).parent().parent().remove()'> <i class="fa fa-trash"></i></button>
     </td>

          <td class="row-index text-center item-id d-none d-lg-table-cell">
          ${$itemId}-${$itemBarcode}</td>

         <td class="row-index text-center item-text">
          ${$itemName}</td>

          <td  class="row-index text-center lead item-qty" name="qty" id="" onclick="editSelected(this)">
          ${$itemQty}</td>

          <td class="row-index text-center item-uom d-none d-xl-table-cell">
            ${$itemUom}</td>

         <td class="row-index text-center item-size d-none d-lg-table-cell">
            ${$itemSize}</td>

            <td  class="row-index text-center lead  item-price d-none d-sm-table-cell" name="price" onclick="editSelected(this,${$itemPrice})">
            ${$itemPrice}</td>

            <td class="row-index text-center item-vat vat-display" name="vat">
            ${$vatPercentage}</td>

            <td class="row-index text-center item-without-vat vat-display" name="totalWithoutVat">
            ${$totalWithoutVat}</td>

            <td class="row-index text-center item-total" name="totalAmount">
            ${$totalAmount}</td>

    </tr>`);
}