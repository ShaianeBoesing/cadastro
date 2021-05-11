<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;


class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Produto::all();
        $cats = Categoria::all();
        return view("produtos", compact('prods', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view("novoproduto", compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prods = new Produto();
        $prods->nome = $request->input('nomeProduto');
        $prods->estoque = $request->input('estoqueProduto');
        $prods->preco = $request->input('precoProduto');
        $prods->categoria_id = $request->input('categoriaProduto');
        $prods->save();
        return redirect(route("produtos.index"));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prods = Produto::find($id);
        $cats = Categoria::orderBy('nome', 'asc')->get();
        return view('editaproduto', compact('prods', 'cats'));
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
        $prods = Produto::find($id);
        $prods->nome = $request->input('nomeProduto');
        $prods->estoque = $request->input('estoqueProduto');
        $prods->preco = $request->input('precoProduto');
        $prods->categoria_id = $request->input('categoriaProduto');
        $prods->save();
        return redirect(route("produtos.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prods = Produto::find($id);
        $prods->delete();
        return redirect(route("produtos.index"));

    }
}
