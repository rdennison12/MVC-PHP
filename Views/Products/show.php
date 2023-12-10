<?php
/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: show.php
 * Project:   MVC-PHP-2023
 */
?>
<h1><?= $product["name"] ?></h1>
<p><?= $product["description"] ?></p>
<p><a href="/Products/<?= $product["id"] ?>/edit">Edit</a></p>
</body>
</html>