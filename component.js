Vue.component('menu-f', {
    template: `
    <div>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="#">About</a>
            <div class="dropdown">
                <div class="dropbtn">Formula 1</div>
                <div class="dropdown-content">
                    <a href="#">Panoramica</a>
                    <a href="#">Auto</a>
                    <a href="#">Piloti</a>
                </div>
            </div>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <div class="navbar" style="position:absolute">
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
    </div>
      `
    })
  
  new Vue({
    el: "#menu"
  })