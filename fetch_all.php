<?php
// fetch_all.php - demonstrates PDOStatement::fetchAll()
require 'dbconfig.php';

// Prepare and run a query for the first 5 beverages
$stmt = $pdo->prepare("SELECT item_id, item_name, brand_name, price_idr
                       FROM grocery_items
                       WHERE category = ?
                       ORDER BY item_id
                       LIMIT 5");
$stmt->execute(['Beverages']);

// fetchAll() returns ALL matching rows at once as an array of arrays
$items = $stmt->fetchAll();

// <pre> keeps the print_r() output readable
echo "<pre>";
print_r($items);
echo "</pre>";
?>
