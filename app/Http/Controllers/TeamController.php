<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    public function showTeams(Team $team, $genre = null)
    {
        if (isset($genre)) {
            $locatedTeams = $team->searchTeamsByGenre($genre);
            Log::info(json_encode($locatedTeams, JSON_UNESCAPED_UNICODE));
        }

        if (!isset($genre)) {
            $allTeams = $team->getAllTeams();
            Log::info(json_encode($allTeams, JSON_UNESCAPED_UNICODE));
        }
    }

    public function searchTeams(Team $team, Request $request){
        $minAge = $request->input('minAge');
        $maxAge = $request->input('maxAge');
        return $team->searchTeamsByFee($minAge,$maxAge);


    }
}
