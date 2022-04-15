<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Member;

class MemberController extends Controller
{
    public function showMemberList(Member $member, $member_area = null)
    {
        /**
         *
        // $value = [
        //     'a' => 'ika',
        //     'b' => 'ikura',
        //     'c' => 'maguro'
        // ];
        // Log::info('test');
        // Log::info(json_encode($value));
        // $id1 = $member->find(1);
        // Log::info($id1);

        // $area1 = $member->where('area', '東京')->get();
        // Log::info($area1);
        // $ageUnder30 = $member->where('age', '<=', 30)->get();
        // Log::info($ageUnder30);

        $allMember = $member->all();
        // Log::info($allMember);
        // $tokyoUser = $allMember->firstWhere('area','東京');
        // Log::info($tokyoUser);

        //05.Step3・4
        $filtered = $allMember->filter(function ($member) {
            return $member['age'] >= 25;
        });

        $filtered2 = $allMember->filter(function ($member) {
            return $member['age'] <= 20;
        });

        if (!empty($filtered)) {
            Log::info('25歳以上がいます');
        }
        if (!empty($filtered2)) {
            Log::info('20歳以下がいます');
        }

        //05.step5
        Log::info($allMember->count());

        //05.step6
        $tokyoMembers = $allMember->map(function ($member) {
            if ($member['area'] == '東京') {
                return $member;
            }
        });

        Log::info(json_encode($tokyoMembers, JSON_UNESCAPED_UNICODE));

        //05.step7
        $areas = $allMember->pluck('area');
        Log::info(json_encode($areas, JSON_UNESCAPED_UNICODE));

        //05.step 8
        $sortMembers = $allMember->sortByDesc(function ($member) {
            return $member['age'];
        });
        Log::info(json_encode($sortMembers, JSON_UNESCAPED_UNICODE));

         */

        //07.step2

        //受け取った値がnullなら全てのデータ、nullでなければ受け取った値で検索したデータを格納
        if (!empty($member_area)) {
            $locatedMember = $member->where('area', $member_area)->get();
        } else {
            $locatedMember = $member->all();
        }

        //格納したデータに値があればそれを出力して、なければメッセージ出力。
        if ($locatedMember->isNotEmpty()) {
            Log::info(json_encode($locatedMember, JSON_UNESCAPED_UNICODE));
        } else {
            Log::info('該当するユーザーはいません');
        }
    }

    //リレーション課題02.step2
    public function showMemberInfo(Member $member, $member_id)
    {
        $memberWithTeams = $member->getMembersWithTeams($member_id);
        Log::info(json_encode($memberWithTeams, JSON_UNESCAPED_UNICODE));
    }

    public function searchMembers(Member $member, Request $request)
    {
        $minAge = $request->input('minAge');
        $maxAge = $request->input('maxAge');

        $query = $member;

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
