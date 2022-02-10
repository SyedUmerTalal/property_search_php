const xhttp = new XMLHttpRequest();
var range = 4000;
xhttp.onload = function(r) {
    console.log(r);
    
}
// Send a request
xhttp.open("POST", "ajax.php");
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("range="+range);
