<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="../paginaIniziale/homePage.php">Home</a>
    <div class="dropdown">
      <div class="dropbtn">Formula 1 &nbsp<i id="menu-arrow" class="fas fa-caret-down"></i></div>
      <div class="dropdown-content">
          <a href="../paginaF1/formula1.php">Panoramica</a>
          <a href="../paginaRicercaPiloti/paginaRicercaPiloti.php">Ricerca piloti</a>
      </div>
    </div>
    <a href="../paginaRicercaMacchine/paginaRicercamacchine.php">Ricerca vetture</a>
    <a href="../paginaStoria/history.php"> Storia Ferrari </a>
    <a href="../paginaNews/news.php">News</a>
    <a href="../paginaStore/paginaStore.php"> Store </a>
    <a href='#' id="quiz"> Quiz </a>
    <a href="../paginaContatti/contatti.php">Contact</a>
</div>


<div class="navbar">
    <div class="openbtn" onclick="openNav()">☰ MENU</div>
    <div class="loginbtn">
      <?php if(isset($_SESSION['email']))
        echo "<div id=\"profile\"><div id=\"iconaProfilo\"></div><div id=\"username\"><a href=\"../paginaProfilo/paginaProfilo.php\">".$_SESSION['nome']."</a></div></div>";
      ?>
      <?php if(!isset($_SESSION['email']))
        echo "<a href=\"../paginaLogin/Login.html\">LOGIN</a>";
      ?>
    </div>
</div>


<div class="header">
  <div class="titolo">Passione Ferrari</div>
</div>