@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos
                    <a href="/course/create" class="float-right btn btn-success">Novo curso</a>
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
                            <th>Curso</th>
                            <th>Ementa</th>
                            <th>Maximo de alunos</th>
                        </tr>
                        
                        @foreach($states as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->course }}</td>
                                <td>{{ $p->ementa }}</td>
                                <td>{{ $p->max_alunos }}</td>
                                <td>
                                    <a href="/course/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>
                            
                                    {!! Form::open(['url' => "/course/$p->id", 'method' => 'delete']) !!}
                                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
