<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Alberca;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\RedirectResponse;

class AlbercaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $albercas = Alberca::select('albercas.*', 'clientes.name')
        ->join('clientes', 'clientes.id', '=', 'albercas.id_cliente')
        ->get();
        return view('albercas.index', compact('albercas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::select('*')->where('clientes.vigencia', '=', 1)->get();
        return view('albercas.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'id_cliente' => 'required',
            'nombre' => 'required',
        ]);

        Alberca::create([
                
            'id_cliente' => $request->id_cliente,
            'nombre' => $request->nombre,
            'vigencia' => True,
        ]);
        return redirect()->route('albercas.index')->with('success', 'Alberca registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alberca $alberca): View
    {
        $cliente = Cliente::select('clientes.name as cliente')
            ->join('albercas', 'clientes.id', '=', 'albercas.id_cliente')
            ->where('albercas.id', $alberca->id)
            ->first();

        $finished = Servicio::where('id_alberca', $alberca->id)
        ->where('id_estado', 4)
        ->count();

        return view('albercas.show', compact('cliente', 'alberca', 'finished'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alberca $alberca): View
    {   
        $clientes = Cliente::select()->get();
        $currentClient = Cliente::select('clientes.*')
            ->join('albercas', 'albercas.id_cliente', '=', 'clientes.id')
            ->where('albercas.id', '=', $alberca->id)
            ->get();
        return view('albercas.edit', compact('alberca', 'clientes', 'currentClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alberca $alberca): RedirectResponse
    {
        $request->validate([

            'id_cliente' => 'required',
            'nombre' => 'required',
        ]);

        $alberca->update([
            'id_cliente' => $request->id_cliente,
            'nombre' => $request->nombre,
            'vigencia' => $request->vigencia,
        ]);
        return redirect()->route('albercas.index')->with('success', 'Alberca actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alberca $alberca): RedirectResponse
    {
        $alberca->update(
            [
                'vigencia'=> False,
            ]
            
        );
        return redirect()->route('albercas.index')->with('success', 'Alberca '.$alberca->name.' eliminada exitosamente');
    }
}
