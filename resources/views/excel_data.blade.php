<!DOCTYPE html>
<html lang="en">
<head>
    <title>Excel Data</title>
</head>
<body>
<h1>Best Hotels Data</h1>
@if(count($bestHotelsData) > 0)
    <table>
        <thead>
        <tr>
            @foreach($bestHotelsData[0][0] as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach(array_slice($bestHotelsData[0], 1) as $row)
            <tr>
                @foreach($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No Best Hotels data available.</p>
@endif

<h1>Top Hotels Data</h1>
@if(count($topHotelsData) > 0)
    <table>
        <thead>
        <tr>
            @foreach($topHotelsData[0][0] as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach(array_slice($topHotelsData[0], 1) as $row)
            <tr>
                @foreach($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No Top Hotels data available.</p>
@endif




{{--<h1>Best Hotels Data</h1>--}}
{{--@foreach($bestHotelsData as $chunk)--}}
{{--    @if(count($chunk) > 0)--}}
{{--        <table>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                @foreach($chunk[0] as $header)--}}
{{--                    <th>{{ $header }}</th>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach(array_slice($chunk, 1) as $row)--}}
{{--                <tr>--}}
{{--                    @foreach($row as $value)--}}
{{--                        <td>{{ $value }}</td>--}}
{{--                    @endforeach--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @else--}}
{{--        <p>No Best Hotels data available.</p>--}}
{{--    @endif--}}
{{--@endforeach--}}

{{--<h1>Top Hotels Data</h1>--}}
{{--@foreach($topHotelsData as $chunk)--}}
{{--    @if(count($chunk) > 0)--}}
{{--        <table>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                @foreach($chunk[0] as $header)--}}
{{--                    <th>{{ $header }}</th>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach(array_slice($chunk, 1) as $row)--}}
{{--                <tr>--}}
{{--                    @foreach($row as $value)--}}
{{--                        <td>{{ $value }}</td>--}}
{{--                    @endforeach--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @else--}}
{{--        <p>No Top Hotels data available.</p>--}}
{{--    @endif--}}
{{--@endforeach--}}


</body>
</html>
