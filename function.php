<?php

function Info(){
    if (isset($_SESSION['login'])){
        include('./CONNEXIONSQL/connectmysql.php');
        $ConnectedUser = $_SESSION['login'];
        $Requete = mysqli_query($Bdd, "SELECT login, prenom, nom FROM utilisateurs WHERE login= '$ConnectedUser'");
        $rows = mysqli_num_rows($Requete);
        if ($rows == 1){
            $Users = mysqli_fetch_all($Requete, MYSQLI_ASSOC);
            foreach ($Users as $User){
                echo'<h2 class = "p1">Nom : '.$User['nom'].'<br></h2>';
                echo'<h2 class = "p2">Prenom : '.$User['prenom'].'<br></h2>';
                echo'<h2 class = "p3">Login : '.$User['login'].'</h2>';
            }
        }
    }
}

?>