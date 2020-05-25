$(document).ready(function() {
  $('.carousel').carousel({
      interval: 4000
  })
});

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

Vue.component('user-name', {
  template: '<h1 style="color:red">Hi ANNICUUUUU</h1>'
  })

new Vue({
  el: "#app"
})


