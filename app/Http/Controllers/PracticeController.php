<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;


class PracticeController extends Controller
{
    public function showAllPracticeWithTeam(Practice $practice)
    {
        try {
            return $practice->getAllPractices();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function showPastPracticesWithTeam(Practice $practice)
    {
        try {
            $today = Carbon::today();
            $pastPracticeList = $practice->getPastPractices($today);
            return $pastPracticeList;
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function showFuturePracticesWithTeam(Practice $practice)
    {
        try {
            $today = Carbon::today();
            $futurePracticeList = $practice->getFuturePractices($today);
            return $futurePracticeList;
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
