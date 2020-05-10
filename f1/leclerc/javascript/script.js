
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
  image:"immagini/vittoriamonza.jpg",
  description:"La vittoria a Monza del 2019",
  video:"https://www.youtube.com/embed/y-xqDd9qOuA",
  desc:"In foto Leclerc che alza la coppa del primo posto davanti il gremito popolo Ferrarista dopo ben 10 anni dall'ultima vittoria del cavallino rampante in Italia",
  variants:[
    {id:2241,testo:'Vittoria Monza',description:"La vittoria a Monza del 2019",video:"https://www.youtube.com/embed/y-xqDd9qOuA", desc:"In foto Leclerc che alza la coppa del primo posto davanti il gremito popolo Ferrarista dopo ben 10 anni dall'ultima vittoria del cavallino rampante in Italia",image:"immagini/vittoriamonza.jpg",htmlColor:"red"},
    {id:2242,testo:'Prima vittoria in Ferrari',description:"La prima vittoria in Ferrari",video:"https://www.youtube.com/watch?v=y-xqDd9qOuA", desc:"ciao",image:"immagini/primavittoria.jpg",htmlColor:"red"},
    {id:2243,testo:'Prima gara in Ferrari',description:"La prima gara in Ferrari", video:"https://www.youtube.com/watch?v=y-xqDd9qOuA",desc:"In foto Leclerc che alza la coppa del primo posto davanti il gremito popolo Ferrarista dopo ben 10 anni dall'ultima vittoria del cavallino rampante in Italia",image:"immagini/primogp.jpg",htmlColor:"red"}
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