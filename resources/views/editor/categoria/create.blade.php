@extends('layouts.layout')
@section('titulo', 'Nova categoria')
@section('conteudo')

    <div class="mb-5">
        @isset($categoria)
            <form method="post" action="{{route('categorias.destroy', ['categoria'=>$categoria])}}" method="POST">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endisset
    </div>

    <form id="form_categoria" action="{{isset($categoria)? route('categorias.update', ['categoria'=>$categoria]) : route('categorias.store') }}" method="post" class="formulario">
        @csrf

        @method(isset($categoria) ? "PUT": "POST")

        <div class="card">
            <div class="card-header">
              <b> Cadastro de categoria </b>
            </div>
            <div class="card-body">
                
                <!--  MENSAGENS DE ERRO -->
                <div class="mensagens_erro">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
    
            <div class="row">
                <div class="col-2"><label for="nome" class="form-label">Nome:</label></div>
                <div class="col-10"><input type="text" name="nome" id="nome" class="form-control" value="{{$categoria->nome ?? ''}}"></div>
            </div>
       
    
            <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
          

        
    </form>

@endsection