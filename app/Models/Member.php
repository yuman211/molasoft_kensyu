<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function searchMembersByArea($member_area)
    {

        $query = $this->query();

        if (isset($member_area)) {
            $query->where('area', $member_area)->get();
        }
        return $query->get();
    }


    public function searchMembersByAge($minAge, $maxAge)
    {
        $query = $this->query();

        if (isset($minAge)) {
            $query->where('age', '>=', $minAge);
        }

        if (isset($maxAge)) {
            $query->where('age', '<=', $maxAge);
        }

        return $query->get();
    }
}
