<div class="container">
    <h1>top 3</h1>

    <?php if (count($arr_toys) <= 0): ?>
        <div>Aucune jouets en ce moment</div>
    <?php else: ?>
        <div class="card">
            <ul>
                <?php foreach ($arr_toys as $toys): ?>
                    <li>
                        <a href="/toys?id=<?php echo $toys['id'] ?>">

                            <img src="../../image/<?php echo $toys['image'] ?> " alt="">
                            <h2><?php echo $toys['name'] ?></h2>
                            <p><?php echo $toys['price'] ?>€</p>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

</div>