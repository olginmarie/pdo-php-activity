<?php
// insert.php - inserts a new record into grocery_items
require 'dbconfig.php';

// Prepared statement with placeholders protects against SQL injection
$sql = "INSERT INTO grocery_items
        (item_name, brand_name, category, package_size, price_idr, stock_quantity, expiry_date)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Execute with the values of the new record
$stmt->execute(['Indomie Mi Goreng Ayam Geprek', 'Indomie', 'Instant Noodles', '85 g', 3900, 120, '2027-08-15']);

// rowCount() tells how many rows were affected, lastInsertId() gives the new ID
echo "<pre>";
echo "Rows inserted: " . $stmt->rowCount() . "\n";
echo "New item_id: " . $pdo->lastInsertId() . "\n\n";

// Show the newly inserted record
$check = $pdo->prepare("SELECT * FROM grocery_items WHERE item_id = ?");
$check->execute([$pdo->lastInsertId()]);
print_r($check->fetch());
echo "</pre>";
?>
