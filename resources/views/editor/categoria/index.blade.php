@extends('layouts.layout')

@section('conteudo')


<div class="mb-3">
    <a href="{{route('categorias.create')}}" class="btn btn-success"> Adicionar novo </a>
</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      @isset($categorias)
            @foreach($categorias as $categoria)
                <tr>
                    <td> <a href="{{route('categorias.show', ['categoria'=>$categoria])}}"> {{$categoria->nome}} </a> </td>
                   
                </tr>

            @endforeach
        @endisset
      
    </tbody>
  </table>

@endsection