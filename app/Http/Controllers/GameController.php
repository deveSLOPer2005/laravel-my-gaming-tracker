<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameStatus;
use App\Models\Genre;

class GameController extends Controller
{
    public function index(Request $request) {
        $filter = $request->query('status_choice', 'all');
        $query = Game::query();
        if ($filter !== 'all') {
        $query->whereHas('gameStatus', function($q) use ($filter) {
            $q->where('game_status', $filter);
            });
        }
        $my_games = $query->get(); 
        $statuses = GameStatus::all();
        return view('index', compact('my_games', 'statuses', 'filter'));
    }
        public function edit(Request $request, $id) {
        $game_to_edit = Game::findOrFail($id);
        $filter = $request->query('status_choice', 'all');
        $query = Game::query();
        if ($filter !== 'all') {
        $query->whereHas('gameStatus', function($q) use ($filter) {
            $q->where('game_status', $filter);
            });
        }
        $my_games = $query->get(); 
        $statuses = GameStatus::all();
        return view('index', compact('my_games', 'game_to_edit', 'statuses', 'filter'));
    }

    public function update(Request $request, $id) {
        $game = Game::findOrFail($id);
        $genre = Genre::firstOrCreate([
            'genre' => $request->input('genre_id')
        ]);
        $game->update([
            'title' => $request->input('title'),
            'genre_id'  => $genre->id,
            'status_id' => $request->input('status_id'),
        ]);
        return redirect('/');
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
