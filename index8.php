<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?> 
    <h1>Room created!</h1>
    <h2>Name: <?= $_POST['roomType'] ?></h2>
    <ul>
        <li>Number: <?= $_POST['roomNumber'] ?></li>
        <li>Price: <?= $_POST['rate'] ?></li>
        <li>Discount: <?= $_POST['discount'] ?></li>
    </ul>
<?php else: ?>
    <h1>New Room:</h1>
    <form method="POST">
        Number: <input type="number" min="0" name="roomNumber"><br>
        Availability: <select><option value="available">available</option><option value="booked">booked</option></select><br>
        Name: <input type="text" name="roomType"><br>
        Description: <input type="text" name="description"><br>
        Offer: <select><option value="true">True</option><option value="false">False</option></select><br>
        Price: <input type="number" min="0" name="price"><br>
        Discount: <input type="number" name="discount"><br>
        Amenities: 
        <input type="checkbox" name="amenities[]" value="WiFi"> WiFi
        <input type="checkbox" name="amenities[]" value="TV"> TV
        <input type="checkbox" name="amenities[]" value="Air Conditioning"> Air Conditioning<br>
        Photos: 
        <input type="text" name="photosArray[]" multiple><br>
        <input type="submit">
    </form>
<?php endif ?>