<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;

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
    $projecte->MaxNumInvestigadors = $request->input('MaxNumInvestigadors');
    $projecte->Responsable = $request->input('Responsable');
    $projecte->Investigacio = $request->input('Investigacio');
    $projecte->Idioma = $request->input('Idioma');
    $projecte->save();

    return redirect()->route('projecte.create')->with('success', 'projecte creat correctament.');
}

    
  
}
