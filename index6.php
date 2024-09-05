<?php

$mysqli = new mysqli("localhost", "root", "Jorg€94", "miranda");
if ($mysqli->connect_errno) {
    echo "Error al conectar con MySQL: " . $mysqli->connect_error;
    exit();
}

$foundRoom = null;

if (isset($_GET['id'])) {
    
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false) {
        $id = -1;
    }

    if ($id !== -1) {
        $sql = "SELECT * FROM rooms WHERE rooms._id = $id";
        $result = $mysqli->query($sql);
        if ($result && $result->num_rows > 0) {
            $foundRoom = $result->fetch_assoc();
        }
        $result->free();
    }
}

$mysqli->close();
?>

<?php if ($foundRoom): ?>
    <h1>Room: <?= htmlspecialchars($foundRoom['roomType']) ?></h1>
    <ul>
        <li>Name: <?= htmlspecialchars($foundRoom['roomType']) ?></li>
        <li>Number: <?= htmlspecialchars($foundRoom['roomNumber']) ?></li>
        <li>Price: <?= htmlspecialchars($foundRoom['price']) ?>$</li>
        <li>Discount: <?= htmlspecialchars($foundRoom['discount']) ?>%</li>
        <li>Price Discount: <?= htmlspecialchars($foundRoom['price'] - ($foundRoom['price'] * ($foundRoom['discount'] / 100))) ?>$</li>
    </ul>
<?php elseif (isset($_GET['id']) && $id !== -1): ?>
    <p>id not found</p>
<?php else: ?>
    <p>No room id provided.</p>
<?php endif; ?>
