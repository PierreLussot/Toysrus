<?php

function detailsRender()
{
    $flag = true;

    $details = detailsToys();
    $magasin = stockToys();

    if (isset($_GET['store_du_select'])) {
        $storesStock = stockStores();
        if (!$storesStock && $_GET['store_du_select'] !== 'stores') {
            $flag = false;
        }

    }

    if (!$details || !$magasin || !$flag) {
        require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'e404.php';
    } else {
        require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'top.html.php';
        require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'details.php';
        require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'bottom.html.php';
    }
}

/*Requête qui va chercher tous les jouets*/

function detailsDataGetAll()
{
    global $mysqli;
    $result = [];
    $q = 'SELECT * from toys';
    $q_result = mysqli_query($mysqli, $q);
    if ($q_result) {
        while ($toys = mysqli_fetch_assoc($q_result)) {
            $result[] = $toys;
        }
    }

    return $result;

}

;

/*Requête qui va chercher les jouets par marque */
function detailsToys()
{
    if (!empty($_GET['id'])) {
        global $mysqli;
        $q_prep = 'select toys.*, b.name as marque
	from toys
	join brands b on toys.brand_id = b.id
	where toys.id=?
	';
        $arr_details = [];

        if ($stmt = mysqli_prepare($mysqli, $q_prep)) {
            $detailToys = $_GET['id'];

            if (mysqli_stmt_bind_param($stmt, 'i', $detailToys)) {
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                mysqli_stmt_close($stmt);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr_details[] = $row;
                    }
                };
            }
        }
        return $arr_details;
    };
}

/* Requête qui va chercher tous les stocks des jouets */
function stockToys()
{

    if (!empty($_GET['id'])) {
        global $mysqli;
        $q_prep = 'select stores.name,stores.postal_code,stores.city,stock.quantity,toys.id as toysId
		from stores
		join stock on stores.id = stock.store_id
		join toys on toys.id = stock.toy_id
		where toys.id=?
		';

        $arr_brands = [];

        if ($stmt = mysqli_prepare($mysqli, $q_prep)) {
            $toysid = $_GET['id'];

            if (mysqli_stmt_bind_param($stmt, 'i', $toysid)) {
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

/*Requête qui va chercher tous les stocks par magasin et leur stock*/
function stockStores()
{

    if (!empty($_GET['id'])) {
        global $mysqli;
        $q_prep =
            'select stores.name,stores.postal_code,stores.city,stock.quantity
  from stores
  join stock on stores.id = stock.store_id
  join toys on toys.id = stock.toy_id
  where toys.id=? and stores.name =?';

        $arr_brands = [];

        if ($stmt = mysqli_prepare($mysqli, $q_prep)) {
            $toysid = $_GET['id'];
            $storesStock = $_GET['store_du_select'];

            if (mysqli_stmt_bind_param($stmt, 'is', $toysid, $storesStock)) {
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