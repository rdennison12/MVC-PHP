<?php
/**
 * Created by Rick Dennison
 * Date:      12/8/23
 *
 * File Name: new.php
 * Project:   MVC-PHP-2023
 *
 */
declare(strict_types=1);
?>

<h1>New Product</h1>

<form method="post" action="/Products/create">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <?php if (isset($errors["name"])): ?>
        <p><?= $errors["name"] ?></p>
    <?php endif; ?>

    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>
    <button>Save</button>
</form>

</body>
</html>