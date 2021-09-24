<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 3;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM brands ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_brands = $pdo->query('SELECT COUNT(*) FROM brands')->fetchColumn();

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM models ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$models = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_models = $pdo->query('SELECT COUNT(*) FROM models')->fetchColumn();

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM sizes ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_sizes = $pdo->query('SELECT COUNT(*) FROM sizes')->fetchColumn();

?>

<?=template_header('Read')?>

<div class="content read">
	<h2></h2>
	<a href="create.php" class="create-contact">Create New Brand</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Brands</td>
                <td>Models</td>
                <td>Sizes</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brands as $brand): ?>

            <?php foreach ($models as $model): ?>

            <?php foreach ($sizes as $size): ?>
            <tr>
                <td><?=$brand['id']?></td>

                <td><?=$brand['name']?></td>

                <td><?=$model['name']?></td>

                <td><?=$size['name']?></td>

                <td class="actions">
                    <a href="update.php?id=<?=$brand['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$brand['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>

        <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>

    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_brands  ): ?>
        
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
        
	</div>
</div>

<?=template_footer()?>