@extends('layouts.layout')
@section('titulo', 'Painel')
@section('conteudo')

<div class="row">


    <div class="col">
        <div class="mb-2">
            <a href="{{route('tutoriais.create')}}" class="btn btn-success"> Adicionar novo </a>
        </div>


    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Tutoriais</th>
        </tr>
        </thead>
        <tbody>
        @isset($tutoriais)
                @foreach($tutoriais as $tutorial)
                    <tr>
                        <td> <a href="{{route('tutoriais.edit', ['tutorial'=>$tutorial])}}"> {{$tutorial->titulo}} </a> </td>
                    
                    </tr>

                @endforeach
            @endisset
        
        </tbody>
    </table>


    </div>


    <div class="col">

    <div class="mb-2">
        <a href="{{route('categorias.create')}}" class="btn btn-success"> Adicionar novo </a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Categorias</th>
        </tr>
        </thead>
        <tbody>
        @isset($categorias)
                @foreach($categorias as $categoria)
                    <tr>
                        <td> <a href="{{route('categorias.edit', ['categoria'=>$categoria])}}"> {{$categoria->nome}} </a> </td>
                    
                    </tr>

                @endforeach
            @endisset
        
        </tbody>
    </table>

    </div>
</div>


@endsection