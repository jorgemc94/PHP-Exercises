<?php
$mysqli = new mysqli("localhost", "root", "Jorg€94", "miranda");
if ($mysqli->connect_errno) {
    echo "Error al conectar con MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = "SELECT * FROM rooms";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $sql .= " WHERE roomType LIKE '%$search%'";
}

$rooms = $mysqli->query($sql);

if (!$rooms) {
    echo "Error en la consulta: " . $mysqli->error;
    exit();
}
?>
    <h1>Rooms</h1>
    <form>
        <input type="text" name="search" placeholder="Search by name" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Search</button>
    </form>
    <?php if ($rooms->num_rows > 0): ?>
        <?php while ($room = $rooms->fetch_assoc()): ?>
            <ul>
                <li>Name: <?= htmlspecialchars($room['roomType']) ?></li>
                <li>Number: <?= htmlspecialchars($room['roomNumber']) ?></li>
                <li>Price: <?= htmlspecialchars($room['price']) ?>$</li>
                <li>Discount: <?= htmlspecialchars($room['discount']) ?>%</li>
                <li>Price Discount: <?= htmlspecialchars($room['price'] - ($room['price'] * ($room['discount'] / 100))) ?>$</li>
            </ul>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No rooms found.</p>
    <?php endif; ?>

    <?php
    $mysqli->close();
    ?>