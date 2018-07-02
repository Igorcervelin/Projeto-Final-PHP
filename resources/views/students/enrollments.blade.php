@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Minhas Matrículas</h3>
                    <p>*Para a situação da Matrícula, no caso de 0, ela ainda não foi autorizada, e no caso de 1, ela está autorizada!</p>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                                   
                            <table class="table">
                                <tr>
                                    <th>Número da Matricula</th>
                                    <th>Número do Aluno</th>
                                    <th>Número do Curso</th>
                                    <th>Situação da Matrícula</th>
                                    <th>Criado em</th>                                    
                                </tr>
                                @foreach($student->courses as $u)
                                    <tr>
                                        <td>{{ $u->pivot->id }}</td>
                                        <td>{{ $u->pivot->user_id }}</td>
                                        <td>{{ $u->pivot->course_id }}</td>
                                        <td>{{ $u->pivot->authorized }}</td>
                                        <td>{{ $u->pivot->created_at }}</td>                                                                    
                                    </tr>
                                @endforeach
                             </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
