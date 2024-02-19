<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css',
    'resources/js/app.js'])
    <title>Document</title>
</head>
<style>

</style>
<body>
  <ul class="nav justify-content-center bg-secondary p-2">
    <li class="nav-item">
        <a class="nav-link active text-light" aria-current="page" href="#">Evenements</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Concert</a></li>
            <li><a class="dropdown-item" href="#">Foot</a></li>
            <li > <a href="" class="dropdown-item">Ticket Restau</a> </li>
            <li><a class="dropdown-item" href="#">Theatre</a></li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link text-light" href="#">Sponsore</a>
    </li>
    <li class="nav-item">
        @role('admin|Super Admin')
        <a class="nav-link text-light" href="{{ route('dashboard') }}">Dashboard</a>
        @endrole
    </li>
   @guest
   <li class="nav-item">
    <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
</li>
   @endguest
   @auth
   <form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>
   @endauth

  </ul>

</body>
</html>
