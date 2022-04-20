<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

class Game extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_games', 'gameId', 'teamId');
    }

    public function getAllGamesWithTeams()
    {

        return $this->with('teams')->get();
    }

    public function getLocatedGamesWithTeams($game_date=null,$game_location=null,$genre=null)
    {
        try {
            $query = $this->query();
            if (isset($game_date)) {
                $query->where('date', $game_date);
            }
            if (isset($game_location)) {
                $query->where('location', $game_location);
            }
            if (isset($genre)) {
                $query->where('genre', $genre);
            }
            return $query->with('teams')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
