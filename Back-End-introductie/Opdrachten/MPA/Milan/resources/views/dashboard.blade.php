@extends("layouts.master")

@section("content")

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold mb-4">Welkom op je Dashboard, {{ Auth::user()->name }}!</h1>
        <p class="text-lg">Hier kun je je account beheren en meer functies verkennen.</p>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="text-blue-500 hover:underline">
           Uitloggen
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</body>
</html>
@endsection


