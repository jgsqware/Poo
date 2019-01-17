# Cours POO - Framework

## Comment lancer l'application

1. Demarrer une base de donnee `mysql`. *vous devriez l'avoir vu l'annee passee*

2. Connecter l'application a la base de donnee
    
    Modifier la ligne 7 du fichier [2.Procedural-splitted/helpers/mysql.php](./2.Procedural-splitted/helpers/mysql.php) avec les infos de connexion de votre base de donnee.


    ```php 
    $link = mysqli_connect('127.0.0.1', 'user', 'pwd', 'db');
    ```

3. Ouvrez un terminal pour lancer l'application

    - Windows: 
        - Ouvrez l'application `Powershell`
        - Deplacer vous dans le dossier ou se trouve le projet avec `cd my\project\path
        - Lancer l'application avec `php index.php`

    - OSX - Linux
        - Ouvrez l'application `Terminal`
        - Deplacer vous dans le dossier ou se trouve le projet avec `cd my/project/path
        - Lancer l'application avec `php index.php`

> Si vous avez le moindre soucis pour demarrer l'application, envoyer moi un message sur slack our par email.

## Exercice 2: Changer mon produit en Oriente-Objet

Dans le dossier [2.Procedural-splitted](./2.Procedural-splitted), vous trouverez une petite application permettant de:

1. Lister des produits
2. Ajouter des produits dans une base de donnees

Le but de l'exercice est:

> Transformer les variables faisant reference au produit, en une **Classe Product**, et remplacer toutes les occurences par des instances de votre classe produit 

