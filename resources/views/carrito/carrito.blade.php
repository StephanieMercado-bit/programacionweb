<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/carta.css') }}">
<head>
<meta charset="UTF-8">

@extends('layouts.header')

@section('contenido')
<!-- Estilos y fuentes específicos para esta vista -->
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/carta.css') }}">

<!-- Menú para categoría -->
<div class="contenedor">
    <div id="categoria">
            <div class="sidebar">
                <ul>
                    <li><a href="#" data-categoria="">Todos los productos</a></li>
                    @foreach($categorias as $categoria)
                    <li><a href="#" data-categoria="{{ $categoria }}">{{ $categoria }}</a></li>
                    @endforeach
                </ul>
            </div>
    </div>

    <!-- Listado de productos -->
    <div class="productos">
                @foreach($productos as $producto)
                <div class="producto {{ $producto->tipo }}">
                <div class="item">
                
                <!-- Verificamos qué formato de imagen existe en la carpeta -->
            @php
             $nombreSlug = \Illuminate\Support\Str::slug($producto->nombre);
    
            if (file_exists(public_path('img/' . $nombreSlug . '.jpg'))) {
            $rutaImagen = asset('img/' . $nombreSlug . '.jpg');
            } elseif (file_exists(public_path('img/' . $nombreSlug . '.png'))) {
            $rutaImagen = asset('img/' . $nombreSlug . '.png');
            } else {
             $rutaImagen = asset('img/placeholder.png');
            }
            @endphp

            <!-- Mostramos la imagen encontrada o el cuadro gris por defecto -->
            <img src="{{ $rutaImagen }}" alt="{{ $producto->nombre }}">
                <div class="details">
                        <h5>{{ $producto->nombre }}</h5>
                        <h5 class="price">${{ $producto->precio }}</h5>
                </div>
                @if(Auth::check())
                    <form method="POST" action="/carrito/agregar-producto">
                        @csrf
                        <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                        <button type="submit" class="specialbutton">AÑADIR AL CARRITO</button>
                    </form>
                @endif
                </div>
                </div>
                @endforeach     
    </div>

    <!-- JavaScript para menú categoría -->
    <script>
        document.querySelectorAll('.sidebar a').forEach(function(enlace) {
            enlace.addEventListener('click', function(evento) {
                evento.preventDefault();
                var categoria = this.getAttribute('data-categoria');
                filtrarProductos(categoria);
            });
        });

        function filtrarProductos(categoria) {
            var productos = document.getElementsByClassName('producto');
            for (var i = 0; i < productos.length; i++) {
                if (categoria === '' || productos[i].classList.contains(categoria)) {
                productos[i].style.display = 'block';
                } else {
                productos[i].style.display = 'none';
                }
            }
        }
        var sidebar = document.querySelector('.sidebar');
        sidebar.style.display = 'block'; // mostrar la barra lateral
        filtrarProductos(''); // mostrar todos los productos por defecto
    </script>


    <!-- carrito lateral -->
    <!-- Carrito Lateral Mejorado -->
<div class="carrito">
    
    <div class="header-carrito" style="border-bottom: 2px solid #f3f4f6; margin-bottom: 20px; padding-bottom: 10px;">
        <h2 style="font-size: 1.5rem; font-weight: bold; color: #1f2937;">Tu pedido 🛒</h2>
    </div>

    @if (Auth::check())
        
        <div style="max-height: 400px; overflow-y: auto; padding-right: 10px;">
            @forelse($productosCarrito as $productoCarrito)
                <div class="carrito-producto" style="display: flex; flex-direction: column; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #f3f4f6;">
                    
                    <!-- Nombre del producto -->
                    <div style="font-weight: 600; margin-bottom: 10px; color: #374151; font-size: 0.95rem;">
                        {{ $productoCarrito->nombre }}
                    </div>

                    <!-- Controles de Cantidad y Precio -->
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <!-- Botones - / + -->
                        <div style="display: flex; align-items: center; gap: 12px; background: #f9fafb; padding: 6px 12px; border-radius: 10px; border: 1px solid #e5e7eb;">
                            
                            <form method="POST" action="/carrito/quitar-producto" style="margin: 0; display: flex;">
                                @csrf
                                <input type="hidden" name="id_producto" value="{{ $productoCarrito->id_producto }}">
                                <button type="submit" style="background: white; border: 1px solid #d1d5db; width: 28px; height: 28px; border-radius: 6px; font-weight: bold; cursor: pointer; color: #ef4444; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.05); hover:bg-gray-50;">-</button>
                            </form>
                            
                            <span style="font-weight: bold; min-width: 20px; text-align: center; color: #111827;">
                                {{ $productoCarrito->pivot->cantidad }}
                            </span>
                            
                            <form method="POST" action="/carrito/agregar-producto" style="margin: 0; display: flex;">
                                @csrf
                                <input type="hidden" name="id_producto" value="{{ $productoCarrito->id_producto }}">
                                <button type="submit" style="background: white; border: 1px solid #d1d5db; width: 28px; height: 28px; border-radius: 6px; font-weight: bold; cursor: pointer; color: #16a34a; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.05); hover:bg-gray-50;">+</button>
                            </form>
                            

                        </div>
                        

                        <!-- Subtotal -->
                        <div style="font-weight: 800; color: #111827;">
                            ${{ $productoCarrito->precio * $productoCarrito->pivot->cantidad }}
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 30px 0; color: #9ca3af;">
                    <svg style="width: 48px; height: 48px; margin: 0 auto 10px auto; opacity: 0.5;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <p>Tu carrito está vacío</p>
                </div>
            @endforelse
        </div>

        @if(count($productosCarrito) > 0)
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; margin-bottom: 20px; background: #fef2f2; padding: 15px; border-radius: 10px;">
                <h3 style="font-size: 1.1rem; font-weight: bold; color: #991b1b; margin: 0;">Total a pagar:</h3>
                <h3 style="font-size: 1.5rem; font-weight: 900; color: #dc2626; margin: 0;">${{ $precioCarrito }}</h3>
            </div>

            <button onclick="window.location.href='/carrito/comprar'" style="width: 100%; background-color: #16a34a; color: white; font-weight: bold; font-size: 1.1rem; padding: 14px; border-radius: 12px; border: none; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; box-shadow: 0 4px 6px -1px rgba(22, 163, 74, 0.4); transition: transform 0.2s;">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                Confirmar Orden
            </button>
        @endif

        @if (session('message'))
            <div style="margin-top: 15px; padding: 12px; background-color: #dcfce3; color: #166534; border-radius: 8px; text-align: center; font-size: 0.9rem; border: 1px solid #bbf7d0;">
                {{ session('message') }}
            </div>
        @endif

    @else
        <div style="text-align: center; padding: 30px 0;">
            <p style="color: #6b7280; margin-bottom: 15px;">Inicia sesión para empezar a agregar tus hamburguesas favoritas.</p>
            <a href="/login" style="display: inline-block; background: #1f2937; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">Iniciar Sesión</a>
        </div>
    @endif
</div>
</div>
@endsection
</head>
<body>
</body>
</html>   