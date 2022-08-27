var tbod = document.getElementById('tbod');
var editModal = document.getElementById('edit-box');
var modalData = document.getElementById('editdata');
var eBtns = document.getElementById('e-btn');
var side = document.querySelectorAll('.side-link');



function ajax(p,m){
    // console.log(p);
    // console.log(m);

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhttp.onreadystatechange = function(){
        if (xhttp.status == 200 && xhttp.readyState == 4) {
             tbod.innerHTML = xhttp.responseText;
            //  console.log(xhttp.responseText);
        }
    }

    xhttp.open('POST','validation.php',true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send("val="+p+"&method="+m);
}
ajax(1,'show');



function pagin(para,meth){
    // console.log(para);
   ajax(para,meth);
}


function edit(para ,meth){

    // window.open("http://localhost/foody/admin/admin_home.php","_top")
        // eBtns.addEventListener('click',function (e) {
        //     e.preventDefault();
        //     if (editModal.classList.contains('bg-active')) {
        //         editModal.classList.remove('bg-active');
        //     } else {
        //         editModal.classList.add('bg-active');
        //     }
        // })



    // console.log(para+" "+meth);
    if (editModal.classList.contains('bg-active')) {
        editModal.classList.remove('bg-active');
    } else {
        editModal.classList.add('bg-active');
    }
    

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhttp.onreadystatechange = function(){
        if (xhttp.status == 200 && xhttp.readyState == 4) {
             modalData.innerHTML = xhttp.responseText;
            //  console.log(xhttp.responseText);
        }
    }

    xhttp.open('POST','validation.php',true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send("val="+para+"&method="+meth);
}

function deleto(para,meth){
    // console.log(para+" "+meth);
   ajax(para,meth);
   ajax(1,'show');
}


function update() {
    var id = document.getElementById('edit-id').value;
  var name = document.getElementById('edit-name').value;
    var type = document.getElementById('edit-type').value;
    var category = document.getElementById('edit-category').value;
    var price = document.getElementById('edit-price').value;
     
    // console.log(name+" "+type+" "+category+" "+price);
    
    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhttp.onreadystatechange = function(){
        if (xhttp.status == 200 && xhttp.readyState == 4) {
            //  modalData.innerHTML = xhttp.responseText;
             console.log(xhttp.responseText);
             modalOff();
             ajax(1,'show');
        }
    }

    xhttp.open('POST','validation.php',true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send("id="+id+"&name="+name+"&type="+type+"&category="+category+"&price="+price);


}

function searcho() {
    var search = document.getElementById('search').value;
    var para = search;
    var meth = 'search';

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhttp.onreadystatechange = function(){
        if (xhttp.status == 200 && xhttp.readyState == 4) {
             tbod.innerHTML = xhttp.responseText;
            //  console.log(xhttp.responseText);
        }
    }

    xhttp.open('POST','validation.php',true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send("val="+para+"&method="+meth);

}

function modalOff() {
    if (editModal.classList.contains('bg-active')) {
        editModal.classList.remove('bg-active');
    } else {
        editModal.classList.add('bg-active');
    }
}

// * modal on off button
