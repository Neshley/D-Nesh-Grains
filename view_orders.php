<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';

$sql = "SELECT * FROM orders ORDER BY orderDate DESC";
$result = $conn->query($sql);

echo "<h1>Customer Orders</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Produce</th><th>Quantity</th><th>Delivery Date</th><th>Location</th><th>Notes</th><th>Order Date</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['customerName']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['email']}</td>
            <td>{$row['produce']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['deliveryDate']}</td>
            <td>{$row['location']}</td>
            <td>{$row['notes']}</td>
            <td>{$row['orderDate']}</td>
          </tr>";
}
echo "</table>";

$conn->close();
?>
