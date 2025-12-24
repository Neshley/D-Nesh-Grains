<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];
    $produce      = $_POST['produce'];
    $quantity     = $_POST['quantity'];
    $deliveryDate = $_POST['deliveryDate'];
    $location     = $_POST['location'];
    $notes        = $_POST['notes'];

    $sql = "INSERT INTO orders (customerName, phone, email, produce, quantity, deliveryDate, location, notes) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisss", $customerName, $phone, $email, $produce, $quantity, $deliveryDate, $location, $notes);

    if ($stmt->execute()) {
        echo "<h2>Order placed successfully!</h2>";
        echo "<p>Thank you, $customerName. We’ll deliver your $produce order on $deliveryDate.</p>";
        echo "<a href='Orders.html'>Place another order</a> | <a href='index.php'>Go to Home page</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
