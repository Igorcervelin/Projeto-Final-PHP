<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\State;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $student = DB::table('students')->join('course', 'students.course_id', '=', 'course.id')
            ->select('students.id','students.nome_ci')->get();

        return view('student/index', ['student' => $student]);
    }

    public function create() 
    {
        $course = Course::all();
        return view('student/new', ['courses' => $course]);
    }

    public function store(Request $request) 
    {
        $p = new Student;
        $p->name = $request->input('name');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->endereco = $request->input('endereco');
        $p->cell = $request->input('cell');

        
        if ($p->save()) {
            \Session::flash('status', 'Aluno registrado com sucesso.');
            return redirect('/student');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao registrar o aluno.');
            return view('student.new');
        }
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        $course = Course::all();

        return view('student.edit', ['student' => $student] ,['course' => $course]);
    }

    public function delete($id) {
        $student = Student::findOrFail($id);

        return view('student.delete', ['student' => $student]); 
    }

    public function update(Request $request, $id) {
        $p = Student::findOrFail($id);
        $p->name = $request->input('name');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->endereco = $request->input('endereco');
        $p->cell = $request->input('cell');
        
        if ($p->save()) {
            \Session::flash('status', 'Dados do aluno atualizados com sucesso.');
            return redirect('/student');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar os dados.');
            return view('student.edit', ['student' => $p]);
        }
    }

    public function destroy($id) {
        $p = Student::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Aluno excluída com sucesso.');
        return redirect('/student');
    }
}
