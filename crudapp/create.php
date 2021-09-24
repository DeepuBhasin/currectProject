<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?)');
    $stmt->execute([$id, $name, $email]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?= template_header('Create') ?>

<div class="content update">
    <h2>Create New Brand</h2>

    <form action="create.php" method="post">
        <label for="id">Brand</label>
        <input type="text" name="id" placeholder="Brand name.." id="id">
        <label for="name">Model</label>
        <input type="text" name="name" placeholder="Model name.." id="name">
        <label for="email">Size</label>
        <input type="text" name="phone" placeholder="Size name.." id="phone">
        <input type="submit" value="Create">
    </form>

    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>