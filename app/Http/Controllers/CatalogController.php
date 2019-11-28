<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminata\Support\Facades\DB;
use App\Movie;

class CatalogController extends Controller{
    public function getIndex(){
        //$peliculas = Movie::all();
        $peliculas = Movie::all();
        return view('catalog.index',array('peliculas' => $peliculas));
    }
    public function getCreate(Request $request){
        return view('catalog.create');
    }
    public function getHome(){
        $peliculas = Movie::all();
        return view('catalog.index',array('peliculas' => $peliculas));
    }
    public function getShow($id) { 
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show',array('pelicula' => $pelicula)); 
    }
    public function getEdit(Request $request,$id) { 
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit',array('pelicula' => $pelicula)); 
    }

    public function postCreate(Request $request){
        $newMovie = new Movie;
        $newMovie->title = $request->input('title');
        $newMovie->year = $request->input('year');
        $newMovie->director = $request->input('director');
        $newMovie->poster = $request->input('poster');
        $newMovie->synopsis = $request->input('synopsis');
        $newMovie->save();
        notify('Pelicula creada con exito')->type('success');
        return redirect()->action('CatalogController@getIndex');
    }
    public function putEdit(Request $request,$id){
        $editMovie = Movie::FindOrFail($id);
        $editMovie->title = $request->input('title');
        $editMovie->year = $request->input('year');
        $editMovie->director = $request->input('director');
        $editMovie->poster = $request->input('poster');
        $editMovie->synopsis = $request->input('synopsis');
        $editMovie->save();
        notify('Pelicula editada con exito')->type('success');
        return redirect()->action('CatalogController@getShow',$id);
    }
    public function putRent(Request $request,$id){
        $ret=Movie::FindOrFail($id);
        $ret->rented=true;
        $ret->save();
        notify('Pelicula Rentada')->type('success');
        return redirect()->action('CatalogController@getShow',$id);

    }
    public function putReturn(Request $request,$id){
        $ret=Movie::FindOrFail($id);
        $ret->rented=false;
        $ret->save();
        notify('Pelicula Rentada')->type('success');
        return redirect()->action('CatalogController@getShow',$id);

    }
    public function deleteMovie(Request $request,$id){
        $ret=Movie::FindOrFail($id);
        $ret->delete();
        notify('Pelicula Eliminada')->type('success');
        return redirect()->action('CatalogController@getIndex',$id);

    }
}
