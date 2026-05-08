<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $car_brand = $_POST['car_brand'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $query = "INSERT INTO spare_parts (name, category, car_brand, quantity, price, supplier)
              VALUES ('$name', '$category', '$car_brand', '$quantity', '$price', '$supplier')";

    mysqli_query($conn, $query);

    echo "Το ανταλλακτικό προστέθηκε!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Προσθήκη Ανταλλακτικού</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Προσθήκη Ανταλλακτικού</h2>

<form method="POST">
    <label>Όνομα:</label>
    <input type="text" name="name"><br><br>

    <label>Κατηγορία:</label>
    <input type="text" name="category"><br><br>

    <label>Μάρκα:</label>
    <input type="text" name="car_brand"><br><br>

    <label>Ποσότητα:</label>
    <input type="number" name="quantity"><br><br>

    <label>Τιμή:</label>
    <input type="number" step="0.01" name="price"><br><br>

    <label>Προμηθευτής:</label>
    <input type="text" name="supplier"><br><br>

    <input type="submit" value="Καταχώρηση">
</form>

</div>
</body>
</html>

