var res = document.getElementById('result');
var bo = document.getElementById('brand-off');

bo.classList.remove('non');

function show() {
    var search = document.getElementById('search').value;
    console.log(search)
    if (window.XMLHttpRequest) {
        var xhtp = new XMLHttpRequest();
    } else {
        var xhtp = new ActiveXObject('Microsoft.XMLHttp');
    }

    xhtp.onreadystatechange = function (e) {
       
        // console.log("hiii2");
       
        if (xhtp.status == 200 && xhtp.readyState == 4) {
            
            // console.log(xhtp.responseText);
            bo.classList.add('non');
            res.innerHTML = xhtp.responseText;
        } 
    }

    xhtp.open('POST','search_validate.php',true);
    
    xhtp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhtp.send("value="+search);

}