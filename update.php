<?php
// update.php - updates an existing record in grocery_items
require 'dbconfig.php';

// Raise the price and change the stock of the item with item_id = 1
$sql = "UPDATE grocery_items SET price_idr = ?, stock_quantity = ? WHERE item_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([3700, 150, 1]);

echo "<pre>";
echo "Rows updated: " . $stmt->rowCount() . "\n\n";

// Show the record after the update
$check = $pdo->prepare("SELECT item_id, item_name, price_idr, stock_quantity FROM grocery_items WHERE item_id = ?");
$check->execute([1]);
print_r($check->fetch());
echo "</pre>";
?>
