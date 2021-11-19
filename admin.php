<?php
session_start();
?>


<?php

include('./CONNEXIONSQL/connectmysql.php');
include('./CONNEXIONSQL/stock.php');

    $req = "SELECT * FROM utilisateurs";
    $query = mysqli_query($conn, $req);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/inscription.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./CONNEXIONSQL/deconnexion.php">Deconnexion</a>
          </li>
          <?php
                if($value['login'] == $value['login']){
                  ?><li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="profil.php">Modifier son profil</a>
          </li>
          <?php }; ?>
            <?php
                if($value['role'] == "administrateur"){
                ?> <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin.php">ADMIN</a>
              
            </li>
          <?php }; ?>
        </ul>
        <form class="d-flex">
          <input class="for " type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
  </div>
</nav>
</header>
<main>
  <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">login</th>
      <th scope="col">prenom</th>
      <th scope="col">nom</th>
      <th scope="col">password</th>
      <th scope="col">role</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $st) {  ?>
                    <tr>
                        <td> <?= $st['id']; ?> </td>
                        <td> <?= $st['login']; ?> </td>
                        <td> <?= $st['prenom']; ?> </td>
                        <td> <?= $st['nom']; ?> </td>
                        <td> <?= $st['password']; ?> </td>
                        <td> <?= $st['role']; ?> </td>
                    </tr>
                <?php }; ?>
        </tbody>
  </tbody>
</table>


</main>

<footer class="py-3 my-4 fixed-bottom">
  <div class="container">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item">
      <a href="" class="nav-link px-2 text-white">Home</a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link px-2 text-white">Features</a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link px-2 text-white">Pricing</a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link px-2 text-white">FAQs</a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link px-2 text-white">About</a>
    </li>
  </ul>
  <p class="text-center text-white">© 2021 Company, Inc</p>

</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>