<?php 
require_once('../src/commande.inc.php');
$sql = "SELECT * FROM commande ORDER BY NROCMDE DESC LIMIT 10";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza du chef</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/commande.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
   <!-- =============== Nav ===============-->
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
        <img src="../assets/logo1.png" width="55" alt="" srcset="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/livreurs.php">Livreurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Commandes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<body>
<main>
<h1 class="text-center mb-5">Commandes</h1>
    <div class="container ">
        <table class="table  table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Date de la commande</th>
            <th scope="col">Heure de la commande</th>
            <th scope="col">N° Client</th>
            <th scope="col">N° Livreur</th>
            <th scope="col">Actions</th> <!-- Ajout d'une colonne pour l'update -->
            <th scope="col"></th> <!-- Ajout d'une colonne pour la suppression -->
          </tr>
        </thead>
        <tbody class="">
        <?php 
        $firstIteration = true;
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['NROCMDE']; ?></td>
                <td><?php echo $row['DATECMDE']; ?></td>
                <td><?php echo $row['HEURECMDE']; ?></td>
                <td><?php echo $row['NROCLIE']; ?></td>
                <td><?php echo $row['NROLIVR']; ?></td>
                <td>
                    <?php 
                    if ($firstIteration) { 
                        // Ajout d'une liste déroulante pour la dernière commande
                    ?>
                        <form id="livreurForm" method="post">
            <input type="hidden" name="nrocmde" value="<?php echo $row['NROCMDE']; ?>">
            <label for="livreur">Choisir un livreur :</label>
            <select name="livreur" id="livreur">
                <?php
                // Récupérer la liste des livreurs depuis la table 'livreur'
                $sqlLivreurs = "SELECT NROLIVR, NOMLIVR FROM livreur";
                $resultLivreurs = $conn->query($sqlLivreurs);

                while ($rowLivreur = $resultLivreurs->fetch_assoc()) {
                    echo "<option value='{$rowLivreur['NROLIVR']}'>{$rowLivreur['NOMLIVR']}</option>";
                }
                ?>
            </select>
            <button type="button" class="btn btn-primary" onclick="updateLivreur()">Valider Livreur</button>
        </form>
                    <?php 
                        $firstIteration = false;
                    } 
                    ?>
                </td>
                <td>
                    <form action="../src/supprimer.php" method="post">
                        <input type="hidden" name="nrocmde" value="<?php echo $row['NROCMDE'];?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
        </table>
    </div>  
</main>

</body>
<footer>
        <p>&copy; </p>
    </footer>
    <script src="./js/app.js"></script>
    <script src="../js/date.js"></script>
    <script src="../js/updateLivreur.js"></script>
</html>