<?php
session_start();

include('./CONNEXIONSQL/connectmysql.php');

if (isset($_POST['submit'])) {
  // recup les donnée//
  $login = mysqli_real_escape_string($conn, stripslashes($_POST['login']));
  $password = mysqli_real_escape_string($conn, stripslashes($_POST['password']));

  // recup la requette est lexecute//

  $req2 = "SELECT  login, password FROM utilisateurs WHERE login = 'admin'";
  $query2 = mysqli_query($conn, $req2);
  $result2 = mysqli_fetch_assoc($query2);


  $re = "SELECT password FROM utilisateurs WHERE login = '$login'";
  $que = mysqli_query($conn, $re);
  $result_psw = mysqli_fetch_assoc($que);


  function test($login)
  {
    include('./CONNEXIONSQL/connectmysql.php');
    $rec = "SELECT * FROM utilisateurs WHERE login = '$login'";
    $query4 = mysqli_query($conn, $rec);
    $_SESSION['login'] = mysqli_fetch_all($query4, MYSQLI_ASSOC);

    return ($_SESSION['login']);
  }



  if (password_verify($password, $result_psw['password'])) {
    $_SESSION['login'] = test($login);
    if (isset($_POST['submit'])) {
      header("Location: index.php");
    }
  }
  // verif et se co a ladmin//
  if ($result2['password'] == $password &&  $result2['login'] == $login) {
    $_SESSION['login'] = test($login);
    if (isset($_POST['submit'])) {
      header("Location: index.php");
    }
  } else {
    echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./CSS/inscription.css" " rel=" stylesheet" />
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
            <?php
            if ($value['role'] == "utilisateur" || $value['role'] == "administrateur") {
            ?><li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./CONNEXIONSQL/deconnexion.php">Deconnexion</a>
              </li>
            <?php }; ?>
            <?php
            if ($value['role'] == "utilisateur" || $value['role'] == "administrateur") {
            ?><li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profil.php">Modifier son profil</a>
              </li>
            <?php }; ?>
            <?php
            if ($value['role'] == "administrateur") {
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
    <h1 class="text-center  fst-italic text-white mt-5">Veuillez vous connecté</h1>
    <div>
      <div class="container col-5 position-absolute top-50 start-50 translate-middle bg-white">
        <form class="row g-3" action="" method="POST">
          <div class="mb-3 justify-content-center ">
            <label for="validationDefaultUsername" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="validationDefault03" placeholder="écris ton login" required>
          </div>
          <div class="mb-3 justify-content-center ">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="d-flex  pb-4  justify-content-center ">
            <button class="btn btn-primary" name="submit" type="submit">Valider</button>
          </div>
        </form>
      </div>
    </div>
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




