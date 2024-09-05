
<h1>Rooms</h1>

@foreach ($rooms as $room)
    <ul>
        <li>Name: {{ htmlspecialchars($room['roomType']) }}</li>
        <li>Number: {{ htmlspecialchars($room['roomNumber']) }}</li>
        <li>Price: {{ htmlspecialchars($room['price']) }}$</li>
        <li>Discount: {{ htmlspecialchars($room['discount']) }}%</li>
        <li>Price Discount: {{ htmlspecialchars($room['price'] - ($room['price'] * ($room['discount'] / 100))) }}$</li>
    </ul>
@endforeach
