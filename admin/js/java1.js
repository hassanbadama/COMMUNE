function ajax(n) {	
    var xhttp = new XMLHttpRequest();
     xhttp.open("GET", "ajax.php?nom="+n, true);
      xhttp.send();
     
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 || this.status == 200) {
        document.getElementById("depart").innerHTML =this.responseText;
      }
    };
   
}
function ajax1(n) {
    var xhttp = new XMLHttpRequest();
     xhttp.open("GET", "ajaxarrondissement.php?nom="+n, true);
      xhttp.send();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 || this.status == 200) {
        document.getElementById("arrond").innerHTML =this.responseText;
      }
    };
}
document.getElementById("mail").addEventListener("submit",function(e){
  var mail = document.getElementById("mail").MAIL.value
  var nom=document.getElementById("mail2")
   var maile= new RegExp("^[a-zA-Z]+[@]{1}[a-zA-Z]+[.]{1}[a-z]{3}$", "g")
   console.log(nom.value)
    if(nom.value.length<=5){
    e.preventDefault()
    alert("mot de passe trop petit")
    }
    if(maile.test(mail)===false){
          e.preventDefault()
          alert("email pas bon")
    }
})
















