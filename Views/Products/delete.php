<?php
/**
 * Created by Rick Dennison
 * Date:      12/10/23
 *
 * File Name: delete.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);
?>
<h1>Delete Product</h1>
<form action="/Products/<?= $product["id"] ?>/destroy" method="post">
    <p>Delete this product?</p>
    <button>Yes</button>
</form>
<p><a href="/products/<?= $product["id"] ?>/show">Cancel</a></p>
</body>
</html>
 
 