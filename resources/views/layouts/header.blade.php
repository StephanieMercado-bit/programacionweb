<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <title>La Especial</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="/">
                    <img id="logo-header" src="/img/logo.png" alt="La Especial Logo">
                </a>
            </div>
            
            @if (Auth::check() && Auth::user()->cliente)

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="funciones"><a href="/reservas">Reservas</a></div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="funciones"><a href="/carrito">Nuestra carta</a></div>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="perfil"><a href="/perfil">{{Auth::user()->name}}</a></div>
                    </li>
                </ul>    
                <!-- Botón del Carrito en la Cabecera -->
               <a href="/carrito/comprar" style="display: inline-flex; align-items: center; background-color: #ffe9a1; color: black; padding: 8px 16px; border-radius: 50px; text-decoration: none; font-weight: bold; margin-right: 20px; transition: 0.3s; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
               <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
                    Ver Carrito
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="cerrar"><a href="/cerrar-sesion">Cerrar sesión</a></div>
                    </li>    
                </ul>

            @elseif (Auth::check() && Auth::user()->admin)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="funciones"><a href="/admin">CRUD</a></div>
                    </li>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="cerrar"><a href="/cerrar-sesion">Cerrar sesión</a></div>
                    </li>    
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="funciones"><a href="/login">Reservar</a></div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="funciones"><a href="/carrito">Nuestra carta</a></div>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="perfil"><a href="/login">Iniciar Sesión</a></div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="perfil"><a href="/register">Registrarse</a></div>
                    </li>
            @endif
            </ul>
        </nav>
    </header>

@yield('contenido')

<footer>
        <ul id="footer-funciones">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Términos y condiciones</a></li>
            <li><a href="#">Conoce a nuestro equipo</a></li>
            <li><a href="#">Últimas novedades</a></li>
        </ul>

        <ul id="footer-redes">
            <li><a href="#" id="instagram" class="fa fa-instagram" aria-hidden="true"></a></li>
            <li><a href="#" id="facebook" class="fa fa-facebook" aria-hidden="true"></a></li>
            <li><a href="#" id="twitter" class="fa fa-twitter" aria-hidden="true"></a></li>
        </ul>
        
</footer>
</body>
</head>