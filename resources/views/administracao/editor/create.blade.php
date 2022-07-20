@extends('administracao.layout')

@section('conteudo')
<div class="form_cadastro_usuario">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                Adicionar novo editor
                
            </div>

            <div class="col">
            
                @isset($editor)
                <form action="{{route('editores.destroy', ['editor'=>$editor])}}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger"> Excluir </button>
                
                </form>
                
                @endisset
                
            </div>
        </div>
    </div>
    <div class="card-body">
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

        
        <form action="{{isset($editor)? route('editores.update',['editor'=>$editor]) : route('editores.store')}}" method="post">
            @csrf

            @method(isset($editor)? 'put' :'post')
    
            <div class="row mb-2">
                <div class="col"><label for="nome" class="form-label" > Nome: </label> </div>
                <div class="col"> <input type="text" name="nome" id="nome" class="form-control" value="{{$editor->nome ?? ''}}" required/> </div>
            </div>
            <div class="row mb-2">
                <div class="col"><label for="login" class="form-label" > Login: </label> </div>
                <div class="col"> <input type="text" name="login" id="login" class="form-control" value="{{$editor->login ?? ''}}" required/> </div>
            </div>
    
            <div class="row mb-2">
                <div class="col"><label for="senha" class="form-label" > Senha: </label> </div>
                <div class="col"> <input type="password" name="senha" id="senha" class="form-control"/> </div>
            </div>
    
            <div class="row mb-2">
                <div class="col"><label for="repete_senha" class="form-label" > Repetir senha: </label> </div>
                <div class="col"> <input type="password" name="repete_senha" id="repete_senha" class="form-control"/> </div>
            </div>
    
            <div class="row">
                
                <div class="col"> <button type="submit" class="btn btn-success"> Salvar</button></div>
            </div>
        </form>
  </div>
</div>
@endsection