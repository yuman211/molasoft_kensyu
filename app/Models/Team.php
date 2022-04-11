<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function getAllTeams(Team $team){
        return $team->all();
    }

    public function searchTeamsByGenre(Team $team,$genre){
        return $team->where('genre',$genre)->get();
    }

    public function searchTeamsByFee(Team $team,$minAge,$maxAge){

        $query = $team;

        if (!empty($minAge) && !empty($maxAge)) {
            $query = $query->where('age', '>=', $minAge)->where('age', '<=', $maxAge);
        } elseif (!empty($maxAge)) {
            $query = $query->where('age', '<=', $maxAge);
        } elseif (!empty($minAge)) {
            $query = $query->where('age', '>=', $minAge);
        }

        return $query->get();

    }

}
