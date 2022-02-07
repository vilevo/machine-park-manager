<?php

namespace App\Http\Controllers;

use App\Models\EnginCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnginCategoryController extends Controller
{
    public function index()
    {
        $engins_categories = DB::table('engin_categories')->orderBy('libelle', 'ASC')->get();
        return response()->json(['engins_categories' => $engins_categories]);
    }
}
