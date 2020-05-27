  var ul=document.getElementById('ul');
  var btn=document.getElementById('button');
  var scoreCard=document.getElementById('scoreCard');
  var quizBox=document.getElementById('questionBox');
  var op1=document.getElementById('op1');
  var op2=document.getElementById('op2');
  var op3=document.getElementById('op3');
  var op4=document.getElementById('op4');


  var variabilejs="<?php echo json_encode($_SESSION['email']); ?>"

  function getEmail(){
     return variabilejs;
  }
      var app={
                questions:[
                          {q:'Qual è stato l ultimo pilota italiano ad iniziare una stagione da pilota titolare Ferrari?', 
                          options:['Giancarlo Fisichella','Ivan Capelli','Nicola Larini','Nessuno di questi'],answer:2},

                          {q:'Quanti GP ha vinto in totale Schumacher con la Ferrari?',options:['64','68','72','76'],answer:3},

                          {q:'Quale pilota brasiliano ha ottenuto più vittorie con la Ferrari?',options:['Rubens Barrichello','Felipe Massa','Nelson Piquet','Nessuno di questi'],answer:2},

                          {q:'In quale anno venne fondata la Scuderia Ferrari?',options:['1929','1925','1930','1922'],answer:1},

                          {q:'In quale città è nato Fernando Alonso?',options:['Madrid','Oviedo','Saragozza','Barcellona'],answer:2},

                          {q:'Quale è stato il primo GP vinto da Schumacher con la Ferrari?',options:['Italia 1996','Francia 1996','Spagna 1996','Nessuna delle precedenti'],answer:3},

                          {q:'Chi ha vinto il primo GP della storia della Ferrari?',options:['Nino Farina','Jose Froilàn Gonzàlez','Felipe Massa','Alberto Ascari'],answer:2},

                          {q:'Quanti campionati piloti ha vinto in totale la Ferrari?',options:['16','12','15','18'],answer:3},

                          {q:'Quale è stato il primo campione del mondo con la Ferrari?',options:['Ascari 1952','Farina 1950','Gonzales 1953','Nessuna delle precedenti'],answer:1},

                          {q:'Quale pilota brasiliano ha ottenuto più vittorie con la Ferrari?',options:['Rubens Barrichello','Nelson Piquet','Felipe Massa','Nessuna delle precedneti'],answer:3}

                          ],
               index:0,
               email:getEmail(),
                load:function(){
                	   if(this.index<=this.questions.length-1){
                        quizBox.innerHTML=this.index+1+" - "+this.questions[this.index].q;      
                        op1.innerHTML=this.questions[this.index].options[0];
                        op2.innerHTML=this.questions[this.index].options[1];
                        op3.innerHTML=this.questions[this.index].options[2];
                        op4.innerHTML=this.questions[this.index].options[3];
                        this.scoreCard();
                        sparisci.style.display="none";
                     }
                     else{
                        app.getQuery();
                        quizBox.innerHTML="Complimenti! Hai completato il quiz.";      
                        op1.style.display="none";
                        op2.style.display="none";
                        op3.style.display="none";
                        op4.style.display="none";
                        btn.style.display="none";
                        sparisci.style.display="";
                       

                        }
                },

                 next:function(){
                    this.index++;
                    this.load();
                 },


                check:function(ele){
                   
                         var id=ele.id.split('');
                         
                         if(id[id.length-1]==this.questions[this.index].answer){
                         	this.score++;
                         	ele.className="correct";
                         	ele.innerHTML="GIUSTO!";
                         	this.scoreCard();
                         }
                         else{
                         	ele.className="wrong";
                           ele.innerHTML="SBAGLIATO";
                           

                         }
                },
                notClickAble:function(){
                       for(let i=0;i<ul.children.length;i++){
                       	    ul.children[i].style.pointerEvents="none";
                       }
                },

                clickAble:function(){
                       for(let i=0;i<ul.children.length;i++){
                       	    ul.children[i].style.pointerEvents="auto";
                       	    ul.children[i].className=''

                       }
                },
                score:0,
                scoreCard:function(){
                   scoreCard.innerHTML=this.score+"/"+this.questions.length;
                },
               
                getQuery: function(){   
                  axios.get('ajaxfile.php',{
                      params:{
                          score: this.score,
                          email: this.email
                  }
                  }).then(function (response) {
                      app.variants = response.data;
                  }).catch(function (error) {
                      console.log(error);
                  });
              }
            }

            window.onload=app.load();
      
           function button(ele){
           	     app.check(ele);
           	     app.notClickAble();
           }

         function  next(){
              app.next();
              app.clickAble();
         } 



