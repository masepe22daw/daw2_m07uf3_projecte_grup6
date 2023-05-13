<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use PDF;

class InvestigadorController extends Controller
{

    public function index()
{
    return view('investigador.menu');
}
 

    public function create()
    {
        return view('investigador.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:investigadors,email',
            // agregar más validaciones si se requiere
        ]);

        $investigador = new Investigador;
        $investigador->name = $request->name;
        $investigador->email = $request->email;
        // agregar más campos si se requiere
        $investigador->save();

        return redirect()->route('investigador.menu')->with('success', 'Investigador creado exitosamente.');
    }

    public function edit($id)
    {
        $investigador = Investigador::findOrFail($id);
        return view('investigador.edit', compact('investigador'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:investigadors,email,'.$id,
            // agregar más validaciones si se requiere
        ]);

        $investigador = Investigador::findOrFail($id);
        $investigador->name = $request->name;
        $investigador->email = $request->email;
        // agregar más campos si se requiere
        $investigador->save();

        return redirect()->route('investigador.menu')->with('success', 'Investigador actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $investigador = Investigador::findOrFail($id);
        $investigador->delete();

        return redirect()->route('investigador.menu')->with('success', 'Investigador eliminado exitosamente.');
    }

    public function show($id)
    {
        $investigador = Investigador::findOrFail($id);
        return view('investigador.show', compact('investigador'));
    }

  
}
