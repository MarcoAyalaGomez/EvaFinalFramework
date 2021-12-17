@extends('layouts.master') 
@section ('title', 'home')
@section('header')
<div class="container">
    <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion de Stock</a>

        </div>
    </nav>
@stop
@section('content')

<hr>
<form class="row g-3" action="login" method="POST">
  @csrf
<div class="mb-3">
  
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
  <input type="password" class="form-control" id="password" name="password">
</div>


<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Iniciar sesion</button>
  </div>
</form>
<hr>
@stop 