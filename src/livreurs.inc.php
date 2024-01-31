<?php
$servername = "localhost";
$username = "andy";
$password = "";
$database = "pizzabox";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully <br>";


$sql = "SELECT NROLIVR, NOMLIVR, PRENOMLIVR, DATEEMBAUCHLIVR, PATHIMAGE FROM livreur";
$result = $conn->query($sql);

class Livreur
{
    // properties
    private $id_livreur;
    private $nom_livreur;
    private $prenom_livreur;
    private $date_embauche_livreur;
    private $path_image;

    // methods
    public function __construct($id_livreur, $nom_livreur, $prenom_livreur, $date_embauche_livreur, $path_image)
    {
        $this->id_livreur= $id_livreur;
        $this->nom_livreur = $nom_livreur;
        $this->prenom_livreur = $prenom_livreur;
        $this->date_embauche_livreur = $date_embauche_livreur;
        $this->path_image = $path_image;
    }
}

$dataObjects = [];
while ($row = $result->fetch_assoc()) {
    $dataObjects[] = new Livreur($row['NROLIVR'], $row['NOMLIVR'], $row['PRENOMLIVR'], $row['DATEEMBAUCHLIVR'], $row['PATHIMAGE']);

        echo"
          <div class='col-md-auto my-3'>
            <div class='card' style='width: 18rem;'>
                <img src=" . $row['PATHIMAGE']. " class='card-img-top img-pizza' alt='...''>
            <div class='card-body'>
                <h5 class='card-title'>" . $row["PRENOMLIVR"]. " " . $row["NOMLIVR"]. "</h5>
                <p><strong>Date d'embauche : </strong>" .$row['DATEEMBAUCHLIVR']. "</p>
            </div>
            </div>
          </div>
        ";
}



// Close the database connection
$conn->close();
?>