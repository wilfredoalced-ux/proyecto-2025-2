<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🎓 Lista de Estudiantes</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-indigo-200 min-h-screen py-10">

  <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-blue-300">
    <h1 class="text-4xl font-extrabold text-center text-indigo-700 mb-6">
      🎓 Lista de Estudiantes
    </h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded mb-6 text-center">
        ✅ {{ session('success') }}
      </div>
    @endif

    <div class="text-center mb-4">
      <a href="{{ route('estudiantes.create') }}" 
         class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-full shadow transition duration-300">
        ➕ Agregar Estudiante
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-indigo-500 text-white uppercase tracking-wider">
          <tr>
            <th class="p-3 text-left">🆔 ID</th>
            <th class="p-3 text-left">🆔 Código</th>
            <th class="p-3 text-left">👤 Nombres</th>
            <th class="p-3 text-left">🧾 Primer Apellido</th>
            <th class="p-3 text-left">🧾 Segundo Apellido</th>
            <th class="p-3 text-left">🪪 DNI</th>
            <th class="p-3 text-center">✏️ Editar</th>
            <th class="p-3 text-center">🗑️ Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($estudiantes as $estudiante)
            <tr class="hover:bg-blue-50 transition-colors border-b border-gray-200">
              <td class="p-3 text-gray-700">{{ $estudiante->id }}</td>
              <td class="p-3 font-semibold text-gray-900">{{ $estudiante->codigo }}</td>
              <td class="p-3 font-semibold text-gray-900">{{ $estudiante->nombres }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->pri_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->seg_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->dni }}</td>
              
              {{-- Botón Editar --}}
              <td class="p-3 text-center">
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" 
                   class="inline-flex items-center bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded shadow transition duration-300">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2l-6 6m-3 4v3h3l7-7-3-3-7 7z" />
                   </svg>
                   Editar
                </a>
              </td>

              {{-- Botón Eliminar --}}
              <td class="p-3 text-center">
                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?');" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded shadow transition duration-300">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center p-4 text-gray-600">📭 No hay estudiantes registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>
