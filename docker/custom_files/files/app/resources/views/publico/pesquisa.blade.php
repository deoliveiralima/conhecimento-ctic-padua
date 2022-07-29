@extends('layouts.layout')

@section('conteudo')

<ul class="list-group">
    @isset($tutoriais)

    @foreach($tutoriais as $tutorial)
        <li class="list-group-item"><a href="/publico/{{$tutorial->id}}" > {{$tutorial->titulo}}  </a></li>
       

    @endforeach

    @endisset
</ul>
    

@endsection