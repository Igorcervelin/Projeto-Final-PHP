@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Matrículas!</h3>
                    <p>*Para a situação da Matrícula, no caso de 0, ela ainda não foi autorizada, e no caso de 1, ela está autorizada!</p>                    
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                                   
                            <table class="table">
                                <tr>
                                    <th>Número da Matricula</th>
                                    <th>Nome do Aluno</th>
                                    <th>Nome do Curso</th>
                                    <th>Situação da Matrícula</th>
                                    <th>Efetuada Em</th>
                                    <th>Ações</th>                                                                  
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        @foreach($user->courses as $course)
                                            <tr>
                                                <td>{{ $course->pivot->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $course->nome }}</td>
                                                <td>{{ $course->pivot->authorized }}</td>
                                                <td>{{ $course->pivot->created_at }}</td> 
                                                @if($course->pivot->authorized==0)
                                                    <td><a href="enrollment/authorize/{{$course->id}}/{{$user->id}}" class="btn btn-success">Autorizar</a></td> 
                                                @else
                                                    <td></td>
                                                @endif                           
                                                <td><a href="enrollment/delete/{{$course->id}}/{{$user->id}}" class="btn btn-danger">Delete</a></td>                                      
                                            </tr>
                                        @endforeach
                                    </tr>
                                @endforeach
                             </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
