<?php
/**
 * Created by Rick Dennison
 * Date:      12/10/23
 *
 * File Name: edit.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);
?>

<h1>Edit Product</h1>
<form action="/Products/<?= $product["id"] ?>/update" method="post">
    <?php require "form.php" ?>
</form>
<p><a href="/products/<?= $product["id"] ?>/show">Cancel</a></p>
</body>
</html>