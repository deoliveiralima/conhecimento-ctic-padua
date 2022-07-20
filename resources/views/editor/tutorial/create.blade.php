@extends('layouts.layout')
@section('titulo', 'Novo guia/tutorial')
@section('conteudo')

    <div class="mb-5">
        @isset($tutorial)
            <form method="post" action="{{route('tutoriais.destroy', ['tutorial'=>$tutorial])}}">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endisset
    </div>

    

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

    <form id="form_tutorial" class="formulario" 
        action="{{isset($tutorial) ? route('tutoriais.update',['tutorial'=>$tutorial]) : route('tutoriais.store')}}" 
        method="post" 
    >


        @csrf

        @method(isset($tutorial) ? "PUT": "POST")

        <div class="card">
            <div class="card-header">
              <b> Cadastro de guia/tutorial </b>
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
                    <div class="col-2">Categoria:</div>
                
                    <div class="col-10">
                        <select name="categoria" id="categoria"  class="form-select categorias_select"  required>
                            <option value=""> Selecione a categoria </option>
                            @isset($categorias)
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{ !isset($tutorial) ? '' : ($tutorial->categoria_id == $categoria->id ? 'selected' : '')  }}>{{$categoria->nome}}</option>
                                @endforeach
                            @endisset
                            
                        </select>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-2"><label for="titulo" class="form-label">Título</label></div>
                    <div class="col-10"><input type="text" name="titulo" id="titulo" class="form-control" value="{{$tutorial->titulo ?? ''}}"></div>
                </div>
                
                <div class="row">
                    <div class="col-2"><label for="solucao" class="form-label">Solução</label></div>
                    <div class="col-10"> <textarea name="solucao" id="summernote" class="editor_texto"  >{{$tutorial->solucao ?? ''}}</textarea>  </div>
                </div>
        
            
        
                <button type="submit" class="btn btn-primary">Salvar</button>
    
          </div>

        

        
    </form>

    <script>
        $('#summernote').summernote({
            
        placeholder: '',
        tabsize: 5,
        height: 400,
        
        
        
       
      });


    </script>

@endsection