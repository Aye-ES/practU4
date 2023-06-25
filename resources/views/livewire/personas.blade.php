<div class="p-2 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-4 text-2xl font-medium text-gray-900 flex justify-between shadow-inner">
        <div>Personas</div>
        <div class "mr-2">
            <x-button wire:click="confirmPersonaAdd">
                Agregar Persona al Registro
            </x-button>
        </div>
    </h1>
    <div class="mt-3">
        <div class="flex justify-between">
            <div>
                <input wire:model.debounce.500ms="q" type="search" placeholder="Buscar"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-blue-400">
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('id')">
                                <div class="flex items-center">
                                    ID
                                    <x-sort-icon sortField="id" :sortBy="$sortBy" :sortAsc="$sortAsc" />
                                </div>
                            </button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('nombre')">
                                <div class="flex items-center">
                                    Nombre
                                    <x-sort-icon sortField="nombre" :sortBy="$sortBy" :sortAsc="$sortAsc" />
                                </div>
                            </button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('apellido')">
                                <div class="flex items-center">
                                    Apellido
                                    <x-sort-icon sortField="apellido" :sortBy="$sortBy" :sortAsc="$sortAsc" />
                                </div>
                            </button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('celular')">
                                <div class="flex items-center">
                                    Celular
                                    <x-sort-icon sortField="celular" :sortBy="$sortBy" :sortAsc="$sortAsc" />
                                </div>
                            </button>
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortBy('correo')">
                                <div class="flex items-center">
                                    Correo
                                    <x-sort-icon sortField="correo" :sortBy="$sortBy" :sortAsc="$sortAsc" />
                                </div>
                            </button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td class="rounded border px-4 py-2">{{ $persona->id }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->nombre }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->apellido }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->celular }}</td>
                        <td class="rounded border px-4 py-2">{{ $persona->correo }}</td>
                        <td class="rounded border px-4 py-2">
                            <x-button wire:click="confirmPersonaEdit ({{ $persona->id }})">
                                Editar
                            </x-button>
                            <x-danger-button wire:click="confirmPersonaDeletion ({{ $persona->id }})"
                                wire:loading.attr="disabled">
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $personas->links() }}
    </div>
    <x-dialog-modal wire:model="confirmingPersonaDeletion">
        <x-slot name="title">
            {{ __('Eliminar Persona') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Está segur@ que desea eliminar a la persona del registro?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingPersonaDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deletePersona ({{ $confirmingPersonaDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model="confirmingPersonaAdd">
        <x-slot name="title">
            {{ isset($this->persona->id) ? 'Editar Persona' : 'Agregar Persona' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input id="persona.nombre" type="text" class="mt-1 block w-full"
                    wire:model.defer="persona.nombre" />
                <x-input-error for="persona.nombre" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="apellido" value="{{ __('Apellido') }}" />
                <x-input id="persona.apellido" type="text" class="mt-1 block w-full"
                    wire:model.defer="persona.apellido" />
                <x-input-error for="persona.apellido" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="celular" value="{{ __('Celular') }}" />
                <x-input id="persona.celular" type="text" class="mt-1 block w-full"
                    wire:model.defer="persona.celular" />
                <x-input-error for="persona.celular" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="correo" value="{{ __('Correo') }}" />
                <x-input id="persona.correo" type="text" class="mt-1 block w-full"
                    wire:model.defer="persona.correo" />
                <x-input-error for="persona.correo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingPersonaAdd', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="savePersona ()" wire:loading.attr="disabled">
                {{ __('Agregar') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
