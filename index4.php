<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $json = file_get_contents('./rooms.json');
    $rooms = json_decode($json, true);
    $foundRoom = null;
    foreach ($rooms as $room) {
        if ($room['id'] == $id) {
            $foundRoom = $room;
            break;
        }
    }
}
?>

<?php if (isset($foundRoom) && $foundRoom): ?>
    <h1>Room: <?= htmlspecialchars($foundRoom['roomType']) ?></h1>
    <ul>
        <li>Name: <?= htmlspecialchars($foundRoom['roomType']) ?></li>
        <li>Number: <?= htmlspecialchars($foundRoom['roomNumber']) ?></li>
        <li>Price: <?= htmlspecialchars($foundRoom['price']) ?>$</li>
        <li>Discount: <?= htmlspecialchars($foundRoom['discount']) ?>%</li>
        <li>Price Discount: <?= htmlspecialchars($room['price'] - ($room['price'] * ($room['discount'] / 100))) ?>$</li>
    </ul>
<?php elseif (isset($id)): ?>
    <p>id not found</p>
<?php else: ?>
    <p>No room id provided.</p>
<?php endif; ?>

