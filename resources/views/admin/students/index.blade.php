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

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Endereço</th>
                            <th>Celular</th>
                            <th>Email</th>
                        </tr>
                        @foreach($student as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->cpf }}</td>
                                <td>{{ $p->rg }}</td>
                                <td>{{ $p->endereco }}</td>
                                <td>{{ $p->cell }}</td>
                                <td>{{ $p->email }}</td>                        
                                <td>
                                    <!--<a href="/student/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>-->
                                    <a href="/student/{{ $p->id }}/delete" class="btn btn-danger">Remover</a>
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