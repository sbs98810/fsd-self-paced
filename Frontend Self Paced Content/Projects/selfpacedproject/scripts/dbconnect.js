$(document).ready(()=>{
    $.ajax({
            type:"POST", 
            url:'php/dbconnection.php', 
            success:function(data){
                alert("welcome to Home Furniture Zone");
            }
    });
})