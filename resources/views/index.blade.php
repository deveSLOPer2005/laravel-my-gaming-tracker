<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my gaming tracker</title>
</head>
<body>
    <h1>my gaming tracker</h1>
    <table border="1">
        <caption>games</caption>
        <tr>
            <th>title</th>
            <th>genre</th>
            <th>status</th>
        </tr>
        @foreach ($my_games as $game)
        <tr>
            <td>{{ $game->title }}</td>
            <td>{{ $game->genre->genre }}</td>
            <td>{{ $game->gameStatus->game_status }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>