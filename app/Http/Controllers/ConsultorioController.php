<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{

    public function index()
    {
        $consultorios =Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    }

    public function create()
    {
        return view('admin.consultorios.create');
    }

    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre'=> 'required',
            'ubicacion'=> 'required',
            'capacidad'=> 'required',
            'especialidad'=> 'required',
            'estado'=> 'required',
        ]);

        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se registo el consultorio con exito')
        ->with('icon', 'success');
    }

    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.show', compact('consultorio'));
    }

    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=> 'required',
            'ubicacion'=> 'required',
            'capacidad'=> 'required',
            'especialidad'=> 'required',
            'estado'=> 'required',
        ]);

        $consultorio = Consultorio::find($id);
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se actualizo el consultorio con exito')
        ->with('icon', 'success');
    }

    public function confirmDelete($id){
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }

    public function destroy($id)
    {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se elimino el consultorio con exito')
        ->with('icon', 'success');
    }
}
