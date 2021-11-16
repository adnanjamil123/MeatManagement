


 function fetch_item()
 {
     item = document.getElementById("search").value;
     
 
     if(validate(item.trim()))
     {  
        var xttp = new XMLHttpRequest;
        xttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200)
            {
                
                 result = JSON.parse(xttp.response)

                
                 document.getElementById("item-name").innerText = result[0].name

                 addItem(result)
                 
                 
               
            }else if(this.readyState == 4 && this.status != 200)
            {
              
            }
        }
        xttp.open("GET","item.php?a="+item,true);
        xttp.send();
     }else
     {
        console.log("please enter valid data.")
     }
     
        
 }

 function validate(data)
 {
    if(isNaN(data))
    {
        return false
    }
    
    
    if(data === "")
    {
        return false
    }
    if(data === 0)
    {
        return false
    }
    
    return true
    
 }

 function addItem(item)
 {
   
    
     
     $total_without_vat = (item[0].price*1).toFixed(2);
     $vat = (item[0].price*0.15).toFixed(2);
     $total = (1 * item[0].price * $vat).toFixed(2);

    $('#tbody').append(`<tr id="Row">
    <td class="text-center noprint">
     <button class="btn btn-remove text-light" style="background:#204b6d"
         type="button" onclick='$(this).parent().parent().remove()'> <i class="fa fa-trash"></i></button>
     </td>

          <td class="row-index text-center item-id d-none d-lg-table-cell">
          ${item[0].id}</td>

         <td class="row-index text-center item-text">
          ${item[0].name}</td>

          <td class="row-index text-center item-qty" onclick="editSelected(this)">
          1</td>

          <td class="row-index text-center item-uom d-none d-xl-table-cell">
            Pc</td>

        <td class="row-index text-center item-size d-none d-lg-table-cell">
            normal</td>

        <td class="row-index text-center item-price d-none d-sm-table-cell">
        ${item[0].price}</td>

            <td class="row-index text-center item-vat vat-display">
            ${$vat}</td>

            <td class="row-index text-center item-without-vat vat-display">
            ${$total_without_vat}</td>

            <td class="row-index text-center item-total">
            ${$total}</td>

    </tr>`);
 }