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




