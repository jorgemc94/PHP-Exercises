<?php 
$mysqli = new mysqli("localhost", "root", "Jorg€94", "miranda");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare("INSERT INTO rooms (roomNumber, status, roomType, description, offer, price, discount, cancellation)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $roomNumber = $_POST['roomNumber'];
    $status = $_POST['status'];
    $roomType = $_POST['roomType'];
    $description = $_POST['description'];
    $offer = $_POST['offer'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $cancellation = $_POST['cancellation'];
    $stmt->bind_param('ssssddds', $roomNumber, $status, $roomType, $description, $offer, $price, $discount, $cancellation);
    $stmt->execute();
    $stmt->close();
}
?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?> 
    <h1>Room created!</h1>
    <h2>Name: <?= htmlspecialchars($_POST['roomType']) ?></h2>
    <ul>
        <li>Number: <?= htmlspecialchars($_POST['roomNumber']) ?></li>
        <li>Price: <?= htmlspecialchars($_POST['price']) ?></li>
        <li>Discount: <?= htmlspecialchars($_POST['discount']) ?></li>
    </ul>
<?php else: ?>
    <h1>New Room:</h1>
    <form method="POST">
        Number: <input type="number" min="0" name="roomNumber" required><br>
        Status: 
        <select name="status" required>
            <option value="available">available</option>
            <option value="booked">booked</option>
        </select><br>
        Name: <input type="text" name="roomType" required><br>
        Description: <input type="text" name="description" required><br>
        Offer: 
        <select name="offer" required>
            <option value="true">True</option>
            <option value="false">False</option>
        </select><br>
        Price: <input type="number" min="0" name="price" required><br>
        Discount: <input type="number" name="discount" required><br>
        Cancellation: <input type="text" name="cancellation" required><br>
        <input type="submit" value="Create Room">
    </form>
<?php endif ?>