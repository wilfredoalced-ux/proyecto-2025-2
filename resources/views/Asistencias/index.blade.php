<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencias</title>
</head>
<body>
    <h1>Asistencias Registradas</h1>
    <ul>
        @foreach($asistencias as $asistencia)
            <li>{{ $asistencia->nombre }} {{ $asistencia->apellido }} - {{ $asistencia->fecha }} - {{ $asistencia->estado }}</li>
        @endforeach
    </ul>
</body>
</html>
