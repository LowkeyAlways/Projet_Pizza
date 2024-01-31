<?php
require_once('../src/commande.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nrocmde'], $_POST['livreur'])) {
        $nrocmde = $_POST['nrocmde'];
        $livreurId = $_POST['livreur'];

        // Mettre à jour la commande avec le nouveau livreur choisi
        $sqlUpdateCommande = "UPDATE commande SET NROLIVR = $livreurId WHERE NROCMDE = $nrocmde";
        $resultUpdateCommande = $conn->query($sqlUpdateCommande);

        if ($resultUpdateCommande) {
            echo "Le livreur a été mis à jour avec succès pour la commande N° $nrocmde.";
        } else {
            echo "Erreur lors de la mise à jour du livreur pour la commande : " . $conn->error;
        }
    } else {
        echo "Paramètres manquants dans la requête.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
