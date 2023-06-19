<div class="p-2 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900">
        <div>Personas</div>
    </h1>
    <div class="mt-3">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Apellido</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Teléfono</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Correo</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td class="rounded border px-4 py-2">{{ $persona->id }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->nombre }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->apellido }}</td>
                        <td class="rounded border px-4 py-2">{{ number_format($persona->telefono) }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->correo }}</td>
                        <td class="rounded border px-4 py-2">Editar / Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $personas->links() }}
    </div>
</div>
