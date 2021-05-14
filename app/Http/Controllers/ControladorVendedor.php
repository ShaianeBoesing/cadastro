<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Resource_;
use function GuzzleHttp\Promise\all;

class ControladorVendedor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $vends = Vendedor::all();
        return $vends->toJson();
    }

    public function indexView()
    {
        return view('/vendedores');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vends = new Vendedor();

        $vends->nome = $request->input('nome');
        $vends->cpf = $request->input('cpf');
        $vends->email = $request->input('email');
        $vends->categoria_id = $request->input('categoria_id');
        $vends->save();
        return $vends->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vend = Vendedor::find($id);
        if (isset($vend)){
            return json_encode($vend);
        }
        return response('Produto não encontrado', 404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vend = Vendedor::find($id);
        if(isset($vend)){

            $vend->nome = $request->input('nome');
            $vend->cpf = $request->input('cpf');
            $vend->email = $request->input('email');
            $vend->categoria_id = $request->input('categoria_id');
            $vend->save();
            return $vend->toJson();
        } else {
            return response('FAIL',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vend = Vendedor::find($id);
        if(isset($vend))
        {
            $vend->delete();
           return response('OK',200);
        }
        return response('Não encontrado',404);
    }
}
