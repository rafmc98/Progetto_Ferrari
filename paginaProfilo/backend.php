<?php
    session_start();
    // Associa la nuova icona appesa alla richiesta alla sessione corrente
    $_SESSION['user-pic'] = $_POST['iconcina'];
?>