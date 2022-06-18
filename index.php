<?php

// Constantes de chemins
define( 'DS', DIRECTORY_SEPARATOR ); // Alias pratique pour écrire des chemins plus court
define( 'PATH_ROOT', __DIR__ . DS ); // Contiendra le chemin fichier absolu de la racine du projet


// Démarrage de la session
session_start();

//ouvre une nouvelle connexion au serveur MySQL.
$mysqli = mysqli_connect( 'database', 'lamp', 'lamp', 'lamp' );

require_once PATH_ROOT .'app'. DS .'router.php';

//Démarrage de l'application (c'est le router qui provoque la suite
routerStart();

mysqli_close( $mysqli );
