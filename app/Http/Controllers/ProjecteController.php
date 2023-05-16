<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\DB;
use App\Models\Participa;
use App\Models\investigador;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


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

public function showDeleteForm()
{
    return view('projecte.delete');
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

    $projecte = Projecte::findOrFail($CodiProj);
    $projecte->delete();
   
    DB::commit();

        if ($result) {
            return redirect()->route('projecte.delete')->with('success', 'Registro borrado exitosamente.');
        } else {
            DB::rollback();
            return redirect()->route('projecte.delete')->with('error', 'No se encontró el registro.');
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

    
    public function showPdfForm()
    {
        return view('projecte.pdf-form');
    }
    public function generarPDF(Request $request)
    {
        $codiProj = $request->input('CodiProj');

        $projecte = DB::table('PROJECTES')
            ->where('CodiProj', $codiProj)
            ->first();

        if ($projecte) {
            $dompdf = new Dompdf();

            $html = '<h1>Informació del Projecte</h1>';
            $html .= '<p>CodiProj: ' . $projecte->CodiProj . '</p>';
            $html .= '<p>Nom: ' . $projecte->Nom . '</p>';
            $html .= '<p>DataInici: ' . $projecte->DataInici . '</p>';
            $html .= '<p>DataFinal: ' . $projecte->DataFinal . '</p>';
            $html .= '<p>Classificacio: ' . $projecte->Classificacio . '</p>';
            $html .= '<p>HoresAssignades: ' . $projecte->HoresAssignades . '</p>';
            $html .= '<p>PressupostAssignat: ' . $projecte->PressupostAssignat . '</p>';
            $html .= '<p>MaxNumInvestigadors: ' . $projecte->MaxNumInvestigadors . '</p>';
            $html .= '<p>Responsable: ' . $projecte->Responsable . '</p>';
            $html .= '<p>Investigacio: ' . $projecte->Investigacio . '</p>';
            $html .= '<p>Idioma: ' . $projecte->Idioma . '</p>';

            $dompdf->loadHtml($html);
            $dompdf->render();

            $dompdf->stream('projecte.pdf');
        } else {
            return back()->with('error', 'No se encontraron datos del proyecto');
        }
    }
}


