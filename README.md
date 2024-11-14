# Gestion de Restaurant - Ressine

Une application de gestion de restaurant développée avec Laravel, Filament, Breeze, ShoppingCart, et Stripe. Elle
permet aux clients de commander en ligne, de suivre leurs commandes, et de donner des avis sur les plats. Les chefs,
livreurs, et administrateurs ont également leurs propres interfaces de gestion.

## Fonctionnalités

### Pour les Clients :

- **Authentification** :  
  Les clients peuvent s'inscrire ou se connecter avec les informations nécessaires.

- **Découverte du menu** :  
  Les clients peuvent explorer les plats disponibles par catégorie.

- **Gestion du panier** :  
  Ajouter, modifier, ou supprimer des plats dans le panier et confirmer les commandes.

- **Choix du mode de paiement** :  
  En ligne via Stripe ou en espèces à la livraison.

- **Suivi des commandes** :  
  Les clients peuvent voir l'état de leurs commandes à travers un tableau de bord.

- **Rédaction de témoignages** :  
  Rédiger des témoignages qui seront affichés après validation de l'administrateur.

- **Évaluation des plats** :  
  Donner des étoiles aux plats, une seule fois par plat.

- **Gestion du profil** :  
  Modifier les informations du profil et récupérer le mot de passe.

### Pour les Chefs :

- **Authentification** :  
  Connexion dédiée pour les chefs.

- **Gestion des commandes** :  
  Voir et modifier l'état des commandes (en attente, en préparation, préparée).

- **Suivi des statistiques** :  
  Suivre les commandes totales, celles préparées par le chef, et celles en attente.

### Pour les Livreurs :

- **Authentification** :  
  Connexion dédiée pour les livreurs.

- **Gestion des factures** :  
  Voir et modifier l'état des factures (en attente, en livraison, livrée).

- **Suivi des statistiques** :  
  Suivre les factures en attente et celles livrées par le livreur.

### Pour les Administrateurs :

- **Gestion des informations de l'application** :  
  Modifier les informations générales de l'application.

- **Gestion des services, catégories, plats, chefs, et livreurs** :  
  Ajouter, modifier, ou supprimer des services, catégories, plats, chefs, et livreurs.

- **Validation des témoignages** :  
  Changer l'état des témoignages avant leur affichage.

- **Suivi des métriques du restaurant** :  
  Voir le nombre de clients, de commandes, et les montants totaux.

## Technologies Utilisées

- **Backend** : Laravel 11.9
- **Frontend** : Filament / Blade
- **Authentification** : Breeze
- **Panier** : ShoppingCart
- **Paiement** : Stripe

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/kishyassin/ressine

2. Installez les dépendances :

    ```bash
    composer install
    npm install


3. Configurez votre fichier .env et générez la clé de l'application :

   ```bash
    cp .env.example .env
    php artisan key:generate

4. Exécutez les migrations :

    ```bash
    php artisan migrate
    
5. Implement ShoppingCart :
   from anayarojo/shoppingcart

    ```bash
    composer require anayarojo/shoppingcart

    php artisan vendor:publish --provider="Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"

    
6. Démarrez le serveur de développement :

   ```bash
    php artisan serve
    npm run dev

7. Pour tester l'affichage avec des données réelles, insérez dans la base de données le script contenu dans le fichier
   `data.sql`.

## Contribution

Les contributions sont les bienvenues. Pour soumettre des modifications, merci de faire un fork du projet, de créer une
branche, et de soumettre une pull request.

## Licence

Ce projet est sous licence MIT.





