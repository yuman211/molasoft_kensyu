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
        } else {
            $allTeams = $team->getAllTeamsWithRanks();
            Log::info(json_encode($allTeams, JSON_UNESCAPED_UNICODE));
        }
    }

    public function searchTeams(Team $team, Request $request)
    {
        $minFee = $request->input('minFee');
        $maxFee = $request->input('maxFee');
        $genre = $request->input('genre');

        // if(isset($minFee)||isset($maxFee)){
        // $searchedTeams = $team->searchTeamsByFee($minFee,$maxFee);
        // }

        // if(isset($genre)){
        // $searchedTeams = $team->searchTeamsByGenre($genre);
        // }

        // return $searchedTeams;

        return $team->searchTeamsByFeeAndGenre($minFee, $maxFee, $genre);
    }

    //リレーション02.step1
    public function showTeamWithMembers(Team $team)
    {
        Log::info(json_encode($team->getTeamWithMembers(),JSON_UNESCAPED_UNICODE));
    }

    //リレーション02.step4
    public function showTeamsWithMembers(Team $team)
    {
        Log::info(json_encode($team->getTeamWithMembers(),JSON_UNESCAPED_UNICODE));
    }
}
