<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Sistema de Estudiantes')</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
  <!-- Google Fonts (Inter) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-indigo-50 min-h-screen flex flex-col">

  <!-- Header -->
  <header class="bg-indigo-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <a href="{{ url('/') }}" class="font-extrabold text-3xl hover:text-indigo-300 transition">
        🎓 Estudiantes
      </a>
      <nav class="space-x-6 text-lg">
        <a href="{{ route('estudiantes.index') }}" class="hover:text-indigo-300 transition font-semibold">Lista</a>
        <a href="{{ route('estudiantes.create') }}" class="hover:text-indigo-300 transition font-semibold">Agregar</a>
      </nav>
    </div>
  </header>

  <!-- Main content -->
  <main class="flex-grow container mx-auto p-8">
    @if(session('success'))
      <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg shadow-md text-center font-medium">
        ✅ {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg shadow-md">
        <strong class="font-semibold">¡Oops! Hay errores en el formulario:</strong>
        <ul class="list-disc list-inside mt-2">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-indigo-800 text-indigo-200 text-center py-4 mt-10 shadow-inner">
    &copy; {{ date('Y') }} - Mi Sistema de Estudiantes. Todos los derechos reservados.
  </footer>

</body>
</html>
