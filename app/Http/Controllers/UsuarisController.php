<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsuarisController extends Controller
{

    public function index()
{
    return view('usuaris.menu');
}
 
public function showCreateForm()
{
    return view('usuaris.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'Tipus' => 'required|in:gestor,director',
    ]);
    try{
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->Tipus = $request->input('Tipus');
        $user->save();
    
        return redirect()->route('usuaris.create')->with('success', 'Usuario creado exitosamente.');
    }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error al afegir el usuari.');
    }
    
}

  
}
