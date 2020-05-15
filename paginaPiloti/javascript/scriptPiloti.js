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


var app=new Vue({
  el:'#app',
  data:{
  image:"leclerc/immagini/vittoriamonza.jpg",
  description:"La vittoria a Monza del 2019",
  video:"leclerc/video/VittoriaMonza.mp4",
  desc:"In foto Leclerc che alza la coppa del primo posto davanti il gremito popolo Ferrarista dopo ben 10 anni dall'ultima vittoria del cavallino rampante in Italia",
  variants:[
    {id:2241,testo:'Vittoria Monza',description:"La vittoria a Monza del 2019",video:"leclerc/video/VittoriaMonza.mp4", desc:"In foto Leclerc che alza la coppa del primo posto davanti il gremito popolo Ferrarista dopo ben 10 anni dall'ultima vittoria del cavallino rampante in Italia",image:"leclerc/immagini/vittoriamonza.jpg"},
    {id:2242,testo:'Prima vittoria in Ferrari',description:"La prima vittoria in Ferrari",video:"leclerc/video/VittoriaSpa.mp4", desc:"Nel GP di SPA(Belgio) Charles Leclerc vince la sua prima gara in F1 e in Ferrari.",image:"leclerc/immagini/primavittoria.jpg"},
    {id:2243,testo:'Prima gara in Ferrari',description:"La prima gara in Ferrari", video:"leclerc/video/Melbourne.mp4",desc:"In foto Leclerc e la sua splendida F90 che affrontano una delle curve del circuito Australiano di Melbourne,terminerà la sua prima gara in Ferrari al quinto posto.",image:"leclerc/immagini/primogp.jpg"}
  ]
  },
  methods:{
    updateAll:function(im,des,d,v){
      this.image=im;
      this.description=des;
      this.desc=d;
      this.video=v;
    }
  }
  });