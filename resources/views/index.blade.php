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
            <th colspan="2">actions</th>
        </tr>
        @foreach ($my_games as $game)
        <tr>
            <td>{{ $game->title }}</td>
            <td>{{ $game->genre->genre ?? 'no genre' }}</td>
            <td>{{ $game->gameStatus->game_status ?? 'no status' }}</td>
            <td><a href="/games/{{ $game->id }}/edit">edit</a></td>
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
    <div style="margin-top: 15px;">
    {{ $my_games->links() }}
    </div>
    <form action="/" method="GET" style="margin-top: 20px;">
    <label for='status_choice'>choose status:</label>
    <select id='status_choice' name='status_choice'>
        <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>all</option>
        @foreach($statuses as $status)
            <option value="{{ $status->game_status }}" {{ $filter === $status->game_status ? 'selected' : '' }}>
                {{ $status->game_status }}
            </option>
        @endforeach
    </select>
    <button type="submit">submit</button>
    </form>

    <h2>{{ isset($game_to_edit) ? 'edit game' : 'add game' }}</h2>

    <form action="{{ isset($game_to_edit) ? '/games/' . $game_to_edit->id : '/games' }}" method="POST">
        @csrf
        @if(isset($game_to_edit))
            @method('PUT')
        @endif

        <div>
            <label for="title">game name:</label>
            <input type="text" name="title" id="title" value="{{ $game_to_edit->title ?? '' }}" required>
        </div>

        <div>
            <label for="status_id">game status:</label>
            <select name="status_id" id="status_id" required>
                <option value="" disabled {{ !isset($game_to_edit) ? 'selected' : '' }} hidden>choose status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" 
                        {{ (isset($game_to_edit) && $game_to_edit->status_id == $status->id) ? 'selected' : '' }}>
                        {{ $status->game_status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="genre_id">game genre:</label>
            <input type="text" name="genre_id" id="genre_id" value="{{ $game_to_edit->genre->genre ?? '' }}" required>
        </div>

        <button type="submit">{{ isset($game_to_edit) ? 'update game' : 'add game' }}</button>
        
        @if(isset($game_to_edit))
            <a href="/" style="margin-left: 10px;">cancel</a>
        @endif
    </form>
</body>
</html>
