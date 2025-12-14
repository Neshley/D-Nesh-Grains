```php
<?php
session_start();
if ($_SESSION['role'] !== 'admin') { exit("Access denied"); }


$conn = new mysqli("localhost", "root", "", "cereal_business");
$result = $conn->query("SELECT id, name, email, product, quantity FROM orders");


echo "<h2>Orders</h2>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Product</th><th>Quantity</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['product']}</td><td>{$row['quantity']}</td></tr>";
}
echo "</table>";
$conn->close();
?>
```