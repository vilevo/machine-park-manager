<?php

namespace App\Http\Controllers;

use App\Models\Engin;
use App\Models\Panne;
use App\Models\Huile;
use App\Models\Emplacement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $engins = Engin::orderBy('created_at', 'desc')->limit(6)->get();

        $count_pannes = DB::table('pannes')->whereNull('repare_le')->count();

        $huiles = DB::table('huiles')->get();

        $count_users = DB::table('users')->count();

        $count_engins_deplace = DB::table('engins')->where('au_parc', 0)->count();

        return view('dashboard', with(
            [
                'engins' => $engins,
                'count_pannes' => $count_pannes,
                'huiles' => $huiles,
                'count_engins_deplace' => $count_engins_deplace,
                'count_users' => $count_users,
            ]
        ));
    }
}
