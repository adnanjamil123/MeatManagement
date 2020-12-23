$(document).ready(function(){

    $(".new").click(function(){

        $user = $("#user-data").attr("data-username");
        $branch = $("#user-data").attr("data-branch");

        

     $("div .invoice-header").load('load_data.php',{
            user:$user,
            branch:$branch
     },function(){
         
         
     });
        
    })

    function save_items()
    {
        $("#tbody tr:not(:first)").each(function(){

            $order_no = $('order-no').text();                
            $item_id = $('item_id').text();
            $item_qty = $('item_qty').text();
            $item_uom = $('item_uom').text();
            $item_size = $('item_size').text();
            $item_price = $('item_price').text();
            $item_vat = $('item_vat').text();
            $item_id = $('item_id').text();
            $item_without_vat = $('item_without_vat').text();
            $item_total = $('item_total').text();
        })
    }

})