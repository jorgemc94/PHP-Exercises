<?php
    $mysqli = new mysqli("localhost","root","Jorg€94","miranda");
    if ($mysqli->connect_errno) {
        echo "Error al conectar con MySQL: " . $mysqli->connect_error;
        exit();
    }
    
    $sql = "SELECT * FROM rooms"; 
    $rooms = $mysqli->query($sql);

    if (!$rooms) {
        echo "Error en la consulta: " . $mysqli->error;
        exit();
    }
?>

<h1>Rooms</h1>

<?php foreach ($rooms as $room): ?>
    <ul>
        <li>Name: <?= htmlspecialchars($room['roomType']) ?></li>
        <li>Number: <?= htmlspecialchars($room['roomNumber']) ?></li>
        <li>Price: <?= htmlspecialchars($room['price']) ?>$</li>
        <li>Discount: <?= htmlspecialchars($room['discount']) ?>%</li>
        <li>Price Discount: <?= htmlspecialchars($room['price'] - ($room['price'] * ($room['discount'] / 100))) ?>$</li>
    </ul>
<?php endforeach; ?>

<?php
    $mysqli->close();
?>