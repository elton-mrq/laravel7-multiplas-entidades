<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use App\Produto;

class MarcaController extends Controller
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
            $marcas = Marca::where('nome', 'LIKE', $buscar.'%')->paginate($qtd);
        }else {
            $marcas = Marca::paginate($qtd);
        }

        $marcas = $marcas->appends(Request::capture()->except('page'));

        return view('marcas.index', compact('marcas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarMarca($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        Marca::create($request->all());

        return redirect()->route('marcas.index')->with('status', 'Marca adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);
         return view('marcas.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);

        return view('marcas.edit', compact('marca'));
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
        $validator = $this->validarMarca($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $marca = Marca::find($id);
        $dados = $request->all();
        $marca->update($dados);

        return redirect()->route('marcas.index')->with('status', 'Marca atualizada com sucesso!');
    }

    public function remover($id)
    {
        $marca = Marca::find($id);

        return view('marcas.remove', compact('marca'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Produto::where('marca_id', '=', $id)->count()){
            $msg = "Não é possível remover esta marca.
                    O(s) produto(s) com id: ";
            $produtos = Produto::where('marca_id', '=', $id)->get();
            foreach($produtos as $produto){
                $msg .= $produto->id . ' ';
            }
            $msg .= ', está(estão) relacionado(s) com esta marca.';
            return redirect()->route('marcas.remover', $id)->with('status', $msg);
        }

        Marca::find($id)->delete();
        return redirect()->route('marcas.index')->with('status', 'Marca removida com sucesso!');
    }

    public function validarMarca($request)
    {
        $validator = Validator::make($request->all(), [
            'nome'      => 'required'
        ]);

        return $validator;
    }

    public function produtos($id)
    {
        $marca = Marca::find($id);
        return view('marcas.produtos', compact('marca'));
    }
}
