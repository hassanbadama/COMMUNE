function ajax() {
    var xhttp = new XMLHttpRequest();
     xhttp.open("GET", "ajax.html", true);
      xhttp.send();
     
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 || this.status == 200) {
        document.getElementById("f").innerHTML =this.responseText;
      }
    };
   
}
