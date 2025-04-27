<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Network</title>

    @vite('resources/css/app.css')
</head>

<body>
    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <header>
        <nav>
            <h1><a href="{{ route('profiles.index') }}">
                    All profiles
                </a></h1>


            @guest
                <a href="{{ route('login') }}">
                    <button type="submit" class="btn my-4">login</button>
                </a>

                <a href="{{ route('show.register') }}">
                    <button type="submit" class="btn my-4">register</button>
                </a>
            @endguest

            @auth
                <span class="border-r-2 pr-2">
                    Hi there, {{ Auth::user()->name }}
                </span>
                <a href="{{ route('profiles.create') }}">
                    <button type="submit" class="btn my-4">Create New Profile</button>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn my-4">logout</button>
                </form>
            @endauth




        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>

</html>
