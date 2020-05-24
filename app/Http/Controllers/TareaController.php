<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarTareaRequest;
use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('cors');
    }

    public function index()
    {
        $tareas = Tarea::where('user_id', auth()->user()->id)->get();
        return response()->json($tareas, 201);
    }

    public function store(GuardarTareaRequest $request)
    {
        $tarea = new Tarea();
        $tarea->description = $request->description;
        $tarea->user_id = auth()->id();
        $tarea->save();

        return response()->json($tarea, 201);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->description = $request->description;
        $tarea->save();

        return response()->json($tarea, 201);
    }

    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
    }
}
