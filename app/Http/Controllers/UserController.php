<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usuarios = User::latest()->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'name' => 'required',
            'num_cel' => 'required',
            'email' => 'required',
        ]);

        User::create(
            [
                
                'name' => $request->name,
                'num_cel' => $request->num_cel,
                'email' => $request->email,
                'password' =>Hash::make($request->name. 123),
                'vigencia' => True,
            ]
        );
        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario): View
    {
        $pend = Servicio::where('id_usuario', $usuario->id)
        ->where('id_estado', 1)
        ->count();
        $process = Servicio::where('id_usuario', $usuario->id)
        ->where('id_estado', 2)
        ->count();
        $canceled = Servicio::where('id_usuario', $usuario->id)
        ->where('id_estado', 3)
        ->count();
        $finished = Servicio::where('id_usuario', $usuario->id)
        ->where('id_estado', 4)
        ->count();

        return view('usuarios.show', compact('usuario', 'pend', 'process', 'canceled', 'finished'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario): View
    {     
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario): RedirectResponse
    {
        $request->validate([

            'name' => 'required',
            'num_cel' => 'required',
            'email' => 'required',
        ]);

        $usuario->update([
            'name' => $request->name,
                'num_cel' => $request->num_cel,
                'email' => $request->email,
                'vigencia' => $request->vigencia,
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario): RedirectResponse
    {
        $usuario->update([
            'vigencia'=>False,
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario '.$usuario->name.' eliminado exitosamente');
    }
}
