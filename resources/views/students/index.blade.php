<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Estudiantes') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <Link slideover href="{{ route('students.create') }}" 
                class="inline-flex rounded-md shadow-sm bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">
                Crear Estudiante
            </Link>

            <x-splade-table class="bg-orange-200" :for="$students">
                <x-slot:empty-state>
                    <p>No hay registros en la bd!</p>
                </x-slot>

                <x-splade-cell actions as="$student">
                    <Link slideover href="{{ route('students.edit', $student->id) }}"> Editar </Link>
                    <x-splade-form action="{{ route('students.destroy', $student) }}" method="DELETE" confirm>
                        <button class="text-bold text-indigo-600" type="submit">Eliminar</button>
                    </x-splade-form>

                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
