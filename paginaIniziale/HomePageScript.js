function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function controllo(mail){
 
  if(mail ==  undefined){
    window.alert("Devi effettuare il login per accedere al gioco!");
  }
  else{
    window.location.href="../quiz/quiz.php";
  }
}

$(document).ready(function(){
  $(".parent div").mouseenter(function(){
    $(this).find("span").fadeIn(900);
  });
  $(".parent div").mouseleave(function(){
    $(this).find("span").fadeOut(600);
  });
});



