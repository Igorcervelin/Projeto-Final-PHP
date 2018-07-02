@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Estudantes
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Endereço</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Dados</th>                            
                        </tr>
                        @foreach($student as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->cpf }}</td>
                                <td>{{ $p->RG }}</td>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->cellphone }}</td>
                                <td>{{ $p->email }}</td>                                                                                    
                                <td>
                                @if($p->admin)
                                    <a href="/student/{{ $p->id }}/updateUser" class="btn btn-info">Tornar Aluno</a>
                                @else
                                    <a href="/student/{{ $p->id }}/updateUser" class="btn btn-success">Tornar Admin</a>
                                @endif                                    
                                        <a href="/student/{{ $p->id }}/delete" class="btn btn-danger">Remover</a>
                                        <a href="admin/student/{{ $p->id }}/enroll" class="btn btn-info">Matricular</a>
                                    </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $student->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
