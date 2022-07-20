@extends('layouts.layout')
@section('titulo', 'Novo guia/tutorial')
@section('conteudo')


<div class="mb-2">
    <a href="{{route('tutoriais.create')}}" class="btn btn-success"> Adicionar novo </a>
</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Titulo</th>
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

@endsection