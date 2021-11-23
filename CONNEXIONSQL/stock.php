

<?php
include('connectmysql.php');



foreach ($_SESSION['login'] as $value) {
    $id = $value['id'];
    $value['login'];
    $value['prenom'];
    $value['nom'];
    $value['password'];
    $value['role'];

}


?>