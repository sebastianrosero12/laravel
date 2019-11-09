<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function getHome()
    {
        $peliculas = Movie::all();
        return view('catalog.index',array('peliculas' => $peliculas));
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getShow($id) { 
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show',array('pelicula' => $pelicula)); 
    }
}
