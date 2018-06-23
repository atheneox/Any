<?php

namespace Any\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Any\Http\Requests\ProductoRequest;
use Illuminate\Http\Response;
use Any\Producto;
use Any\Fabrica;

class ProductoController extends Controller
{

  public function index() {
  $productos  = Producto::all();
  $fabricas   = Fabrica::all();

  return view('app.producto.index')->with('productos',$productos)
                                  ->with('fabricas',$fabricas);

  }

public function edit($producto_id)  {
$producto = Producto::find($producto_id);
return response()->json($producto);
}

public function update(ProductoRequest $request,$producto_id) {
$producto = Producto::find($producto_id);
$producto->fabrica_id     = $request->fabrica_id;
$producto->producto       = $request->producto;
$producto->codigobarra    = $request->codigobarra;
$producto->codigoproducto = $request->codigoproducto;
$producto->descripcion    = $request->descripcion;
$producto->estado         = $request->estado;
$producto->save();
return response()->json(array('producto' => $producto));
}

public function store(ProductoRequest $request) {
$producto = Producto::create($request->input());
return response()->json(array('producto' => $producto));
}

public function destroy($producto_id) {
$producto = Producto::destroy($producto_id);
return response()->json($producto);
}

}
