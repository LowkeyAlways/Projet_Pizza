<?php
$servername = "localhost";
$username = "andy";
$password = "";
$database = "pizzabox";

$conn = new mysqli($servername, $username, $password, $database);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Le formulaire a été soumis, insérer la commande dans la table "commande"
    if (isset($_POST['commander'])) {
        $id_pizzas = $_POST['id_pizza'];  // Les ID des pizzas que l'utilisateur a commandées

        // Récupérer l'ID du client (NROCLIE) - Choix aléatoire parmi les clients existants
        $sqlGetClientId = "SELECT NROCLIE FROM client ORDER BY RAND() LIMIT 1";
        $resultGetClientId = $conn->query($sqlGetClientId);

        // Vérifier si la requête a réussi
        if ($resultGetClientId && $resultGetClientId->num_rows > 0) {
            $rowClientId = $resultGetClientId->fetch_assoc();
            $nroclie = $rowClientId['NROCLIE'];
        } else {
            echo "Erreur lors de la récupération de l'ID du client : " . $conn->error;
        }

        // Récupérer l'ID du livreur (NROLIVR) - Choix aléatoire parmi les livreurs existants
        $sqlGetLivreurId = "SELECT NROLIVR FROM livreur ORDER BY RAND() LIMIT 1";
        $resultGetLivreurId = $conn->query($sqlGetLivreurId);

        // Vérifier si la requête a réussi
        if ($resultGetLivreurId && $resultGetLivreurId->num_rows > 0) {
            $rowLivreurId = $resultGetLivreurId->fetch_assoc();
            $nrolivr = $rowLivreurId['NROLIVR'];
        } else {
            echo "Erreur lors de la récupération de l'ID du livreur : " . $conn->error;
        }

        // Obtenir le dernier identifiant inséré dans la table 'commande'
$sqlGetLastId = "SELECT MAX(NROCMDE) AS lastId FROM commande";
$resultGetLastId = $conn->query($sqlGetLastId);

if ($resultGetLastId && $resultGetLastId->num_rows > 0) {
    $rowLastId = $resultGetLastId->fetch_assoc();
    $lastInsertedId = $rowLastId['lastId'] + 1; // Insérer le dernier ID
} else {
    // Gérer le cas où il n’y a pas encore d’enregistrements dans la table 'commande'
    $lastInsertedId = 1; // Commencer par 1 s’il n’y a pas d’enregistrements existants
}   

// Vous pouvez maintenant utiliser $lastInsertedId lors de l’insertion dans la table 'commande'
$dateCommande = date('Y-m-d');
$heureCommande = date('H:i:s');
$sqlInsertCommande = "INSERT INTO commande (NROCMDE, NROCLIE, NROLIVR, DATECMDE, HEURECMDE) VALUES ('$lastInsertedId', '$nroclie', '$nrolivr', '$dateCommande', '$heureCommande')";
$resultInsertCommande = $conn->query($sqlInsertCommande);

// Vérifier si l’insertion de la commande a réussi
if ($resultInsertCommande) {
    
    
} else {

    echo "Erreur lors de l'insertion de la commande : " . $conn->error;

}



    }
}

$sql = "SELECT NROPIZZ, DESIGNPIZZ, TARIFPIZZ, PATHIMAGE FROM pizza";
$result = $conn->query($sql);

class Pizza
{
    private $id_pizza;
    private $nom_pizza;
    private $prix_pizza;
    private $path_image;

    public function __construct($id_pizza, $nom_pizza, $prix_pizza, $path_image)
    {
        $this->id_pizza = $id_pizza;
        $this->nom_pizza = $nom_pizza;
        $this->prix_pizza = $prix_pizza;
        $this->path_image = $path_image;
    }
}

$dataObjects = [];
while ($row = $result->fetch_assoc()) {
    $dataObjects[] = new Pizza($row['NROPIZZ'], $row['DESIGNPIZZ'], $row['TARIFPIZZ'], $row['PATHIMAGE']);

    echo "
        <form class='col-md-auto my-3' method='post' action=''>
          <div >
            <div class='card' style='width: 18rem;'>
                <img src=" . $row['PATHIMAGE'] . " class='card-img-top img-pizza' alt='...''>
            <div class='card-body'>
                <h5 class='card-title'>" . $row["DESIGNPIZZ"] . "</h5>
                <p><strong>Prix : </strong>" . $row['TARIFPIZZ'] . "</p>
                <input type='hidden' name='id_pizza[]' value='" . $row['NROPIZZ'] . "'>
                <div class='d-md-flex justify-content-md-end'>
                    <button type='submit' name='commander' class='btn btn-primary p-button'>Commander</button>
                </div>
            </div>
            </div>
          </div>
        </form>
    ";
}


$conn->close();
?>
