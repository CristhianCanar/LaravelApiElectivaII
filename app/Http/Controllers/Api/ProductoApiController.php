<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    function index(){
        $productos = Producto::get();
        return response()->json($productos);
    }

    function store(Request $request){
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio
        ]);

        return response()->json($producto);
    }

    function update(Request $request, string $id){
        $producto = Producto::where('id_producto', $id)->update([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio
        ]);
        return response()->json($producto);
    }

    function destroy(string $id){
        $producto = Producto::where('id_producto', $id)->delete();
        return response()->json($producto);
    }
}
