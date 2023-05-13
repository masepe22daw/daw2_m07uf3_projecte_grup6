<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use Illuminate\Support\Facades\DB;
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

    return redirect()->route('investigador.create')->with('success', 'Investigador creado correctamente.');
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

        return redirect()->route('investigador.delete')->with('success', 'Investigador eliminado correctamente.');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect()->back()->with('error', 'Error al eliminar el investigador.');
    }
}


}
