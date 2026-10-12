<?php
// display_table.php - renders an SQL result set on an HTML table
require 'dbconfig.php';

// Query: items under 10,000 IDR, cheapest first, with a total per category
$stmt = $pdo->query("SELECT item_id, item_name, brand_name, category, package_size, price_idr, stock_quantity
                     FROM grocery_items
                     WHERE price_idr < 10000
                     ORDER BY price_idr ASC, item_name ASC
                     LIMIT 10");
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Indonesian Grocery Items</title>
    <style>
        table { border-collapse: collapse; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #444; padding: 6px 10px; }
        th { background: #d9534f; color: #fff; }
    </style>
</head>
<body>
    <h2>Indonesian Grocery Items (under IDR 10,000)</h2>
    <table>
        <tr>
            <th>ID</th><th>Item Name</th><th>Brand</th><th>Category</th>
            <th>Size</th><th>Price (IDR)</th><th>Stock</th>
        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <!-- htmlspecialchars() prevents HTML injection -->
            <td><?= htmlspecialchars($row['item_id']) ?></td>
            <td><?= htmlspecialchars($row['item_name']) ?></td>
            <td><?= htmlspecialchars($row['brand_name']) ?></td>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td><?= htmlspecialchars($row['package_size']) ?></td>
            <td><?= number_format($row['price_idr'], 2) ?></td>
            <td><?= htmlspecialchars($row['stock_quantity']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
