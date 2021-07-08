<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Market-Place</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
        <li class="nav-item">
          <a class="nav-link @if(request()->is('admin/stores*')) active @endif" aria-current="page" href="{{route('admin.stores.index')}}">Lojas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->is('admin/products*')) active @endif" href="{{route('admin.products.index')}}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->is('admin/categories*')) active @endif" href="{{route('admin.categories.index')}}">Categorias</a>
        </li>
      </ul>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          
          <!--<li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li> -->

          <a class="nav-link active" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                <form action="{{route('logout')}}" class="logout" method="POST" style="display: none">
                      @csrf
                </form>
                @endauth
        </ul>
      </div>

      </div>
    </div>
  </nav>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>