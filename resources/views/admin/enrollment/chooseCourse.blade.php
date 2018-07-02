@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Escolha o curso que deseja matricular o aluno!                    
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
                            <th>ementa</th>
                            <th>qtdAlunos</th>
                            <th>Ações</th>                            
                        </tr>
                        @foreach($course as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->ementa }}</td>
                                <td>{{ $p->qtdAlunos }}</td>
                                <td>
                                    <a href="/admin/enroll/{{$p->id}}/{{$student->id}}" class="btn btn-warning">Matricular</a>                                
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $course->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
