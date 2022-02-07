<?php

namespace App\Http\Controllers;

use App\Models\Engin;
use App\Models\EnginCategorie;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnginController extends Controller
{
    public function index()
    {
        $engin_categories = EnginCategorie::orderBy('libelle', 'asc')->get();
        $engins = Engin::orderBy('created_at', 'desc')->simplePaginate(6);
        //dd($engins);
        return view('engins', with(
            [
                'engins' => $engins,
                'engin_categories' => $engin_categories
            ]
        ));
    }

    public function recherche(Request $request)
    {
        $request->validate([
            'reference' => ['required', 'string', 'max:255', 'exists:engins']
        ]);

        $engin = Engin::findOrFail($request->reference);
        //dd($engins);
        return view('rechercher', with(
            [
                'engin' => $engin
            ]
        ));
    }

    public function create(Request $request)
    {
        $request->validate([
            'categorie_id' => ['required', 'integer'],
            'reference' => ['required', 'string', 'max:255', 'unique:engins'],
            'type' => ['required', 'string', Rule::in(Engin::$types)],
            'name' => ['required', 'string']
        ]);

        $categorie = EnginCategorie::findOrFail($request->categorie_id);

        $user = Engin::create([
            'categorie_id' => $request->categorie_id,
            'reference' => $request->reference,
            'type' => $request->type,
            'name' => $request->name
        ]);

        return redirect('engins')->with('status', 'Véhicule ajouté avec succès');
    }
}
