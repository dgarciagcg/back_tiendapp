<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    public function crearMarca(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'referencia' => 'required',
            ],
            [
                'nombre.required' => '* Rellena este campo',
                'referencia.required' => '* Rellena este campo',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $marcaNueva = new Marca();
        $marcaNueva->nombre = $request->nombre;
        $marcaNueva->referencia = $request->referencia;

        $response = $marcaNueva->save();

        return response()->json(["response" => $response], 200);
    }

    public function traerMarca($id_marca)
    {
        $marca = Marca::where('id_marca', $id_marca)->get();
        return response()->json($marca);
    }

    public function traerMarcas()
    {
        $marcas = Marca::get();
        return response()->json($marcas);
    }

    public function editarMarca(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'referencia' => 'required',
            ],

            [
                'nombre.required' => '* Rellena este campo',
                'referencia.required' => '* Rellena este campo',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $marca = Marca::findOrFail($request->id_marca);
        $marca->nombre = $request->nombre;
        $marca->referencia = $request->referencia;

        $response = $marca->save();

        return response()->json(["response" => $response], 200);
    }

    public function eliminarMarca($id_marca)
    {
        $marca = Marca::findOrFail($id_marca);
        $marca->delete();

        $res = response()->json(["response" => 'Se eliminó'], 200);
        return $res;
    }
}
