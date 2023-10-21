<x-splade-modal >
    <h1 class="mb-3">Editar Estudiante ({{ $student->name }})</h1>

    <x-splade-form action="{{ route('students.update', $student) }}" :default="$student" method="PUT">
        
        <x-splade-input name="name" label="Nombre del Estudiante" class="mb-3"/>
        <x-splade-input name="email" label="Correo Electrónico" class="mb-3" type="email" />
        <x-splade-input name="phone_number" label="Teléfono" class="mb-3" type="text" />

        
        <x-splade-select name="section_id">
            <option value="" selected>Selecciona una Opción</option>
            @foreach($sections as $section)
               <option value="{{ $section->id }}">
                        {{ $section->class->name }}-{{ $section->name }}
                </option>
            @endforeach
        </x-splade-select>
        
     
     
        <x-splade-submit class="mt-3" label="Actualizar Registro" />
    </x-splade-form>
</x-splade-modal>