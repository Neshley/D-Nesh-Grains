
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $product  = $_POST['product'];
    $quantity = $_POST['quantity'];


    $to      = "yourbusiness@email.com"; // replace with your email
    $subject = "New Cereal Order";
    $message = "You have a new order:\n\n" .
               "Name: $name\n" .
               "Email: $email\n" .
               "Product: $product\n" .
               "Quantity: $quantity\n";


    $headers = "From: $email";


    if (mail($to, $subject, $message, $headers)) {
        echo "Order placed successfully! We will contact you soon.";
    } else {
        echo "Sorry, there was a problem sending your order.";
    }
}
?>
```