```php
<?php
session_start();
if ($_SESSION['role'] !== 'admin') { exit("Access denied"); }


$conn = new mysqli("localhost", "root", "", "cereal_business");
$result = $conn->query("SELECT id, username, email, role FROM users");


echo "<h2>User List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['role']}</td></tr>";
}
echo "</table>";
$conn->close();
?>
```