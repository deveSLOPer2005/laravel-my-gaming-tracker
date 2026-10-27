<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameStatus;
use App\Models\Genre;

class GameController extends Controller
{
    public function index() {
        $my_games = Game::all();
        $statuses = GameStatus::all();
        return view('index', compact('my_games', 'statuses'));
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect('/');
    }

    public function store(Request $request) {
        $genre = Genre::firstOrCreate([
            'genre' => $request->input('genre_id')
        ]);
        $game = Game::create([
            'title' => $request->input('title'),
            'genre_id'  => $genre->id,
            'status_id' => $request->input('status_id'),
            'user_id' => 1,
        ]);
        return redirect('/');
    }
}
