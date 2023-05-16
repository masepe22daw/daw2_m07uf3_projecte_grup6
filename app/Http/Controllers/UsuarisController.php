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
  

public function showUpdateForm()
    {
        return view('usuaris.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'campo' => 'required',
            'value' => 'required',
        ]);

        $user = User::find($request->input('user_id'));

        if ($user) {
            $campo = $request->input('campo');
            $value = $request->input('value');

            $user->$campo = $value;
            $user->save();

            return redirect()->route('usuaris.edit')->with('success', 'Usuario actualizado exitosamente.');
        } else {
            return redirect()->route('usuaris.edit')->with('error', 'No se encontró el usuario.');
        }
    }


    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'id' => 'required',
            ]);

            try {
                $id = $request->input('id');

                $usuari = User::findOrFail($id);

                return view('usuaris.search', compact('usuari'));
            } catch (\Exception $e) {
                return view('usuaris.search')->with('error', 'No se encontró ningún usuari con el id proporcionado.');
            }
        } else {
            return view('usuaris.search');
        }
    }
}
