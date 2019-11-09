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
                    Pelicula actualmente disponible
               @else
                    Pelicula actualmente alquilada
               @endif
          </p>
          <br>
          <button type="button" class="btn btn-danger">Devolver Pelicula</button>
          <a type="button" href="{{ url('/catalog/edit/'.$pelicula->id)}}" role="button" class="btn btn-warning">Editar Pelicula</a>
          <a type="button" href="{{ url('/catalog')}}" role="button" ><b><</b> Volver al listado</a>
     </div>
</div>
@stop