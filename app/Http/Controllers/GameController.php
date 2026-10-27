<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index() {
        $my_games = Game::all();
        return view('index', compact('my_games'));
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect('/');
    }
}
