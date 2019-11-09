<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use Illuminata\Support\Facades\DB;
use App\Movie;

class CatalogController extends Controller{
    public function getIndex(){
        //$peliculas = Movie::all();
        $peliculas = Movie::all();
        return view('catalog.index',array('peliculas' => $peliculas));
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getHome(){
        return view('home');
    }
    public function getShow($id) { 
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show',array('pelicula' => $pelicula)); 
    }
    public function getEdit($id) { 
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit',array('pelicula' => $pelicula)); 
    } 
}
