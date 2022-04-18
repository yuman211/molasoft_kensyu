<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function showAllGames(Game $game)
    {
        return $game->getAllGamesWithTeams();
    }

    public function searchGames(Game $game,Request $request)
    {
        $game_date = $request->input('date');
        $game_location = $request->input('location');
        $genre = $request->input('genre');
        
        return $game->getLocatedGamesWithTeams($game_date,$game_location,$genre);
    }
}
