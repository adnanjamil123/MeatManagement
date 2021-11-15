
 function fetch_item()
 {
     item = document.getElementById("search").value;
     
 
     if(validate(item.trim()))
     {  
        var xttp = new XMLHttpRequest;
        xttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200)
            {
                console.log(xttp.responseText)
                 result = JSON.parse(xttp.response)

                
                 document.getElementById("item-name").innerText = result[0].name
                 
                 
               
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