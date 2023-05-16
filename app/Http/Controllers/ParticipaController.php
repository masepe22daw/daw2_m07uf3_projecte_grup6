<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participa;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

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

   
    $Passaport = $request->input('Passaport');
    $CodiProj = $request->input('CodiProj');

   
    $result = Participa::where('Passaport', $Passaport)
        ->where('CodiProj', $CodiProj)
        ->delete();

   
    if ($result) {
        return redirect()->route('participa.delete')->with('success', 'Registro borrado exitosamente.');
    } else {
        return redirect()->route('participa.delete')->with('error', 'No se encontró el registro.');
    }
}


public function showUpdateForm()
{
    return view('participa.edit');
}

public function update(Request $request)
{
    $request->validate([
        'Passaport' => 'required',
        'CodiProj' => 'required',
        'campo' => 'required',
        'valor' => 'required',
    ]);

    $Passaport = $request->input('Passaport');
    $CodiProj = $request->input('CodiProj');
    $campo = $request->input('campo');
    $valor = $request->input('valor');

    $result = Participa::where('Passaport', $Passaport)
        ->where('CodiProj', $CodiProj)
        ->update([$campo => $valor]);

    if ($result) {
        return redirect()->route('participa.edit')->with('success', 'Registro modificado exitosamente.');
    } else {
        return redirect()->route('participa.edit')->with('error', 'No se encontró el registro.');
    }
}

public function search(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'Passaport' => 'required',
            'CodiProj' => 'required',
        ]);

        try {
            $Passaport = $request->input('Passaport');
            $CodiProj = $request->input('CodiProj');

            $participa = Participa::where('Passaport', $Passaport)
                ->where('CodiProj', $CodiProj)
                ->firstOrFail();

            return view('participa.search', compact('participa'));
        } catch (\Exception $e) {
            return view('participa.search')->with('error', 'No se encontró ningún registro con las claves proporcionadas.');
        }
    } else {
        return view('participa.search');
    }
}


public function showPdfForm()
{
    return view('participa.pdf-form');
}
public function generarPDF(Request $request)
{
    $passaport = $request->input('passaport');
    $codiProj = $request->input('codiProj');

    $participacion = DB::table('PARTICIPA')
        ->where('Passaport', $passaport)
        ->where('CodiProj', $codiProj)
        ->first();

    if ($participacion) {
        $dompdf = new Dompdf();

        $html = '<h1>Informació de la Participació</h1>';
        $html .= '<p>Passaport: ' . $participacion->Passaport . '</p>';
        $html .= '<p>CodiProj: ' . $participacion->CodiProj . '</p>';
        $html .= '<p>DataInici: ' . $participacion->DataInici . '</p>';
        $html .= '<p>DataFinal: ' . $participacion->DataFinal . '</p>';
        $html .= '<p>Retribucio: ' . $participacion->Retribucio . '</p>';
        $html .= '<p>ParticipacioProrrogable: ' . $participacion->ParticipacioProrrogable . '</p>';
        $html .= '<p>ParticipacioPublicacio: ' . $participacion->ParticipacioPublicacio . '</p>';

        $dompdf->loadHtml($html);
        $dompdf->render();

        $dompdf->stream('participacio.pdf');
    } else {
        return back()->with('error', 'No se encontraron datos de la participación');
    }
}
}
