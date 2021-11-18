


function fetch_item() {
    item = document.getElementById("search").value;


    if (validate(item.trim())) {
        var xttp = new XMLHttpRequest;
        xttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                result = JSON.parse(xttp.response)


                document.getElementById("item-name").innerText = result[0].name

                addItem(result)



            } else if (this.readyState == 4 && this.status != 200) {

            }
        }
        xttp.open("GET", "item.php?a=" + item, true);
        xttp.send();
    } else {
        console.log("please enter valid data.")
    }


}

function validate(data) {
    if (isNaN(data)) {
        return false
    }


    if (data === "") {
        return false
    }
    if (data === 0) {
        return false
    }

    return true

}



function addItem(item) {
    
    //items id
    $itemId = item[0].id
    //items description
    $itemName = item[0].name
    $itemQty = 1.00
    //item UOM default PC
    $itemUom = "Pc"
    //item size default normal
    $itemSize = "normal"
    $itemPrice = item[0].price

    //vat pertange getting from config file
   
    $vatPercentage = parseInt(vatGlobal)
    
    $addedVat = 1 + ($vatPercentage/100)

    
    $vatAddedToItemPrice = parseFloat($itemPrice*$addedVat).toFixed(2)
    
    $totalWithoutVat = parseFloat($itemPrice * $itemQty).toFixed(2)

    $totalAmount = parseFloat($vatAddedToItemPrice * $itemQty).toFixed(2)

    var row = $('#tbody tr').length;
    
    $('#tbody').append(`<tr id="tr${row}">
    <td class="text-center noprint">
     <button class="btn btn-remove text-light" style="background:#204b6d"
         type="button" onclick='$(this).parent().parent().remove()'> <i class="fa fa-trash"></i></button>
     </td>

          <td class="row-index text-center item-id d-none d-lg-table-cell">
          ${$itemId}</td>

         <td class="row-index text-center item-text">
          ${$itemName}</td>

          <td style="background:#204b6d" class="row-index text-center lead text-light item-qty" name="qty" id="" onclick="editSelected(this,${$itemQty})">
          ${$itemQty}</td>

          <td class="row-index text-center item-uom d-none d-xl-table-cell">
            ${$itemUom}</td>

         <td class="row-index text-center item-size d-none d-lg-table-cell">
            ${$itemSize}</td>

            <td style="background:#204b6d" class="row-index text-center lead   text-light item-price d-none d-sm-table-cell" name="price" onclick="editSelected(this,${$itemPrice})">
            ${$itemPrice}</td>

            <td class="row-index text-center item-vat vat-display" name="vat">
            ${$vatPercentage}</td>

            <td class="row-index text-center item-without-vat vat-display" name="totalWithoutVat">
            ${$totalWithoutVat}</td>

            <td class="row-index text-center item-total" name="totalAmount">
            ${$totalAmount}</td>

    </tr>`);
}