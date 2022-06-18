<main class="details">
    <h2><?php echo $details[0]['name']; ?></h2>
    <div class="containerDetailsGeneral">
        <div class="containeLogPrDes">
            <div class="detailLogoPrice">
                <img src="../../image/<?php echo $details[0]['image']; ?>" alt="">
                <p class="detailsPrice"><?php echo $details[0]['price']; ?>€</p>

                <form action="/toys">
                    <select name="store_du_select">
                        <option value="stores">quelle magasin ?</option>

                        /* boucle qui calcule le stock général du jouet*/
                        <?php $a = 0 ?>
                        <?php foreach ($magasin as $store) { ?>
                            <option value="<?php echo $store['name'] ?>">
                                <?php $a += $store['quantity']
                                ?>
                                <?php echo $store['name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $magasin[0]['toysId'] ?>">
                    <input type="submit">

                </form>

                <p><strong>stock :
                        <?php if (isset($_GET['store_du_select']) && $_GET['store_du_select'] !== 'stores') {
                            echo $storesStock[0]['quantity'];

                        } else {
                            echo $a;
                        }
                        ?> </strong></p>

            </div>
            <div class="descriptionDetails">
                <p><strong><span>Marque :</span> <?php echo $details[0]['marque']; ?></strong></p>
                <p><?php echo $details[0]['description']; ?></p>
            </div>
        </div>
    </div>
</main>