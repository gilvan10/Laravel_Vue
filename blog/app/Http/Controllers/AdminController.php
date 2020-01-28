<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //json_encode foi necessario para trabalhar com javascript
        $listaMigalhas = json_encode([
            ["titulo"=>"Admin","url"=>route('admin')]
        ]);
        $totalArtigos = Artigo::count();
        $totalUsuarios = User::count();
        $totalAutores = User::where('autor','=','S')->count();

        return view('admin',compact('listaMigalhas','totalArtigos','totalUsuarios','totalAutores'));
    }
}
