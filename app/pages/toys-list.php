<div class="container">
    <h1>les jouets</h1>

    <form action="/jouet">
        <select name="brands">

            <option value="brands">quelle marque</option>
            <?php foreach ($arr_header as $brands) { ?>
                <option value="<?php echo $brands['name'] ?>">

                    <?php echo $brands['name'] ?></option>
            <?php } ?>
        </select>
        <input type="submit">
    </form>

    <?php if (count($arr_toys) <= 0): ?>
        <div>Aucune jouets en ce moment</div>


    <?php else: ?>
        <div class="card">
            <ul>
                <?php foreach ($arr_toys as $toys): ?>
                    <li>
                        <a href="/toys?id=<?= $toys['id'] ?>">

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