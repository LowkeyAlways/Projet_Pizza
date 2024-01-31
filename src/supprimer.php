<?php 
require_once('../src/commande.inc.php');

if (isset($_POST['nrocmde'])) {
    $nrocmde = $_POST['nrocmde'];

    // Supprimer d'abord les enregistrements liés dans la table "lister"
    $sqlDeleteLister = "DELETE FROM lister WHERE NROCMDE = $nrocmde";
    $resultDeleteLister = $conn->query($sqlDeleteLister);

    if ($resultDeleteLister) {
        // Ensuite, supprimer la commande elle-même
        $sqlDeleteCommande = "DELETE FROM commande WHERE NROCMDE = $nrocmde";
        $resultDeleteCommande = $conn->query($sqlDeleteCommande);

        if ($resultDeleteCommande) {
            header("Location:../pages/commandes.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la commande : " . $conn->error;
        }
    } else {
        echo "Erreur lors de la suppression des enregistrements liés : " . $conn->error;
    }
}