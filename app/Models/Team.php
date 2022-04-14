<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function getAllTeams(){
        return $this->all();
    }

    public function searchTeamsByFee($minFee,$maxFee){

        $query = $this->query();

        if(isset($minFee)){
            $query = $query->where('fee', '>=', $minFee);
        }

        if(isset($maxFee)){
            $query = $query->where('fee', '<=', $maxFee);
        }

        return $query->get();
    }

    public function searchTeamsByGenre($genre){
        $query = $this->query();

        if(isset($genre)){
            $query = $query->where('genre', $genre);
        }

        return $query->get();
    }

    public function searchTeamsByFeeAndGenre($minFee,$maxFee,$genre){

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
    }
}
