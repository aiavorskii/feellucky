<table>
    <thead>
        <tr>
            <th>Win/Loose</th>
            <th>Number</th>
            <th>Prize</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gameEntries as $gameEntry)
            <tr>
                <td>{{ $gameEntry['win_loose'] }}</td>
                <td>{{ $gameEntry['result'] }}</td>
                <td>{{ $gameEntry['prize'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
