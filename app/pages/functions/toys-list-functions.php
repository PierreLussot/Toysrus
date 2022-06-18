<?php

function toysListRender()
{
    $arr_toys = [];
    $html_title = 'jouet';
    if (!empty($_GET['brands']) and $_GET['brands'] !== 'brands') {
        $arr_toys = brandsToys();
    } else {
        $arr_toys = toysListDataGetAll();
    }

    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'top.html.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'toys-list.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'bottom.html.php';
}


/********************************************************************************** */
/*Requête qui va chercher toute les description des jouets*/
function toysListDataGetAll()
{
    global $mysqli;

    $result = [];

    $q = 'SELECT toys.id, toys.name ,toys.price,toys.image,brands.name as brand_name
    		FROM toys
    		JOIN brands ON brands.id = toys.brand_id';

    $q_result = mysqli_query($mysqli, $q);

    if ($q_result) {
        while ($toys = mysqli_fetch_assoc($q_result)) {
            $result[] = $toys;
        }
    }

    return $result;
}

/********************************************************************************** */

function brandsToys()
{

    if (!empty($_GET['brands'])) {
        global $mysqli;
        $q_prep = 'SELECT t.id,t.name,t.price,t.image,b.name
	from brands b
	join toys t on b.id = t.brand_id
	where b.name =? 
	';

        $arr_brands = [];

        if ($stmt = mysqli_prepare($mysqli, $q_prep)) {
            $brands = $_GET['brands'];

            if (mysqli_stmt_bind_param($stmt, 's', $brands)) {
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                mysqli_stmt_close($stmt);

                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr_brands[] = $row;
                    }


                };
            }
        }
        return $arr_brands;

    };
}
  