<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Engin;
use App\Models\Panne;
use App\Models\Huile;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StatistiqueController extends Controller
{
    public function get()
    {

        // dd($data);
        return view('statistiques', [
            "counts" => [
                "engins" => Engin::query()->count(),
                "pannes" => Panne::query()->count(),
                "approvisionnement" => Huile::query()->count(),
                "comptes" => User::query()->count(),
                "deplacement" => Emplacement::query()->count()
            ],
            "pannes_by_state" => [
                "states" => ["Réparées", "Non réparées"],
                "totaux" => $this->pannesByState(),
            ],
            "stats_details" => [
                "approvisionnements" => Huile::all(),
                "pannes" => Panne::all(),
            ]
        ]);
    }

    public function pannesByState()
    {
        $pannes_repared = Panne::query()->where('status', '=', 0)->whereNotNull('repare_le')->count();
        $users_unrepared = Panne::query()->where('status', '=', 1)->whereNull('repare_le')->count();

        return [$pannes_repared, $users_unrepared];
    }

    public function downloadPdf()
    {
        $data =  [
            "counts" => [
                "engins" => Engin::query()->count(),
                "pannes" => Panne::query()->count(),
                "approvisionnement" => Huile::query()->count(),
                "comptes" => User::query()->count(),
            ],
            "pannes_by_state" => [
                "states" => ["Réparées", "Non réparées"],
                "totaux" => $this->pannesByState(),
            ]

        ];

        $pdf = PDF::loadView('statistiques', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
