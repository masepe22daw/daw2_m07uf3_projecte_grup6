<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participa;
use PDF;

class ParticipaController extends Controller
{

    public function index()
{
    return view('participa.menu');
}
 

    public function create()
    {
        return view('participa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:participas,email',
            // agregar más validaciones si se requiere
        ]);

        $participa = new participa;
        $participa->name = $request->name;
        $participa->email = $request->email;
        // agregar más campos si se requiere
        $participa->save();

        return redirect()->route('participa.menu')->with('success', 'participa creado exitosamente.');
    }

    public function edit($id)
    {
        $participa = participa::findOrFail($id);
        return view('participa.edit', compact('participa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:participas,email,'.$id,
            // agregar más validaciones si se requiere
        ]);

        $participa = participa::findOrFail($id);
        $participa->name = $request->name;
        $participa->email = $request->email;
        // agregar más campos si se requiere
        $participa->save();

        return redirect()->route('participa.menu')->with('success', 'participa actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $participa = participa::findOrFail($id);
        $participa->delete();

        return redirect()->route('participa.menu')->with('success', 'participa eliminado exitosamente.');
    }

    public function show($id)
    {
        $participa = participa::findOrFail($id);
        return view('participa.show', compact('participa'));
    }

  
}
