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
            <td>
        <form action="/games/{{ $game->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </td>
</tr>
        @endforeach
    </table>
    <form action="/games" method="POST">
    @csrf
    <div>
        <label for="title">game name:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
    <label for="status_id">game status:</label>
    <select name="status_id" id="status_id" required>
        <option value="" disabled selected hidden>choose status</option>
        @foreach ($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->game_status }}</option>
        @endforeach
    </select>
    </div>
        <div>
        <label for="genre_input">game genre:</label>
        <input type="text" name="genre_id" id="genre_id" required>
    </div>
    <button type="submit">add game</button>
</form>
</body>
</html>