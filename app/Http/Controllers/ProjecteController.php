<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use PDF;

class ProjecteController extends Controller
{

    public function index()
{
    return view('projecte.menu');
}
 

    public function create()
    {
        return view('projecte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:projectes,email',
            // agregar más validaciones si se requiere
        ]);

        $projecte = new projecte;
        $projecte->name = $request->name;
        $projecte->email = $request->email;
        // agregar más campos si se requiere
        $projecte->save();

        return redirect()->route('projecte.menu')->with('success', 'projecte creado exitosamente.');
    }

    public function edit($id)
    {
        $projecte = projecte::findOrFail($id);
        return view('projecte.edit', compact('projecte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:projectes,email,'.$id,
            // agregar más validaciones si se requiere
        ]);

        $projecte = projecte::findOrFail($id);
        $projecte->name = $request->name;
        $projecte->email = $request->email;
        // agregar más campos si se requiere
        $projecte->save();

        return redirect()->route('projecte.menu')->with('success', 'projecte actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $projecte = projecte::findOrFail($id);
        $projecte->delete();

        return redirect()->route('projecte.menu')->with('success', 'projecte eliminado exitosamente.');
    }

    public function show($id)
    {
        $projecte = projecte::findOrFail($id);
        return view('projecte.show', compact('projecte'));
    }
  
}
