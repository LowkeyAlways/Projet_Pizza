# Pizza du Chef

## Description
Pizza du Chef est un système de commande en ligne pour une pizzeria. Il permet aux utilisateurs de parcourir le menu, de choisir leurs pizzas préférées, et de passer des commandes. Le système enregistre les commandes dans une base de données et permet aux gestionnaires de visualiser et de gérer les commandes.

## Fonctionnalités

- **Affichage du Menu :** Affichez la liste des pizzas disponibles avec leurs images, noms et prix.
- **Passer une Commande :** Permettez aux utilisateurs de sélectionner des pizzas et de passer des commandes.
- **Gestion des Commandes :** Enregistrez les commandes dans une base de données et permettez aux gestionnaires de les visualiser.
- **Choix du Livreur :** Permettez aux gestionnaires de choisir un livreur pour chaque commande.

## Structure du Projet

- `index.php` : Page principale affichant le menu et permettant de passer des commandes.
- `commande.inc.php` : Logique PHP pour gérer l'ajout de commandes dans la base de données.
- `livreurs.php` : Page affichant la liste des livreurs.
- `update_livreur.php` : Logique PHP pour mettre à jour le livreur d'une commande.
- `supprimer.php` : Logique PHP pour supprimer une commande.
- `pizza.php` : Logique PHP pour ajouter une commande.
- `css/` : Dossier contenant les fichiers CSS pour la mise en page.
- `js/` : Dossier contenant les fichiers JavaScript pour l'interaction côté client.
- `assets/` : Dossier contenant les images et autres fichiers statiques.


## Configuration

1. Importez la base de données `pizzabox.sql` dans votre serveur MySQL.
2. Modifiez les informations de connexion à la base de données.

## Utilisation

1. Accédez à `index.php` dans votre navigateur.
2. Parcourez le menu, ajoutez des pizzas à votre panier et passez votre commande.
3. Consultez les commandes dans la section appropriée et attribuez un livreur.
