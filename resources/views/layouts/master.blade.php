<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <title>Evaluación</title>
</head>
<body>
    @section ('header')
    <div class="container">
    <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Gestion de Stock</a>

            <ul class="nav">
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/productos/create">Registrar producto</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/productos">Administrar productos</a>
                </li>      
                <li class="nav-item">
                    <!--Boton Buscador de Productos -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="buscar" type="search" placeholder="Buscador" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </li>
                <li class="nav-item">
                    <form action="/login" method="POST">
                    @csrf
                    @method('put')
                   <button class="nav-link" type="submit">Cerrar Sesión</button>
                   </form>
                </li>
                

            </ul>
        </div>
    </nav>
    @show
    <div>
        @yield('content')
        
    </div>
    @section('footer')
    </div> 

</body>
</html>
    @show
</body>
</html>