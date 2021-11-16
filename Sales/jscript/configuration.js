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
    console.log(e)
}
