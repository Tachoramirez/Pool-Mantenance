<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientes = Cliente::latest()->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'name' => 'required',
            'num_cel' => 'required|unique:clientes|min:10|max:10',
            'email' => 'required|unique:clientes',
        ]);

        Cliente::create(
            [
                
                'name' => $request->name,
                'num_cel' => $request->num_cel,
                'email' => $request->email,
                'vigencia' => True,
            ]
        );
        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente): View
    {
        
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([

            'name' => 'required',
            'num_cel' => 'required|min:10|max:10',
            'email' => 'required',
        ]);
        $cliente->update([
            'name' => $request->name,
                'num_cel' => $request->num_cel,
                'email' => $request->email,
                'vigencia' => $request->vigencia,
        ]);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->update([
            'vigencia'=>False,
        ]);
        return redirect()->route('clientes.index')->with('success', 'Cliente '.$cliente->name.' eliminado exitosamente');
    }
}
