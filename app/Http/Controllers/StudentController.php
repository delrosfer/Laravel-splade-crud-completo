<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables\Students;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Section;
use App\Models\Student;
use Toast;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Students::class,
        ]);
    }

    public function create()
    {
        $sections = Section::with('class')->get();

        return view('students.create', compact('sections'));
    }

    public function store(StoreStudentRequest $request)
    {
        $section = Section::findOrFail($request->section_id);

        $student = Student::create(
            $request->validated() + ['class_id' => $section->class_id]
            );    
        Toast::title('Estudiante Creado Exitosamente!!')
        ->autoDismiss(5);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $sections = Section::with('class')->get();

        return view('students.edit', compact('student', 'sections'));
    }

    public function update(UpdateStudentRequest $request, Student $student)

    {
        $section = Section::findOrFail($request->section_id);

        $student -> update($request->validated() + ['class_id' => $section->class_id]);

        Toast::title('Estudiante Actualizado Exitosamente!!')
        ->autoDismiss(5);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        Toast::title('Estudiante Eliminado Exitosamente!!')
        ->autoDismiss(5);

        return redirect()->route('students.index');
    }
}
