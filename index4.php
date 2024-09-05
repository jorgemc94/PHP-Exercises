<?php
if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false) {
        $id = -1;
    }

    if ($id !== -1) {
        $json = file_get_contents('./rooms.json');
        $rooms = json_decode($json, true);
        $foundRoom = null;
        
        foreach ($rooms as $room) {
            if ($room['id'] == $id) {
                $foundRoom = $room;
                break;
            }
        }
    } else {
        $foundRoom = null;
    }
} else {
    $foundRoom = null;
}
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
<?php elseif (isset($_GET['id'])): ?>
    <p>id not found</p>
<?php else: ?>
    <p>No room id provided.</p>
<?php endif; ?>