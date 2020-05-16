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
    image: variants[0].img_evento,
    description: variants[0].descrizione_evento,
    video: variants[0].video,
    titolo: variants[0].titolo,
    variants:""
  },
  created: function(){
    this.getQuery()
  },
  methods:{
    updateAll:function(im,des,d,v){
      this.image=im;
      this.description=des;
      this.titolo=d;
      this.video=v;
    },
    getQuery: function(){
      axios.get('ajaxfile.php')
      .then(function (res) {
         app.variants = res.data;
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
});