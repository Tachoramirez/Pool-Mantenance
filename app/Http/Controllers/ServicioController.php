<?php

namespace App\Http\Controllers;

use App\Models\Alberca;
use App\Models\Estado;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
        $servicios = Servicio::select('servicios.*','users.name AS tecnico', 'albercas.nombre AS alberca', 'estados.estado')
        ->join('users', 'users.id', '=', 'servicios.id_usuario')
        ->join('albercas', 'albercas.id', '=', 'servicios.id_alberca')
        ->join('estados', 'estados.id', '=', 'servicios.id_estado')
        ->orderBy('servicios.id', 'desc')
        ->get();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        
        $usuarios = User::select('users.*')->where('users.vigencia', '=', 1)->get();
        $albercas = Alberca::select('albercas.*')->where('albercas.vigencia', '=', 1)->get();
        
        return view('servicios.create', compact('usuarios', 'albercas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id_usuario' => 'required',
            'id_alberca' => 'required',
            'nombre' => 'required',
            'ph' => 'required|numeric|min:1|max:14',
            'cloro' => 'required|numeric|min:0|max:2.5',
            'cepillo' => 'nullable|date',
            'filtro' => 'nullable|date',
        ]);
        if ($validate->fails()){
            //return response()->json(['success'=>false, 'errors'=>$validate->errors()]);
            return back()->withErrors($validate);
        }
        $result = Servicio::create([

            'id_usuario' => $request->id_usuario,
            'id_alberca' => $request->id_alberca,
            'nombre' => $request->nombre,
            'ph' => $request->ph,
            'cloro' => $request->cloro,
            'cepillo' => $request->cepillo,
            'filtro' => $request->filtro,
            'observaciones' => $request->observaciones,
            'id_estado' => 4,
        ]);
       
        //return response()->json($result);
       return redirect()->route('servicios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio): View
    {
        $usuarios = User::select('users.*')->get();
        $albercas = Alberca::select('albercas.*')->get();
        return view('servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio): View
    {
        $usuarios = User::select('users.*')->get();
        $albercas = Alberca::select('albercas.*')->get();
        $estados = Estado::select()->get();
        $currentUser = User::select('users.*')
            ->join('servicios', 'servicios.id_usuario', '=', 'users.id')
            ->where('servicios.id', '=', $servicio->id)
            ->get();
        $currentPool = Alberca::select('albercas.*')
            ->join('servicios', 'servicios.id_alberca', '=', 'albercas.id')
            ->where('servicios.id', '=', $servicio->id)
            ->get();
        $currentStatus = Estado::select('estados.*')
            ->join('servicios', 'servicios.id_estado', '=', 'estados.id')
            ->where('servicios.id', '=', $servicio->id)
            ->get();
        return view('servicios.edit', compact('servicio', 'usuarios', 'albercas', 'estados', 'currentUser', 'currentPool', 'currentStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio): RedirectResponse
    {
        $request-> validate([
            'id_usuario' => 'required',
            'id_alberca' => 'required',
            'nombre' => 'required',
            'ph' => 'required|numeric|min:1|max:14',
            'cloro' => 'required|numeric|min:0|max:2.5',
            'cepillo' => 'nullable|date',
            'filtro' => 'nullable|date',
        ]);

        $servicio->update([
            'id_usuario' => $request->id_usuario,
            'id_alberca' => $request->id_alberca,
            'nombre' => $request->nombre,
            'ph' => $request->ph,
            'cloro' => $request->cloro,
            'cepillo' => $request->cepillo,
            'filtro' => $request->filtro,
            'observaciones' => $request->observaciones,
            'id_estado' => $request->id_estado,
        ]);
        return redirect()->route('servicios.index')->with('success', 'Servicio'. $servicio->name .'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Servicio $servicio): RedirectResponse
    {
        $servicio->update([
            'id_estado'=> 3,
        ]);
        return redirect()->route('servicios.index')->with('success', 'Servicio '.$servicio->name.' eliminado exitosamente');
    }
}
