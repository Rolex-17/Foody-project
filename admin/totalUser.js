var table = document.getElementById('sam');
var side = document.querySelectorAll('.side-link');

side.forEach(function (el) {
    el.addEventListener('click',function (e) {
       
        if (el.classList.contains('active-side')) {
            el.classList.remove('active-side');
        } else {
            el.classList.add('active-side');
        }
    })
})

function aja(p1,p2,p3) {
    
    console.log(p1);
    console.log(p2);
    console.log(p3);
    if (window.XMLHttpRequest) {
        var xhtp = new XMLHttpRequest();
    } else {
        var xhtp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhtp.onreadystatechange = function (e) {
       
        // console.log("hiii2");
       
        if (xhtp.status == 200 && xhtp.readyState == 4) {
            
            // console.log(xhtp.responseText);
            table.innerHTML = xhtp.responseText;
        } 
    }

    xhtp.open('POST','admin_validation.php',true);
    
    xhtp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhtp.send("v="+p1+"&m="+p2+"&table="+p3);
}

function users() {
    aja(1,'user','not');
    
}
function owner() {
    
    aja(1,'resowner','not');
}
function food() {
    aja(1,'food','not');
}

function edit(para1,para2 ,para3){
//   console.log(para1+" "+para2+" "+para3);

 console.log("edit sirf sam karega");

}

function deleto(para1,para2 ,para3) {
    aja(para1,para2 ,para3);
    if (para3 == 'user') {
        users();
    }else if (para3 == 'resowner') {
        owner();
    }else{
      food();
    }
}

users();