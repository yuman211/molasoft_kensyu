<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Exception;

class GameController extends Controller
{
    public function showAllGames(Game $game)
    {
        try {
            return $game->getAllGamesWithTeams();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function searchGames(Game $game,Request $request)
    {
        try {
            $game_date = $request->input('date');
            $game_location = $request->input('location');
            $genre = $request->input('genre');

            return $game->getLocatedGamesWithTeams($game_date, $game_location, $genre);
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
