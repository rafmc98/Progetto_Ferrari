$(document).ready(function() {
  $("#sparisci").hide();
  $(".angolo").click(function() {
      if($("#freccia").attr('class')=='fas fa-angle-down'){
          $("#sparisci").slideToggle(700);
          $('#freccia').attr('class','fas fa-angle-up');
      }
      else{
          $("#sparisci").slideToggle(700);
          $('#freccia').attr('class','fas fa-angle-down');
      }
  });

  
});

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


