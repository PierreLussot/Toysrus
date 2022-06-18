<?php

function routerStart(): void
{
    // Si 'REDIRECT_URL' n'existe pas on met la valeur '/'
    // chercher le mot 'Null coalescent' dans https://www.php.net/manual/fr/migration70.new-features.php
    $route = $_SERVER['REDIRECT_URL'] ?? '/';

    switch ($route) {
        case '/':
            require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'functions' . DS . 'home-functions.php';
            homeRender();
            break;

        case '/jouet':
            require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'functions' . DS . 'toys-list-functions.php';
            toysListRender();
            break;

        case '/toys':
            require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'functions' . DS . 'details-functions.php';
            detailsRender();
            break;
        default:
            http_response_code(404);
            echo '404 - Not Found ';
            break;
    }
}
