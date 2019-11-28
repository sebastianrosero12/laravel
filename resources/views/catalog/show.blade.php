@extends('layouts.master')
 
@section('content')
<div class="row">
     <div class="col-sm-4">
          <img src="{{$pelicula->poster}}" style="height:400px"/>
     </div>
     <div class="col-sm-8">
          <h2>Titulo: {{$pelicula->title}}</h2>
          <h3>Año: {{$pelicula->year}}</h3>
          <h3>Director: {{$pelicula->director}}</h3>
          <p><b>Resumen:</b> {{$pelicula->synopsis}}</p>
          <p><b>Estado:</b> 
               @if($pelicula['rented'])
                    Pelicula actualmente alquilada
                    <form action="{{action('CatalogController@putReturn', $pelicula->id)}}" method="POST" style="display:inline">
                       {{ method_field('PUT') }} {{ csrf_field() }} 
                       <button type="submit" class="btn btn-primary" style="display:inline"> Devolver película </button>
                    </form> 
               @else
                    Pelicula actualmente disponible
                    <br>
                    <form action="{{action('CatalogController@putRent', $pelicula->id)}}" method="POST" style="display:inline">
                         {{ method_field('PUT') }} {{ csrf_field() }} 
                         <button type="submit" class="btn btn-primary" style="display:inline">Alquilar película </button>
                    </form>
               @endif
          <a type="button" href="{{ url('/catalog/edit/'.$pelicula->id)}}" role="button" class="btn btn-warning">Editar Pelicula</a>
          <a type="button" href="{{ url('/catalog')}}" role="button" ><b><</b> Volver al listado</a>
     </p>
     </div>        
</div>
<div class="text-center">
          <br>
          <br>
          <br>
     <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}" method="POST" style="display:inline">
               {{ method_field('DELETE') }} {{ csrf_field() }} <button type="submit" align=center class="btn btn-danger" style="display:inline"> Eliminar pelicula </button>
     </form>      
</div>  
@stop