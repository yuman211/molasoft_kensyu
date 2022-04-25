<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;


class PracticeController extends Controller
{
    public function showPracticesWithTeam(Practice $practice)
    {
        try {

            $getAllPractices = null;
            $getPastPractices = null;
            $getFuturePractices = null;
            $today = Carbon::today();

            $getAllPractices=$practice->getAllPracticesWithTeams();
            $getPastPractices = $practice->getPastPracticesWithTeams($today);
            $$getFuturePractices = $practice->getFuturePracticesWithTeams($today);
            return [$getAllPractices,$getPastPractices, $getFuturePractices];

        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
