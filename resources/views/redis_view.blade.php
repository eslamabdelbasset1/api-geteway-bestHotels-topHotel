<!DOCTYPE html>
<html>
<head>
    <title>Hotels</title>
</head>
<body>
<h1>Best Hotels</h1>
<ul>
    @foreach ($bestHotels as $hotel)
        <li>
            Hotel Name: {{ $hotel['hotelName'] }} |
            Rate: {{ $hotel['rate'] }} |
            Hotel Fare: {{ $hotel['hotelFare'] }} |
            Room Amenities: {{ $hotel['roomAmenities'] }}
        </li>
    @endforeach
</ul>

<h1>Top Hotels</h1>
<ul>
    @foreach ($topHotels as $hotel)
        <li>
            Hotel Name: {{ $hotel['hotelName'] }} |
            Rate: {{ $hotel['rate'] }} |
            Price: {{ $hotel['price'] }} |
            Discount: {{ $hotel['discount'] }}
            Room Amenities: {{ $hotel['roomAmenities'] }}
        </li>
    @endforeach
</ul>
</body>
</html>
