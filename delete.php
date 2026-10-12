<?php
// delete.php - deletes a record from grocery_items
require 'dbconfig.php';

// Delete the record that was inserted in insert.php (item_id = 111)
$sql = "DELETE FROM grocery_items WHERE item_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([111]);

echo "<pre>";
echo "Rows deleted: " . $stmt->rowCount() . "\n";

// Confirm that the record no longer exists
$check = $pdo->prepare("SELECT COUNT(*) AS remaining FROM grocery_items WHERE item_id = ?");
$check->execute([111]);
echo "Records with item_id 111 remaining: " . $check->fetch()['remaining'] . "\n";
echo "</pre>";
?>
