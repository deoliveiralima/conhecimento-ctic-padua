<!-- Stored in resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <title> @yield('titulo')</title>
         <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">



    <!-- SUMMERNOTE EDITOR DE TEXTO  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    






    </head>
    <body>
        <div class="link_login">
            @guest('editor')
            <a href="/login/editor"> login</a>
            @endguest

            @auth('editor')
            <a href="{{ route('logout.editor') }}"> Sair</a>
            @endauth
     

        </div>
       
        <div class="mt-5 ml-2">
            <div class="row" style=" margin-right: 15px;">
                <div class="col-2">
                    @section('sidebar')
                   
                        <nav>
                            <ul class="list-group">
                                <form action="{{route('publico.pesquisa')}}" method="POST">
                                    @csrf

                                    <div class="d-flex">
                                        
                                        <div class="p-2 flex-fill"><input type="text" name="termo" id="termo" placeholder="Pesquisar" class="form-control" /></div>
                                        <div class="p-2 flex-fill"><button type="submit" class="btn btn-secondary">Buscar</button></div>
                                        
                                    </div>


                                </form>
                                @guest('editor')
                                <li class="h1 inicio_link"> <a href="/publico/index"> Inicio </a></li>
                                @endguest

                                @auth('editor')
                                <li class="h1 inicio_link"> <a href="/edicao"> Inicio </a></li>
                                @endauth
                                
                                
                                @guest('editor')
                                @isset($tutoriais_sidebar)
                                    @foreach ($tutoriais_sidebar as $tutorial)
                                    <a href="{{route('publico.show', ['tutorial_url' => $tutorial->url])}}" class="link_sidebar"> <li class="list-group-item side_bar">  {{$tutorial->titulo}}</li>  </a>
                                    @endforeach
                                @endisset
                                @endguest
                                
                                    
                            </ul>
                        </nav>
                        @show
                    </div>
                   
                <div class="col-10">
                    <div class="conteudo">
                        @yield('conteudo')
                    </div>
                    
                </div>
            </div>

        </div>
    </body>
</html>