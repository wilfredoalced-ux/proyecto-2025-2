<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>✏️ Editar Estudiante</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    .error {
      border-color: #ef4444; /* rojo Tailwind */
      box-shadow: 0 0 5px #ef4444;
    }
    .success {
      border-color: #22c55e; /* verde Tailwind */
      box-shadow: 0 0 5px #22c55e;
    }
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    .input-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
      pointer-events: none;
    }
    .neon-text {
      color: #4d7575ff;
      text-shadow: 0 0 5px #00fffc, 0 0 10px #00fffc, 0 0 15px #00fffc, 0 0 20px #00fffc;
    }
    .neon-border {
      border: 2px solid #00fffc;
      box-shadow: 0 0 10px #00fffc, 0 0 20px #00fffc, 0 0 30px #00fffc;
      transition: box-shadow 0.3s ease;
    }
    .neon-border:hover {
      box-shadow: 0 0 15px #00fffc, 0 0 25px #00fffc, 0 0 40px #00fffc;
    }
    .neon-bg {
      background: linear-gradient(45deg, #00fffc, #ff00ff);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      user-select: none;
    }
    .hover-neon {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-neon:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px #00fffc, 0 0 30px #00fffc, 0 0 40px #00fffc;
    }
    /* Error message styling */
    .error-message {
      color: #ef4444;
      font-size: 0.875rem; /* text-sm */
      margin-top: 0.25rem;
      display: none;
    }
    .error-visible {
      display: block !important;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-blue-100 to-indigo-200 min-h-screen py-10">

  <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-blue-300 fade-in">
    <h1 class="text-4xl font-extrabold text-center neon-text mb-6 select-none">
      ✏️ Editar Estudiante
    </h1>

    {{-- Contenedor de errores generales --}}
    <div id="general-errors" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 hidden"></div>

    {{-- Contenedor de éxito --}}
    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 hidden"></div>

    <form id="studentForm" action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" class="space-y-6" novalidate>
      @csrf
      @method('PUT')

      <div class="relative">
        <label for="codigo" class="block font-semibold text-blue-900 mb-1">🆔 Código:</label>
        <div class="relative neon-border hover-neon rounded-lg">
          <span class="input-icon">🆔</span>
          <input
            type="text"
            id="codigo"
            name="codigo"
            value="{{ old('codigo', $estudiante->codigo) }}"
            class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
            required
            autocomplete="off"
          />
        </div>
        <p id="codigo-error" class="error-message">El código es requerido.</p>
      </div>

      <div class="relative">
        <label for="nombres" class="block font-semibold text-blue-900 mb-1">👤 Nombres:</label>
        <div class="relative neon-border hover-neon rounded-lg">
          <span class="input-icon">👤</span>
          <input
            type="text"
            id="nombres"
            name="nombres"
            value="{{ old('nombres', $estudiante->nombres) }}"
            class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
            required
            autocomplete="off"
          />
        </div>
        <p id="nombres-error" class="error-message">Los nombres son requeridos.</p>
      </div>

      <div class="relative">
        <label for="pri_ape" class="block font-semibold text-blue-900 mb-1">🧾 Primer Apellido:</label>
        <div class="relative neon-border hover-neon rounded-lg">
          <span class="input-icon">🧾</span>
          <input
            type="text"
            id="pri_ape"
            name="pri_ape"
            value="{{ old('pri_ape', $estudiante->pri_ape) }}"
            class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
            required
            autocomplete="off"
          />
        </div>
        <p id="pri_ape-error" class="error-message">El primer apellido es requerido.</p>
      </div>

      <div class="relative">
        <label for="seg_ape" class="block font-semibold text-blue-900 mb-1">🧾 Segundo Apellido:</label>
        <div class="relative neon-border hover-neon rounded-lg">
          <span class="input-icon">🧾</span>
          <input
            type="text"
            id="seg_ape"
            name="seg_ape"
            value="{{ old('seg_ape', $estudiante->seg_ape) }}"
            class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
            autocomplete="off"
          />
        </div>
        <p id="seg_ape-error" class="error-message">El segundo apellido es requerido.</p>
      </div>

      <div class="relative">
        <label for="dni" class="block font-semibold text-blue-900 mb-1">🪪 DNI:</label>
        <div class="relative neon-border hover-neon rounded-lg">
          <span class="input-icon">🪪</span>
          <input
            type="text"
            id="dni"
            name="dni"
            maxlength="8"
            value="{{ old('dni', $estudiante->dni) }}"
            class="w-full pl-10 pr-4 py-2 border-none rounded-lg focus:ring focus:ring-blue-300 focus:outline-none"
            required
            autocomplete="off"
          />
        </div>
        <p id="dni-error" class="error-message">El DNI es requerido y debe tener 8 dígitos.</p>
      </div>

      <div class="text-center pt-4">
        <button
          type="submit"
          class="bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white font-semibold py-2 px-6 rounded-full shadow transition neon-text"
        >
          💾 Guardar Cambios
        </button>
      </div>
    </form>

    <div class="text-center mt-6">
      <a href="{{ route('estudiantes.index') }}" class="text-blue-600 hover:underline neon-text select-none">
        ← Volver a la lista de estudiantes
      </a>
    </div>
  </div>

  <script>
    const form = document.getElementById('studentForm');
    const generalErrorsDiv = document.getElementById('general-errors');
    const successMessageDiv = document.getElementById('success-message');

    // Mostrar error específico
    function showError(fieldId, message) {
      const errorEl = document.getElementById(fieldId + '-error');
      const inputEl = document.getElementById(fieldId);
      errorEl.textContent = message;
      errorEl.classList.add('error-visible');
      inputEl.classList.add('error');
    }

    // Ocultar error específico
    function hideError(fieldId) {
      const errorEl = document.getElementById(fieldId + '-error');
      const inputEl = document.getElementById(fieldId);
      errorEl.classList.remove('error-visible');
      inputEl.classList.remove('error');
    }

    // Validación simple en cliente antes de enviar
    function validateForm() {
      let valid = true;

      // Validar código
      const codigo = form.codigo.value.trim();
      if (!codigo) {
        showError('codigo', 'El código es requerido.');
        valid = false;
      } else {
        hideError('codigo');
      }

      // Validar nombres
      const nombres = form.nombres.value.trim();
      if (!nombres) {
        showError('nombres', 'Los nombres son requeridos.');
        valid = false;
      } else {
        hideError('nombres');
      }

      // Validar primer apellido
      const pri_ape = form.pri_ape.value.trim();
      if (!pri_ape) {
        showError('pri_ape', 'El primer apellido es requerido.');
        valid = false;
      } else {
        hideError('pri_ape');
      }

      // Segundo apellido no es obligatorio, ocultamos error por si acaso
      hideError('seg_ape');

      // Validar DNI
      const dni = form.dni.value.trim();
      if (!dni || dni.length !== 8 || !/^\d{8}$/.test(dni)) {
        showError('dni', 'El DNI es requerido y debe tener 8 dígitos numéricos.');
        valid = false;
      } else {
        hideError('dni');
      }

      return valid;
    }

    // Validación en tiempo real
    form.querySelectorAll('input').forEach(input => {
      input.addEventListener('input', () => {
        if (input.value.trim() !== '') {
          hideError(input.id);
        }
      });
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      generalErrorsDiv.classList.add('hidden');
      successMessageDiv.classList.add('hidden');
      generalErrorsDiv.innerHTML = '';

      if (!validateForm()) {
        generalErrorsDiv.textContent = 'Por favor, corrige los errores en el formulario.';
        generalErrorsDiv.classList.remove('hidden');
        generalErrorsDiv.focus();
        return;
      }

      const formData = new FormData(this);

      axios.post(this.action, formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
      })
      .then(response => {
        successMessageDiv.textContent = '✅ Estudiante actualizado exitosamente!';
        successMessageDiv.classList.remove('hidden');
        // Opcional: redirigir tras unos segundos
        setTimeout(() => {
          window.location.href = "{{ route('estudiantes.index') }}";
        }, 2000);
      })
      .catch(error => {
        if (error.response && error.response.status === 422) {
          // Mostrar errores de validación del servidor
          const errors = error.response.data.errors;
          generalErrorsDiv.innerHTML = '<ul class="list-disc list-inside"></ul>';
          const ul = generalErrorsDiv.querySelector('ul');
          for (const key in errors) {
            errors[key].forEach(msg => {
              ul.innerHTML += `<li>${msg}</li>`;
              showError(key, msg);
            });
          }
          generalErrorsDiv.classList.remove('hidden');
          generalErrorsDiv.focus();
        } else {
          alert('Ocurrió un error inesperado. Inténtalo nuevamente.');
        }
      });
    });
  </script>

</body>
</html>
