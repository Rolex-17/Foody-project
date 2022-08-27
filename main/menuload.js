
var cartL = document.getElementById('cart-log').textContent;
var cartC= document.getElementById('cart-color');
 var menuCart = document.getElementById('menu-cartbtn');

if (cartL >0) {
    cartC.classList.add('cart-color');
    menuCart.classList.remove('off-cart');
} else {
    cartC.classList.remove('cart-color');
    menuCart.classList.add('off-cart');
}


var count=0;



function load(pid){
   count=0;
   
    var atc = document.getElementById(`${pid}`);
    var cars = document.getElementById(`at${pid}`);
    var atcS =document.getElementById(`atc-${pid}`);
    var cart = document.getElementById(`cart-${pid}`);
     var cartVal = document.getElementById(`cart-${pid}`).textContent;
     console.log(cartVal);
    atc.classList.add('cart-display');
    atcS.classList.remove('cart-display');
    count++;
    cart.innerText =count;
    // cartL.innerText =count;
    // cartC.classList.add('cart-color');
    cars.classList.remove('cart-display');
    menuCart.classList.remove('off-cart');
    //  if (count >0) {
    //     cart.innerText =count;
    //     cart.classList.add('cart-color');
    //  } else {
    //      cart.innerText = '';
    //  }
    
}

function decrease(pid) {
    console.log(pid)
    var atc = document.getElementById(`${pid}`);
    var cars = document.getElementById(`at${pid}`);
    var atcS =document.getElementById(`atc-${pid}`);
    var cart = document.getElementById(`cart-${pid}`);
    var cartVal = document.getElementById(`cart-${pid}`).textContent;
    cartVal--;
    
    if ( cartVal == 0) {
        atcS.classList.add('cart-display');
        atc.classList.remove('cart-display');
    // cartC.classList.remove('cart-color');
    cars.classList.add('cart-display');
    cartL.innerText =' ';

    } 
    cart.innerText = cartVal;
    // cartL.innerText = cartVal;
    final( cartVal,pid);
}
function increase(pid) {
    var cartVal = document.getElementById(`cart-${pid}`).textContent;
    cartVal++;
    var cart = document.getElementById(`cart-${pid}`);
    cart.innerText =cartVal;
    // cartL.innerText =cartVal;
    final(cartVal,pid);
}
function final(params,pid) {
    // console.log(params+" "+pid);
    
    var quantity = document.getElementById(`quan-${pid}`);
    quantity.value = params;
}

