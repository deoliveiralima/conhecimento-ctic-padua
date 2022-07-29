<!-- Stored in resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <title>App Name - @yield('titulo')</title>
         <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">


    </head>
    <body>

        <div class="content">
            <div class="row">
                <div class="col">
                    <form action="" method="post" >
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="form-label"></label>
                            <input type="text" name="login" id="login" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary">Acessar</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

      
    </body>
</html