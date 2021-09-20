<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function get()
    {
        $users = User::paginate(10);

        return view('utilisateurs', with(
            [
                'users' => $users
            ]
        ));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:8', 'unique:users'],
            'adresse' => ['required', 'string'],
            'fonction' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adresse' => $request->adresse,
            'fonction' => $request->fonction,
            'password' => Hash::make($request->password),
        ]);

        return redirect('utilisateurs')->with('status', 'Utilisateur ajouté avec succès');
    }
}
