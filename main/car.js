var slides = document.querySelectorAll('.slider');
var prev = document.querySelector('.prev-btn');
var next = document.querySelector('.next-btn');

var radBtns = document.querySelectorAll('.radio');

slides.forEach(function (el,index) {
    // console.log(el);
    el.style.left = `${index*100}%`;
})

var counter =0;

prev.addEventListener('click',function (e) {
    counter--;
    carasol();
    check(counter);
    
})

next.addEventListener('click',function (e) {
    counter++;
    carasol();
    check(counter);
})

function carasol(params) {

    if (slides.length == counter) {
        counter =0;
    } else if(counter < 0){
        counter = slides.length-1;
    }
    slides.forEach(function (el) {
        el.style.transform = `translateX(-${counter*100}%)`;
    })
}

function check(params) {
    radBtns.forEach(function (el) {
        // console.log(el);
        if (el.id-1 == params) {
            el.checked = true;
        } else {
            el.checked = false;
        }


    })
}