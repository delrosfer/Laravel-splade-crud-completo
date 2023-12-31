<?php

namespace App\Tables;

use App\Models\Student;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class Students extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return auth()->check();
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Student::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id','name','email','phone_number'])
            ->column('id', sortable: true)
            ->column('name')
            ->column('email')
            ->column('phone_number', exportAs: false)
            ->export(filename: 'silver.xlsx')
            ->perPageOptions([10, 20, 50])
            ->column(label: 'Actions')
            ->bulkAction(
                label: 'Eliminar Estudiantes Seleccionados',
                each: fn (Student $student) => $student->delete(),
                confirm: '¿Está seguro que desea eliminar los estudiantes seleccionados?',
                confirmButton: 'Si, Eliminar todos!',
                cancelButton: 'No, eliminar!',
                after: fn () => Toast::info('Los estudiantes seleccionados fueron eliminados Exitosamente!')->autoDismiss(5),
            )
            ->paginate();

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
