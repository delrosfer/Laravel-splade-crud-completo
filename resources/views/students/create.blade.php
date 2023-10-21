<x-splade-modal action="{{ route('students.store') }}">
    <h1 class="mb-3">Crear nuevo Estudiante</h1>

    <x-splade-form>
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
        
     
     
        <x-splade-submit class="mt-3" label="Crear Registro" />
    </x-splade-form>
</x-splade-modal>