@extends('layouts.master') 
@section ('title', 'home')
@section('header')
@section('content')
<form action="/productos/{{$producto->id}}" method="POST">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="" class="form-label"> Código</label>
    <input type="text" name="codigo" id="codigo" class="form-control" value="{{$producto-> codigo}}" maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$producto-> codigo}}" maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Categoria</label>
    <input type="text" name="categoria" id="categoria" class="form-control" value="{{$producto-> codigo}}" maxlength="10">
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
    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$producto-> descripcion}}" maxlength="20">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$producto-> cantidad}}" maxlength="10">
</div>
<div class="mb-3">
    <label for="" class="form-label"> Precio</label>
    <input type="number" name="precio" id="precio"class="form-control" value="{{$producto-> precio}}" maxlength="20">
</div>
<a href="/productos" class="btn btn-secundary">Cancelar</a>
<button type="submit" class="btn btn-primary">Guardar</button>

</form>
@stop