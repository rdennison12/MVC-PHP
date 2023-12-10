<?php
/**
 * Created by Rick Dennison
 * Date:      12/10/23
 *
 * File Name: form.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);
 ?>
<label for="name">Name</label>
<input type="text" id="name" name="name" value="<?= $product["name"] ?? "" ?>">
<?php if (isset($errors["name"])): ?>
    <p><?= $errors["name"] ?></p>
<?php endif; ?>

<label for="description">Description</label>
<textarea id="description" name="description"><?= $product["description"] ?? "" ?></textarea>
<button>Save</button>
 