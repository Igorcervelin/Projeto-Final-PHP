<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class CourseController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $user = Auth::User();
    }

    public function index()
    {
        $user = Auth::User();
        $course = Course::paginate(1);
        
        if($user->admin){
            
            return view('admin/courses/index', ['course' => $course]);
        }else{
            return view('students/index',['course'=>$course]);
        } 
    }

    public function create() 
    {
        $user = Auth::User();

        if($user->admin){
            return view('admin/courses/new');
        }else{
            \Session::flash('status', 'Você não tem permissão para acessar essa página!');
            return redirect('course');
        }
    }

    public function store(Request $request) 
    {
        $p = new Course;
        $p->nome = $request->input('nome');
        $p->ementa = $request->input('ementa');
        $p->qtdAlunos = $request->input('qtdAlunos');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso!');
            return redirect('course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso!');
            return view('admin/courses.new');
        }
    }

    public function destroy($id)
     {
        $user = Auth::User();

        if($user->admin){
            $p = Course::findOrFail($id);
            $p->delete();

            \Session::flash('status', 'Curso excluído com sucesso.');
            return redirect('course');
        }else{
            \Session::flash('status', 'Você não tem permissão para acessar essa página!.');
            return redirect('course');
        }
        
    }

    public function edit($id) {

        $user = Auth::User();

        if($user->admin){
            $course = Course::findOrFail($id);
            
            return view('admin/courses.edit', ['course' => $course]);
        }else{
            \Session::flash('status', 'Você não tem permissão para acessar essa página!.');
            return redirect('course');
        }
    }

    public function update(Request $request, $id) {
        $user = Auth::User();

        if($user->admin){
            $p = Course::findOrFail($id);
            $p->nome = $request->input('nome');
            $p->ementa = $request->input('ementa');
            $p->qtdAlunos = $request->input('qtdAlunos');
            
            if ($p->save()) {
                \Session::flash('status', 'Curso atualizado com sucesso!');
                return redirect('course');
            } else {
                \Session::flash('status', 'Ocorreu um erro ao atualizar o Curso.');
                return view('courses.edit');
            }
        }else{
            \Session::flash('status', 'Você não tem permissão para acessar essa página!.');
            return redirect('course'); 
        }
    }


}