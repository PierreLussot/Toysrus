<?php
/*Requête qui va chercher toute les marques des jouets pour le menu*/
function menuHeader()
{

    //connection bd
    global $mysqli;
    //possible stockage de données
    $result = [];
    //selection dans la bd
    $q = 'SELECT name from brands';
    // Exécute une requête sur la base de données
    $q_result = mysqli_query($mysqli, $q);
    if ($q_result) {

        //mysqli_fetch_assoc(...)Lit une ligne de résultat MySQL dans un tableau associatif
        while ($toys = mysqli_fetch_assoc($q_result)) {


            //push les lignes de résultat MySQL
            $result[] = $toys;
        }
    }

    return $result;

}

;

