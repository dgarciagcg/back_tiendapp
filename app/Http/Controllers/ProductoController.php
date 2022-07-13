<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function crearProducto(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'talla' => 'required',
                'observaciones' => 'required',
                'id_marca' => 'required',
                'cantidadInventario' => 'required',
                'fechaEmbarque' => 'required',
            ],

            [
                'nombre.required' => '* Rellena este campo',
                'talla.required' => '* Rellena este campo',
                'observaciones.required' => '* Rellena este campo',
                'id_marca.required' => '* Rellena este campo',
                'cantidadInventario.required' => '* Rellena este campo',
                'fechaEmbarque.required' => '* Rellena este campo',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $productoNuevo = new Producto();
        $productoNuevo->nombre = $request->nombre;
        $productoNuevo->talla = $request->talla;
        $productoNuevo->observaciones = $request->observaciones;
        $productoNuevo->id_marca = $request->id_marca;
        $productoNuevo->cantidadInventario = $request->cantidadInventario;
        $productoNuevo->fechaEmbarque = $request->fechaEmbarque;

        $response = $productoNuevo->save();

        return response()->json(["response" => $response], 200);
    }

    public function traerProducto($id_producto)
    {
        $producto = Producto::where('id_producto', $id_producto)->get();
        return response()->json($producto);
    }

    public function traerProductos()
    {
        $productos = DB::table('productos')
            ->join('marcas', 'productos.id_marca', '=', 'marcas.id_marca')
            ->get([
                'productos.*',
                'marcas.nombre as nombreMarca'
            ]);
        return response()->json($productos);
    }

    public function editarProducto(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'talla' => 'required',
                'observaciones' => 'required',
                'id_marca' => 'required',
                'cantidadInventario' => 'required',
                'fechaEmbarque' => 'required',
            ],

            [
                'nombre.required' => '* Rellena este campo',
                'talla.required' => '* Rellena este campo',
                'observaciones.required' => '* Rellena este campo',
                'id_marca.required' => '* Rellena este campo',
                'cantidadInventario.required' => '* Rellena este campo',
                'fechaEmbarque.required' => '* Rellena este campo',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $producto = Producto::findOrFail($request->id_producto);
        $producto->nombre = $request->nombre;
        $producto->talla = $request->talla;
        $producto->observaciones = $request->observaciones;
        $producto->id_marca = $request->id_marca;
        $producto->cantidadInventario = $request->cantidadInventario;
        $producto->fechaEmbarque = $request->fechaEmbarque;

        $response = $producto->save();

        return response()->json(["response" => $response], 200);
    }

    public function eliminarProducto($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $producto->delete();

        $res = response()->json(["response" => 'Se eliminó'], 200);
        return $res;
    }
}
