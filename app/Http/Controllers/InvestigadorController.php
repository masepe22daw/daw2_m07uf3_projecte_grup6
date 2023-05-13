<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;


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

    return redirect()->route('investigador.create')->with('success', 'Investigador creat correctament.');
}

public function showDeleteForm()
{
    return view('investigador.delete');
}

public function destroy(Request $request)
{
    $request->validate([
        'passaport' => 'required|exists:INVESTIGADORS,Passaport',
    ]);

    $passaport = $request->input('passaport');

    DB::beginTransaction();

    try {
        $investigador = Investigador::findOrFail($passaport);
        $investigador->delete();

        // Opcional: También puedes eliminar las entradas asociadas en la tabla intermedia si es necesario.
        DB::table('PARTICIPA')->where('Passaport', $passaport)->delete();

        DB::commit();

        return redirect()->route('investigador.delete')->with('success', 'Investigador eliminat correctament.');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect()->back()->with('error', 'Error al eliminar el investigador.');
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

public function showSearchForm()
{
    return view('investigador.search');
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

    public function generarPDF($passaport)
{
    $request->validate([
        'passaport' => 'required',
    ]);

    try {
        $passaport = $request->input('passaport');
        $investigador = Investigador::findOrFail($passaport);

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Renderiza la vista del PDF
        $pdfContent = view('investigador.pdf', compact('investigador'))->render();

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($pdfContent);

        // Renderiza el PDF
        $dompdf->render();

        // Genera el nombre del archivo PDF
        $filename = 'investigador_' . $investigador->Passaport . '.pdf';

        // Descarga el PDF al navegador del usuario
        return $dompdf->stream($filename);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al generar el PDF del investigador.');
    }
}

}
