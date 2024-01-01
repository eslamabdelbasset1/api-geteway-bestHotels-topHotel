<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!-- resources/views/reservations/create.blade.php -->
<form action="{{ route('reservation.create') }}" method="POST">
    @csrf

    <label for="check_in">Check-in Date:</label>
    <input type="date" id="check_in" name="check_in" required>

    <label for="check_out">Check-out Date:</label>
    <input type="date" id="check_out" name="check_out" required>

    <label for="best_hotel_id">Select Hotel:</label>
    <select id="best_hotel_id" name="best_hotel_id" required>
        @foreach($best_data as $best)
            <option value="{{$best->id}}">{{$best->hotelName}}</option>
        @endforeach
    </select>

    <!-- Add other form fields as needed -->

    <button type="submit">Book Now</button>
</form>

<h1>Best List</h1>

<table>
    <thead>
    <tr>
        <th>Hotel Name</th>
        <th>rate</th>
        <th>Hotel Fare</th>
        <th>Room Amenities</th>
    </tr>
    </thead>
    <tbody>
    @foreach($best_data as $best)
        <tr>
            <td>{{ $best->hotelName }}</td>
            <td>{{ $best->rate }}</td>
            <td>{{ $best->hotelFare }}</td>
            <td>{{ $best->roomAmenities }}</td>
        </tr>
    @endforeach
    </tbody>
</table>




<h1>Reservation List</h1>

<table>
    <thead>
    <tr>
        <th>Hotel Name</th>
        <th>rate</th>
        <th>Hotel Fare</th>
        <th>Room Amenities</th>
    </tr>
    </thead>
    <tbody>
{{--    @php dd($reservations) @endphp--}}
    @foreach($reservations as $best)
        <tr>
            <td>{{ $best->hotels->hotelName }}</td>
            <td>{{ $best->hotels->rate }}</td>
            <td>{{ $best->hotels->hotelFare }}</td>
            <td>{{ $best->hotels->roomAmenities }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
