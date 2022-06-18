<?php

function homeRender()
{
    $html_title = 'Accueil';
    $arr_toys = toysListDataGetAll();

    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'top.html.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'home.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'bottom.html.php';
}

/*Requête qui va chercher le top 3 des ventes*/

function toysListDataGetAll()
{
    global $mysqli;
    $result = [];

    $q = 'SELECT  t.id,t.price,t.image,t.name ,SUM(s.quantity) as quantiter
	FROM toys t
	left join sales s on t.id = s.toy_id
	where  year(s.date_sold) = 2019
	group by t.id order by quantiter desc limit 3';

    $q_result = mysqli_query($mysqli, $q);

    if ($q_result) {
        while ($toys = mysqli_fetch_assoc($q_result)) {
            $result[] = $toys;
        }
    }
    return $result;
}