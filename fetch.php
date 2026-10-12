<?php
// fetch.php - demonstrates PDOStatement::fetch()
require 'dbconfig.php';

// Prepare a query that looks for one item by its ID
$stmt = $pdo->prepare("SELECT * FROM grocery_items WHERE item_id = ?");
$stmt->execute([1]);

// fetch() returns only ONE row (the next row in the result set)
$item = $stmt->fetch();

// <pre> keeps the print_r() output readable
echo "<pre>";
print_r($item);
echo "</pre>";
?>
