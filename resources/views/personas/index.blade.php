
@extends('layouts.app')
@section('content')


<div class="container mx-auto">
<h1 class=" bg-blue-300">Listado de Personas</h1>



<table class="p-4 bg-blue-500">
    <thead>
        <tr>
            <!--<th>Código</th>-->
            <th class="bg-blue-200 border-b px-4 py-2">Nombre</th>
            <th class="bg-blue-200 border-b px-4 py-2">Apellido</th>
            <th class="bg-blue-200 border-b px-4 py-2">celular</th>
            <th class="bg-blue-200 border-b px-4 py-2">correo</th>
            <!-- Agrega más columnas según tus atributos -->
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $Persona)
            <tr>
                <td class="text-red-500" >{{ $Persona->nombre }}</td>
                <td class="border-b px-4 py-2">{{ $Persona->apellido }}</td>
                <td class="border-b px-4 py-2">{{ $Persona->celular }}</td>
                <td class="border-b px-4 py-2">{{ $Persona->correo }}</td>
                <!-- Agrega más columnas según tus atributos -->
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
