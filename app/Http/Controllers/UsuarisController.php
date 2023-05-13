<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuaris;
use PDF;

class UsuarisController extends Controller
{

    public function index()
{
    return view('usuaris.menu');
}
 

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:usuariss,email',
            // agregar más validaciones si se requiere
        ]);

        $usuaris = new Usuaris;
        $usuaris->name = $request->name;
        $usuaris->email = $request->email;
        // agregar más campos si se requiere
        $usuaris->save();

        return redirect()->route('usuaris.menu')->with('success', 'usuaris creado exitosamente.');
    }

    public function edit($id)
    {
        $usuaris = usuaris::findOrFail($id);
        return view('usuaris.edit', compact('usuaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:usuariss,email,'.$id,
            // agregar más validaciones si se requiere
        ]);

        $usuaris = Usuaris::findOrFail($id);
        $usuaris->name = $request->name;
        $usuaris->email = $request->email;
        // agregar más campos si se requiere
        $usuaris->save();

        return redirect()->route('usuaris.menu')->with('success', 'usuaris actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $usuaris = Usuaris::findOrFail($id);
        $usuaris->delete();

        return redirect()->route('usuaris.menu')->with('success', 'usuaris eliminado exitosamente.');
    }

    public function show($id)
    {
        $usuaris = Usuaris::findOrFail($id);
        return view('usuaris.show', compact('usuaris'));
    }

  
}
