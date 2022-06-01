$(document).ready(function(){
// variables declaration 
var divString='';
var mainDiv='';
// Invoking Web services 
$.ajax({
    type:"POST", 
    url:'php/shop.php', 
    success:function(data){
        //console.log(data);
        convertJson(data);
    }
})


// convert string to json
function convertJson(data){
    var myjson_data = JSON.parse(data);
    console.log(myjson_data);

    addProduct(myjson_data);
}

// add product to UI
function addProduct(myjson_data){
    $.each(myjson_data, function(key, value){
        //console.log(value.product_id);
        divString += '<div class="col-md-3 mb-2">';
        divString +='<div class="card" style="width:18rem;">';
        divString +=`<img src=images/${value.product_img} class="card-img-top">`;
        divString +='<div class="card-body">';
        divString += `<h5 class="card-title">${value.product_name}</h5>`;
        divString += `<p class="card-text">${value.product_desc} </p>`;
        divString += `<label>Discount Price:</label><a class="text-dark text-decoration-line-through">₹${value.product_discount_price}</a><br>`;
        divString +='<button type="button" id="addWishListButton" class="btn btn-outline-danger"><i class="fi-rr-heart"></i></button>';
        divString +='<button type="button" id="cartBtn" class="btn btn-primary">Add to cart</button> ';
        divString +='</div>';
        divString +='</div>';
        divString +='</div>';
    });

    $(".row").append(divString);
}
});


