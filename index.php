<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza du chef</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
    <!-- =============== Nav ===============-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="./assets/logo1.png" width="55" alt="" srcset="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/livreurs.php">Livreurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/commandes.php">Commandes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<body>
<main>
<h1 class="text-center my-5">Pizzas</h1>
<div class='container w-75 mx-auto mt-5 mb-5 text-center'>
<div class='row justify-content-evenly'>
          <?php 
          include_once "./src/pizza.php";
          ?>
        </div>
      </div>
</main>

</body>
<footer>
  <p>&copy; </p>
</footer>
    <script src="./js/app.js"></script>
    <script src="./js/date.js"></script>
</html>