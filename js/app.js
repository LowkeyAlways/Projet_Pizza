
// Sélectionner tous les éléments avec la classe "boutonCommande"
let boutonsCommande = document.querySelectorAll(".p-button");

// Ajouter un gestionnaire d'événements pour chaque bouton
boutonsCommande.forEach(function(bouton) {
    bouton.addEventListener("click", function () {
        // Afficher un message dans une boîte de dialogue (popup)
        alert("Commande effectuée!");
    });

});