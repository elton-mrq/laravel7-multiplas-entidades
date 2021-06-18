<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $qtd            = $request['qtd'] ?: 2;
        $page           = $request['page'] ?: 1;
        $buscar         = $request['buscar'];

        Paginator::currentPageResolver(function() use ($page){
            return $page;
        });

        if($buscar){
            $produtos = Produto::where('descricao', 'LIKE', $buscar.'%')->paginate($qtd);
        }else {
            $produtos = Produto::paginate($qtd);
        }

        $produtos = $produtos->appends(Request::capture()->except('page'));

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('produtos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarProduto($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        Produto::create($request->all());

        return redirect()->route('inicio')->with('status', 'Produto adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marca::all();
        $produto = Produto::find($id);

        return view('produtos.edit', compact('produto', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarProduto($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $produto = Produto::find($id);
        $dados   = $request->all();

        $produto->update($dados);

        return redirect()->route('produtos.index')->with('status', 'Produto atualizado com sucesso');
    }

    public function remover($id)
    {
        $produto = Produto::find($id);

        return view('produtos.remove', compact('produto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('status', 'Produto excluído com sucesso!');
    }

    protected function validarProduto($request)
    {
        $validator = Validator::make($request->all() ,[
            'descricao'     => 'required',
            'preco'         => 'required | numeric',
            'cor'           => 'required',
            'peso'          => 'required | numeric'
        ]);

        return $validator;
    }
}
