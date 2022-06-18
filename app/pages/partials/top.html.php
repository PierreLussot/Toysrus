<?php
require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'functions' . DS . 'top-fonctions.php';
$arr_header = menuHeader();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - ToysRUs.fr</title>
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../style-detail.css">
</head>
<div class="container">
    <body>
    <nav>
        <ul>
            <li>
                <a href="/jouet"> tous les jouets </a>
            </li>
            <div class="line"></div>
            <li><span>par marque</span>

                <ul>
                    <?php foreach ($arr_header as $brands) { ?>
                        <li>
                            <a href="/jouet?brands=<?php echo $brands['name'] ?>"><?php echo $brands['name'] ?> </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <div class="line"></div>
        </ul>
    </nav>
</div>