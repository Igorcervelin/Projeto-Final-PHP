<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\State;
use App\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if($user->admin){
                
                $users = User::with('courses')->get();
                return view('admin/enrollment/enrollments',['users' =>$users]);
                                                
      
        }else{
            $user = Auth::user();
            $idStudent = Auth::user()->id;
            $student = User::find($idStudent);
 
            return view('students/enrollments',['student' =>$student]);
        }
    }

    public function enroll($idCourse)
    {
        $idStudent = Auth::user()->id;
        $student = User::find($idStudent);
        $course = Course::find($idCourse);
       
        if($student->courses->contains($course)){

            \Session::flash('status', 'Você já está cadastrado nesse curso!');
            return redirect('/course');
        }else{
            $student->courses()->attach($idCourse);
            return redirect('enrollment');
        }
    }

    public function registers()
    {
        $idStudent = Auth::user()->id;
        $student = User::find($idStudent);
       
       
        return view('students/enrollments',['student' =>$student]);
    }

    public function authorization($idCourse,$idUser)
    {
        $user=Auth::User();

        if($user->admin)
        {
            $users = User::find($idUser)->courses()->updateExistingPivot($idCourse,['authorized' => 1]);
            \Session::flash('status', 'A matrícula do estudante foi autorizada!');
            return redirect('/enrollment');
        }else{
            \Session::flash('status', 'Ação não permitida para seu usuário!');
            return redirect('course');
        }
    }

    public function destroy($idC,$idStudent)
    {
        $user=Auth::User();
        
        if($user->admin){
            $student = User::find($idStudent);
            $course = Course::find($idC);
            $student->courses()->detach($idC);
            \Session::flash('status', 'A matrícula foi deletada.');
            return redirect('/enrollment');
        }else{
            \Session::flash('status', 'Ação não permitida para seu usuário!');
            return redirect('/course');
        }            
    }

    public function listCourses($id)
    {
        $user = Auth::User();

        if($user->admin){
            $student = User::find($id);
            $course = Course::paginate(2);
            return view('admin/enrollment/chooseCourse',['student' =>$student], ['course' =>$course]);
        }else{
            \Session::flash('status', 'Ação não permitida para seu usuário!');
            return redirect('/student');
        }
    }

    public function enrollAdm($idCourse,$idStudent)
    {
        $user=Auth::User();

        if($user->admin){
            $student = User::find($idStudent);
            $course = Course::find($idCourse);
            if($student->courses->contains($course)){
                \Session::flash('error', 'O Aluno ja está cadastrado nesse curso');
                return redirect('/student');
            }else{
                \Session::flash('status', 'Aluno matriculado com sucesso!');
                $student->courses()->attach($idCourse);
                $users = User::find($idStudent)->courses()->updateExistingPivot($idCourse,['authorized' => 1]);
                return redirect('/enrollment');
            }
        }else{
            \Session::flash('error', 'Ação não permitida para seu usuário!');
            return redirect('/student');
        }

    }

}