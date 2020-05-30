function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}


$(document).ready(function(){
  $(".parent div").mouseenter(function(){
    $(this).find("span").fadeIn(900);
  });
  $(".parent div").mouseleave(function(){
    $(this).find("span").fadeOut(600);
  });
});



