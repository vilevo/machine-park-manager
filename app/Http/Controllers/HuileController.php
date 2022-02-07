<?php

namespace App\Http\Controllers;

use App\Models\Huile;
use Illuminate\Http\Request;

class HuileController extends Controller
{
    public function index()
    {
        $huiles = Huile::orderBy('created_at', 'desc')->get();

        return view('huiles', with(
            [
                'huiles' => $huiles
            ]
        ));
    }

    public function create(Request $request)
    {
        $request->validate([
            'chauffeur' => ['required', 'string'],
            'engin_reference' => ['required', 'string', 'exists:engins,reference'],
            'type_huile' => ['required', 'string'],
            'quantite' => ['required', 'integer'],
            'approvisionneur' => ['required', 'string'],
            'reapprovisionnement' => ['nullable']
        ]);

        $huile = Huile::create([
            'chauffeur' => $request->chauffeur,
            'engin_reference' => $request->engin_reference,
            'type_huile' => $request->type_huile,
            'quantite' => $request->quantite,
            'approvisionneur' => $request->approvisionneur,
            'reapprovisionnement' => $request->reapprovisionnement,
        ]);

        return redirect('huiles')->with('status', 'Approvisionnement effectué avec succès');
    }
}
