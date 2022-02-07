<?php

namespace App\Http\Controllers;

use App\Models\Panne;
use App\Models\Engin;
use App\Models\Huile;
use Illuminate\Http\Request;

class PanneController extends Controller
{
    public function index()
    {
        $pannes = Panne::orderBy('created_at', 'desc')->simplePaginate(6);

        return view('pannes', with(
            [
                'pannes' => $pannes
            ]
        ));
    }

    public function show(Engin $engin)
    {
        $huiles = Huile::where('engin_reference', $engin->reference)->get();
        $pannes = Panne::where('engin_reference', $engin->reference)->get();
        return view('panneDetail', with(
            [
                'pannes' => $pannes,
                'huiles' => $huiles
            ]
        ));
    }

    public function create(Request $request)
    {
        $request->validate([
            'type_panne' => ['required', 'string'],
            'chauffeur' => ['required', 'string'],
            'mecanicien' => ['required', 'string'],
            'engin_reference' => ['required', 'string', 'exists:engins,reference']
        ]);

        $panne = Panne::create([
            'type_panne' => $request->type_panne,
            'mecanicien' => $request->mecanicien,
            'chauffeur' => $request->chauffeur,
            'engin_reference' => $request->engin_reference,
            'status' => 1
        ]);

        $engin = Engin::where('reference', $panne->engin_reference)->firstOrFail();

        $engin->en_panne =  1;
        $engin->save();

        return redirect('pannes')->with('status', 'Panne ajoutée avec succès');
    }

    public function reparer_panne(Panne $panne)
    {
        $panne->status = 0;
        $panne->repare_le = now();
        $panne->save();

        $engin = Engin::where('reference', $panne->engin_reference)->firstOrFail();
        $engin->en_panne = 0;
        $engin->save();

        return redirect('pannes')->with('status', 'Panne réparée');
    }
}
