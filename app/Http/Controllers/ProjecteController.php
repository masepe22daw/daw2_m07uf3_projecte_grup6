<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\DB;

class ProjecteController extends Controller
{

    public function index()
{
    return view('projecte.menu');
}
 
public function showCreateForm()
{
    return view('projecte.create');
}
   
public function store(Request $request)
{
    $request->validate([
        'CodiProj' => 'required|unique:PROJECTES,CodiProj',
        'Nom' => 'required',
    ]);

    $projecte = new Projecte();
    $projecte->CodiProj = $request->input('CodiProj');
    $projecte->Nom = $request->input('Nom');
    $projecte->DataInici = $request->input('DataInici');
    $projecte->DataFinal = $request->input('DataFinal');
    $projecte->Classificacio = $request->input('Classificacio');
    $projecte->HoresAssignades = $request->input('HoresAssignades');
    $projecte->PressupostAssignat = $request->input('PressupostAssignat');
    $projecte->MaxNumprojectes = $request->input('MaxNumprojectes');
    $projecte->Responsable = $request->input('Responsable');
    $projecte->Investigacio = $request->input('Investigacio');
    $projecte->Idioma = $request->input('Idioma');
    $projecte->save();

    return redirect()->route('projecte.create')->with('success', 'projecte creat correctament.');
}

public function showDeleteForm()
{
    return view('projecte.delete');
}

public function destroy(Request $request)
{
    $request->validate([
        'CodiProj' => 'required|exists:PROJECTES,CodiProj',
    ]);

    $CodiProj = $request->input('CodiProj');

    DB::beginTransaction();

    try {
        $projecte = Projecte::findOrFail($CodiProj);
        $projecte->delete();

        // Verificar si hay registros relacionados en PARTICIPA
        $participaExists = DB::table('PARTICIPA')->where('CodiProj', $CodiProj)->exists();

        if ($participaExists) {
            DB::table('PARTICIPA')->where('CodiProj', $CodiProj)->delete();
        }

        DB::commit();

        return redirect()->route('projecte.delete')->with('success', 'Proyecto eliminado correctamente.');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect()->back()->with('error', 'Error al eliminar el proyecto.');
    }
}
  
public function showUpdateForm()
{
    return view('projecte.edit');
}

public function update(Request $request)
{
    $request->validate([
        'CodiProj' => 'required|exists:PROJECTES,CodiProj',
        'campo' => 'required',
        'valor' => 'required',
    ]);

    try {
        $CodiProj = $request->input('CodiProj');
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        $projecte = Projecte::findOrFail($CodiProj);
        $projecte->$campo = $valor;
        $projecte->save();

        return redirect()->route('projecte.edit', $projecte->CodiProj)->with('success', 'Proyecto actualizado correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al actualizar el proyecto.');
    }
}

public function showSearchForm()
{
    return view('projecte.search');
}

public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'CodiProj' => 'required',
            ]);

            try {
                $CodiProj = $request->input('CodiProj');

                $projecte = Projecte::findOrFail($CodiProj);

                return view('projecte.search', compact('projecte'));
            } catch (\Exception $e) {
                return view('projecte.search')->with('error', 'No se encontró ningún projecte con el  proporcionado.');
            }
        } else {
            return view('projecte.search');
        }
    }

}
