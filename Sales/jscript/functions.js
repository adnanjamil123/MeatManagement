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

    

})