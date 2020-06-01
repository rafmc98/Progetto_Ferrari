<script>
    $(document).ready(function(){

      $('#iconaProfilo').css({
                "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
                "background-size" : "cover"
            });
    });
  </script>

  <script>
    $(document).ready(function(){
      $('#quiz').click(function() {
        if('<?php echo isset($_SESSION["email"]);?>'){
          window.location.replace("../quiz/quiz.php");
        }
        else{
          window.alert("Devi effettuare il login per accedere al quiz!");
        }
      });
    });
  </script>