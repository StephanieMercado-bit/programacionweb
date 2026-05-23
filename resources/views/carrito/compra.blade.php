<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/procesarCompra.css') }}">
<head>
<meta charset="UTF-8">

@extends('layouts.header')
@section('contenido')
<div class="procesar-compra-container">
<h1>Tu carrito</h1>
<br>
@if (Auth::check())
    @foreach ($productosCarrito as $productoCarrito)
        <p>{{ $productoCarrito->nombre }} x{{ $productoCarrito->pivot->cantidad}}...............................................${{ $productoCarrito->precio * $productoCarrito->pivot->cantidad}}</p>
    @endforeach
    <br>
    <h3>total: ${{ $precio }}</h3>
    <br>
   <form method="POST" action="/carrito/realizarCompra">
    @csrf
    <label for="direccion" style="font-family: 'Poppins', sans-serif;">Direccion de envio:</label>
    <input type="text" id="direccion" name="direccion" value="" placeholder="Escribe tu dirección de envío..." required style="padding: 5px; border-radius: 5px; border: 1px solid #ccc; width: 100%; max-width: 300px;">
    <input type="hidden" name="productos" value="{{ $productosCarrito }}">
    
    <br><br>
    
    <!-- Contenedor de los botones (Regresar y Comprar) -->
    <div style="display: flex; justify-content: center; gap: 20px; align-items: center; margin-top: 10px;">
        
        <!-- Botón de Regresar -->
        <a href="javascript:history.back()" style="background-color: #6b7280; color: white; padding: 14px 28px; text-decoration: none; font-weight: bold; font-family: 'Poppins', sans-serif; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
            REGRESAR
        </a>

        <!-- Botón Verde Original -->
        <button type="submit" class="button" style="margin: 0;">REALIZAR COMPRA</button>
        
    </div>
</form>
@endif
</div>
@endsection
</head>
<body>
</body>
</html>   