var all = document.querySelectorAll('.login');
var linklog = document.getElementById('link1');
var linksign = document.getElementById('link2');
var logu = document.getElementById('mlog');
var signu = document.getElementById('modal-sign');

linklog.addEventListener('click',function(e){
    e.preventDefault();
    linklog.classList.add('acti');
    linksign.classList.remove('acti');
    logu.style.display= 'block';
   signu.style.display = 'none';
    
    

})


linksign.addEventListener('click',function(e){
    e.preventDefault();
    linksign.classList.add('acti');
    linklog.classList.remove('acti');
    logu.style.display= 'none';
   signu.style.display = 'block';
})








// all.forEach(function(para){
//     para.addEventListener('click',function(e){
//         e.preventDefault();
//         // para.classList.toggle('acti');
         
//         if (linksign.classList.contains('acti')) {
//             linksign.classList.remove('acti');
//             linklog.classList.add('acti');
//         } else {
            
//         }


//     //     if (para.classList.contains('acti')) {
//     //         para.classList.remove('acti');
//     //     } else {
//     //         para.classList.add('acti');
//     //     }
//       })
// })