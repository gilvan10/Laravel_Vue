<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
            ["titulo"=>"Home","url"=>route('home')]
        ]);
        return view('home',compact('listaMigalhas'));
    }
}
