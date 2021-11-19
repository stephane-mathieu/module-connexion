<?php
  // Initialiser la session
  session_start();
  
  // Détruire la session.
  session_unset();

    // Redirection vers la page de connexion
    header("Location: ../index.php");
?>