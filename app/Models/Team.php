<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

class Team extends Model
{
    use HasFactory;

    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'teams_practices', 'team_id', 'practice_id');
    }

    public function getAllTeamsWithPractice(){

        try {
            return $this->with('practices.members')->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchTeamsByFee($minFee, $maxFee)
    {

        try {

            $query = $this->query();

            if (isset($minFee)) {
                $query->where('fee', '>=', $minFee);
            }

            if (isset($maxFee)) {
                $query->where('fee', '<=', $maxFee);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchTeamsByGenre($genre)
    {

        try {

            $query = $this->query();

            if (isset($genre)) {
                $query->where('genre', $genre);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function searchTeamsByFeeAndGenre($minFee, $maxFee, $genre)
    {

        try {

            $query = $this->query();

            if (isset($minFee)) {
                $query->where('fee', '>=', $minFee);
            }

            if (isset($maxFee)) {
                $query->where('fee', '<=', $maxFee);
            }

            if (isset($genre)) {
                $query->where('genre', $genre);
            }

            return $query->get();
        } catch (Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
