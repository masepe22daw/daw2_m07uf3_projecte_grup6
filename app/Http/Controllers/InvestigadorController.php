<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use App\Models\Participa;
use App\Models\Projecte;
use Illuminate\Support\Facades\DB;

class InvestigadorController extends Controller
{

    public function index()
{
    return view('investigador.menu');
}
 

public function showCreateForm()
{
    return view('investigador.create');
}

public function store(Request $request)
{
    $request->validate([
        'Passaport' => 'required|unique:INVESTIGADORS,Passaport',
        'NomCognoms' => 'required',
        'Email' => 'required|email|unique:INVESTIGADORS,Email',
    ]);

    $investigador = new Investigador();
    $investigador->Passaport = $request->input('Passaport');
    $investigador->CodiAssegMèdica = $request->input('CodiAssegMèdica');
    $investigador->NomCognoms = $request->input('NomCognoms');
    $investigador->Especialitat = $request->input('Especialitat');
    $investigador->Telefon = $request->input('Telefon');
    $investigador->Adreça = $request->input('Adreça');
    $investigador->Ciutat = $request->input('Ciutat');
    $investigador->País = $request->input('País');
    $investigador->Email = $request->input('Email');
    $investigador->Titulacio = $request->input('Titulacio');
    $investigador->save();

    if($investigador){
        return redirect()->route('investigador.create')->with('success', 'Investigador creat correctament.');
    }else{
        return redirect()->route('investigador.create')->with('error', 'No he pogut crear correctament el Investigador.');
    }
    
}

public function showDeleteForm()
{
    return view('investigador.delete');
}

public function destroy(Request $request)
{
    $request->validate([
        'Passaport' => 'required',
        'CodiProj' => 'required',
    ]);

    $Passaport = $request->input('Passaport');
    $CodiProj = $request->input('CodiProj');

    DB::beginTransaction();

    
        $result = Participa::where('Passaport', $Passaport)
            ->where('CodiProj', $CodiProj)
            ->delete();

        $investigador = Investigador::findOrFail($Passaport);
        $investigador->delete();
      
        DB::commit();

        if ($result) {
            return redirect()->route('investigador.delete')->with('success', 'Registro borrado exitosamente.');
        } else {
            DB::rollback();
            return redirect()->route('investigador.delete')->with('error', 'No se encontró el registro.');
        }
    
}



public function showUpdateForm()
{
    return view('investigador.edit');
}

public function update(Request $request)
{
    $request->validate([
        'passaport' => 'required',
        'campo' => 'required',
        'valor' => 'required',
    ]);

    try {
        $passaport = $request->input('passaport');
        $campo = $request->input('campo');
        $valor = $request->input('valor');

        $investigador = Investigador::findOrFail($passaport);
        $investigador->$campo = $valor;
        $investigador->save();

        // Actualizar las entradas en la tabla PARTICIPA si el campo editado es el pasaporte
        if ($campo === 'Passaport') {
            DB::table('PARTICIPA')->where('Passaport', $passaport)->update(['Passaport' => $valor]);
        }

        return redirect()->route('investigador.edit', $investigador->Passaport)->with('success', 'Investigador actualitzat correctament.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al actualizar el investigador.');
    }
}



public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'passaport' => 'required',
            ]);

            try {
                $passaport = $request->input('passaport');

                $investigador = Investigador::findOrFail($passaport);

                return view('investigador.search', compact('investigador'));
            } catch (\Exception $e) {
                return view('investigador.search')->with('error', 'No se encontró ningún investigador con el pasaporte proporcionado.');
            }
        } else {
            return view('investigador.search');
        }
    }
  
}
