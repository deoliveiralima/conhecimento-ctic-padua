@extends('layouts.layout')

@section('conteudo')

<article>
   
    @isset($tutorial)
    @section('titulo', $tutorial->titulo)
    <div class="card">
        <div class="card-header">
            <h1 class="titulo_tutorial">{{$tutorial->titulo}} </h1>
        </div>
        <div class="card-body">
            <p>  {!! $tutorial->solucao !!}  </p> 
        </div>
      </div>
        
        

       
     


    @endisset


</article>
    


@endsection