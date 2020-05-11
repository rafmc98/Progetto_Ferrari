<?php
    session_start();
    // do any authentication first, then add POST variable to session
    $_SESSION['user-pic'] = $_POST['iconcina'];
?>