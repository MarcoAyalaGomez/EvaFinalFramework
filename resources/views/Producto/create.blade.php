@extends('layouts.master') 
@section ('title', 'home')
@section('header')
@section('content')

<h2>Registrar Producto</h2>
<form action="/productos" method="POST">
    @csrf
<div class="mb-3">
    <label for="" class="form-label"> Código</label>
    <input type="text" name="codigo" id="codigo" class="form-control" required maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Nombre</label>
    <input type="text" name="nombre" id="nombre"class="form-control" required maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Categoría</label>
    <input type="text" name="categoria" id="categoria"class="form-control" required maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Sucursal</label>
    <select class="form-control" name="sucursal" id="sucursal" required>
        <option value="">Selecciona una sucursal</option>
        <option value="Maipú">Maipú </option>
        <option value="Puente Alto">Puente Alto </option>
        <option value="Cerrillos">Cerrillos </option>
    </select>
</div>
<div class="mb-3">
    <label for="" class="form-label"> Descripción</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" required maxlength="20">
    
</div>
<div class="mb-3">
    <label for="" class="form-label"> Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control"required maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Precio</label>
    <input type="number" name="precio" id="precio"class="form-control" required maxlength="20"> 
</div>

<a href="/productos" class="btn btn-secundary">Cancelar</a>
<button type="submit" class="btn btn-primary">Guardar</button>

</form>
@stop 