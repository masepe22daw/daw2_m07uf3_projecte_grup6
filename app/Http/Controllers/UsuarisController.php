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
    
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->Tipus = $request->input('Tipus');
        $user->save();

        if($user){
            return redirect()->route('usuaris.create')->with('success', 'Usuario creado exitosamente.');
        }else{
            return redirect()->route('usuaris.create')->with('error', 'Error al afegir el usuari.');
        }
    
}

public function showDeleteForm()
{
    return view('usuaris.delete');
}

public function destroy(Request $request)
{
    $request->validate([
        'user_id' => 'required',
    ]);

    $user = User::find($request->input('user_id'));

    if ($user) {
        $user->delete();
        return redirect()->route('usuaris.delete')->with('success', 'Usuario eliminado exitosamente.');
    } else {
        return redirect()->route('usuaris.delete')->with('error', 'No se encontró el usuario.');
    }
}
  

}
