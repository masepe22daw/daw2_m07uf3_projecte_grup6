<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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

    
    public function showPdfForm()
    {
        return view('usuaris.pdf-form');
    }
    public function generarPDF(Request $request)
    {
        $email = $request->input('email');

        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        if ($user) {
            $dompdf = new Dompdf();

            $html = '<h1>Informació del Usuari</h1>';
            $html .= '<p>ID: ' . $user->id . '</p>';
            $html .= '<p>Nom: ' . $user->name . '</p>';
            $html .= '<p>Email: ' . $user->email . '</p>';
            $html .= '<p>Tipus: ' . $user->Tipus . '</p>';
            $html .= '<p>Última Hora de Entrada: ' . $user->DarreraHoraEntrada . '</p>';
            $html .= '<p>Última Hora de Salida: ' . $user->DarreraHoraSortida . '</p>';

            $dompdf->loadHtml($html);
            $dompdf->render();

            $dompdf->stream('usuari.pdf');
        } else {
            return back()->with('error', 'No se encontraron datos del usuari');
        }
    }
}
