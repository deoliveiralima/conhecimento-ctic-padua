@extends('administracao.layout')

@section('conteudo')

<div class="container">
    <div class="row tabelas_usuarios">
        <div class="col">
      

                <a href="{{route('editores.create')}}" class="btn btn-success"> Adicionar editor</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuário</th>
                    </tr>
                </thead>
                <tbody> 
                    @isset($editores)
                    @foreach ($editores as $editor)
                        
                    
                    <tr>
                        <td> <a href="{{route('editores.edit', ['editor'=>$editor])}}"> {{$editor->nome}} </a> </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            
       

        </div>

        <div class="col">
            <div class="">
                <a href="{{route('admins.create')}}" class="btn btn-success"> Adicionar admin </a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Admins</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @isset($admins)
                        @foreach ($admins as $admin)
                            
                        
                        <tr>
                            <td> <a href="{{route('admins.edit', ['admin'=>$admin])}}"> {{$admin->nome}} </a> </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                </div>
            
        </div>
    </div>
</div>


@endsection