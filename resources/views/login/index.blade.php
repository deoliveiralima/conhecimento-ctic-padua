<!-- Stored in resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <title>Login</title>
         <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">


    </head>
    <body>

        <div class="container">
            <div class="form-login">
                <div class="row">
                    <div class="col">
                        <form action="/login/{{$url}}" method="post" >
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                  <b> Login como {{$url}} </b>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="login" class="form-label">Login</label>
                                        <input type="text" name="login" id="login" class="form-control">
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
        
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-secondary">Acessar</button>
                                    </div>
                                  
                                </div>
                              </div>


                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

      
    </body>
</html