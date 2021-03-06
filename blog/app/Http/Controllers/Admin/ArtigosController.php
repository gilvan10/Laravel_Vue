<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artigo;
use Illuminate\Support\Facades\DB;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //transformação para json para o javascript trabalhar
        $listaMigalhas = json_encode([
            ["titulo"=>"Admin","url"=>route('admin')],
            ["titulo"=>"Lista de Artigos","url"=>""]

        ]);

        /*
        //Antes estava o Artigo::all()
        $listaArtigos = Artigo::select('id','titulo','descricao','user_id','data')->paginate(5);
        //Está levando o nome dos autores através do servidor mas precisa da instrução de cima.
        foreach ($listaArtigos as $key => $value) {
            //Uma forma buscando o usuario pelo user_id e trazendo o nome vinculado;
            $value->user_id = \App\User::find($value->user_id)->name;
            //Outra forma de relacionamentos não precisa importar classe App\User
            //$value->user_id = $value->user->name;
            //unset($value->user);foi retirado o objeto ususario mas deixou o nome evitando erros

        }
        */
        //uma forma de resolver através do banco de dados para colocar o nome do autor na lista de artigos.
        /*
        $listaArtigos = DB::table('artigos')
                        ->join('users','users.id','=','artigos.user_id')
                        ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                        ->whereNull('deleted_at')
                        ->paginate(5);

        */
        $listaArtigos = Artigo::listaArtigos(5);

        return view('admin.artigos.index',compact('listaMigalhas','listaArtigos'));
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
        //dd($request->all());
        $data = $request->all();

        //validação
        $validacao = \Validator::make($data,[
            "titulo" => "required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required",
        ]);

        if($validacao->fails()){
            //back() retorna para a pagina anterior, withErros mostras erros
            //withInput coloca os dados que foram digitados no formulario;
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Artigo::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Artigo::find($id);
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
        //dd($request->all());
        $data = $request->all();

        //validação
        $validacao = \Validator::make($data,[
            "titulo" => "required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required",
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Artigo::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::find($id)->delete();
        return redirect()->back();
    }
}
