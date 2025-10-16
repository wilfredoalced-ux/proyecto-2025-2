<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>➕ Nuevo Estudiante</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-blue-200 min-h-screen flex items-center justify-center py-10">

  <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-2xl border border-indigo-200">
    <h1 class="text-3xl font-extrabold text-center text-indigo-700 mb-6">➕ Registrar Estudiante</h1>

    {{-- Mostrar errores --}}
    @if ($errors->any())
      <div class="bg-red-100 border border-red-500 text-red-800 px-4 py-3 rounded mb-5">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="codigo" class="block font-semibold text-blue-900 mb-1">🆔 Código:</label>
        <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}"
               class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300"
               placeholder="Ejemplo: EST001" required>
      </div>

      <div>
        <label for="nombres" class="block font-semibold text-blue-900 mb-1">👤 Nombres:</label>
        <input type="text" name="nombres" id="nombres" value="{{ old('nombres') }}"
               class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300"
               placeholder="Ejemplo: Juan Carlos" required>
      </div>

      <div>
        <label for="pri_ape" class="block font-semibold text-blue-900 mb-1">🧾 Primer Apellido:</label>
        <input type="text" name="pri_ape" id="pri_ape" value="{{ old('pri_ape') }}"
               class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300"
               placeholder="Ejemplo: Pérez" required>
      </div>

      <div>
        <label for="seg_ape" class="block font-semibold text-blue-900 mb-1">🧾 Segundo Apellido:</label>
        <input type="text" name="seg_ape" id="seg_ape" value="{{ old('seg_ape') }}"
               class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300"
               placeholder="Ejemplo: Gómez">
      </div>

      <div>
        <label for="dni" class="block font-semibold text-blue-900 mb-1">🪪 DNI:</label>
        <input type="text" name="dni" id="dni" maxlength="15" value="{{ old('dni') }}"
               class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300"
               placeholder="Ejemplo: 12345678" required>
      </div>

      <div class="flex justify-between items-center pt-4">
        <a href="{{ route('estudiantes.index') }}" 
           class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-full shadow">
          ⬅️ Volver
        </a>

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-full shadow">
          💾 Guardar
        </button>
      </div>
    </form>
  </div>

</body>
</html>
