var btns = document.querySelectorAll('.m-btn');
var modal = document.getElementById('modal-box');

btns.forEach(function (el) {
    el.addEventListener('click',function (e) {
        e.preventDefault();
        
  
        if (modal.classList.contains('bg-active')) {
            modal.classList.remove('bg-active');
        } else {
            modal.classList.add('bg-active');
        }
    })
})

// function edit(p1,p2) {
//     console.log(p1)
// }