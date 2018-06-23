<?php

namespace Any\Http\Controllers;


use Any\Http\Requests\FabricaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Any\Fabrica;

class FabricaController extends Controller
{
  public function index() {
      $fabricas   = Fabrica::all();
      return view('app.fabrica.index')->with('fabricas',$fabricas);
  }

  public function edit($fabrica_id)  {
    $fabrica = Fabrica::find($fabrica_id);
    return response()->json($fabrica);
  }

  public function update(FabricaRequest $request,$fabrica_id) {
    $fabrica = Fabrica::find($fabrica_id);
    $fabrica->fabricante       = $request->fabricante;
    $fabrica->estado        = $request->estado;
    $fabrica->save();
    return response()->json(array('fabrica' => $fabrica));
  }

  public function store(FabricaRequest $request) {
    $fabrica = Fabrica::create($request->input());
    return response()->json(array('fabrica' => $fabrica));
  }

  public function destroy($fabrica_id) {
    $fabrica = Fabrica::destroy($fabrica_id);
    return response()->json(array('fabrica' => $fabrica));
  }
}
