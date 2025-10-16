<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Asistencia</title>
</head>
<body>
    <h1>Registrar Asistencia</h1>

    <form action="{{ route('asistencias.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="date" name="fecha">
        <input type="text" name="estado" placeholder="Presente/Ausente">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
