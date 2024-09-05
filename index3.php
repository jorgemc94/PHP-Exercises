<?php
    $json = file_get_contents('./rooms.json');
    $rooms = json_decode($json, true);
?>

<ol>
    <?php foreach ($rooms as $room): ?>
        <li><?= $room['name'] ?></li>
        <ul>
            <li>Number: <?= $room['roomNumber'] ?></li>
            <li>Price: <?= $room['price'] ?>$</li>
            <li>Discount: <?= $room['discount'] ?>%</li>
            <li>Price Discount: <?= htmlspecialchars($room['price'] - ($room['price'] * ($room['discount'] / 100))) ?>$</li>
        </ul>
    <?php endforeach; ?>
</ol>
