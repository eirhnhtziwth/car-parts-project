<?php
include 'db.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM spare_parts
              WHERE name LIKE '%$search%'
              OR category LIKE '%$search%'
              OR car_brand LIKE '%$search%'";
} else {
    $query = "SELECT * FROM spare_parts";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Προβολή Ανταλλακτικών</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Λίστα Ανταλλακτικών</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Αναζήτηση..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Όνομα</th>
        <th>Κατηγορία</th>
        <th>Μάρκα</th>
        <th>Ποσότητα</th>
        <th>Τιμή</th>
        <th>Προμηθευτής</th>
        <th>Ενέργεια</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['car_brand']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['supplier']."</td>";
       echo "<td><a href='delete_part.php?id=".$row['id']."' onclick=\"return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το ανταλλακτικό;')\">Διαγραφή</a></td>";
        echo "</tr>";
    }
    ?>

</table>

</div>

</body>
</html>