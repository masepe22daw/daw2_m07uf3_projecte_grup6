<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participa;
use Illuminate\Support\Facades\DB;

class ParticipaController extends Controller
{

    public function index()
{
    return view('participa.menu');
}
 

public function showCreateForm()
{
    return view('participa.create');
}

public function store(Request $request)
{
    $request->validate([
        'Passaport' => 'required|unique:PARTICIPA,Passaport',
        'CodiProj' => 'required',
    ]);

    $participa = new Participa();
    $participa->Passaport = $request->input('Passaport');
    $participa->CodiProj = $request->input('CodiProj');
    $participa->DataInici = $request->input('DataInici');
    $participa->DataFinal = $request->input('DataFinal');
    $participa->Retribucio = $request->input('Retribucio');
    $participa->ParticipacioProrrogable = $request->input('ParticipacioProrrogable');
    $participa->ParticipacioPublicacio = $request->input('ParticipacioPublicacio');
    $participa->save();

    return redirect()->route('participa.create')->with('success', 'participa creat correctament.');
}

public function showDeleteForm()
{
    return view('participa.delete');
}


public function destroy(Request $request)
{
    $request->validate([
        'Passaport' => 'required',
        'CodiProj' => 'required',
    ]);

    // Obtener las claves primarias del formulario
    $Passaport = $request->input('Passaport');
    $CodiProj = $request->input('CodiProj');

    // Buscar y eliminar el registro en la base de datos
    $result = Participa::where('Passaport', $Passaport)
        ->where('CodiProj', $CodiProj)
        ->delete();

    // Verificar si se eliminó el registro correctamente
    if ($result) {
        return redirect()->route('participa.delete')->with('success', 'Registro borrado exitosamente.');
    } else {
        return redirect()->route('participa.delete')->with('error', 'No se encontró el registro.');
    }
}





}
