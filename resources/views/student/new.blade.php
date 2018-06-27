@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de Alunos                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/student', 'method' => 'post']) !!}
                        <div class="form-group row">
                            {{ Form::label('name', 'Nome:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('cpf', 'CPF:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::Number('cpf', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('endereco', 'Endereco:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('endereco', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('rg', 'RG:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::Number('rg', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('cell', 'Telefone:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::Number('cell', null, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>
                        <div class="form-group row">
                                {{ Form::label('course', 'Selecione um curso:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                        <select name="course_id">';
                                                <option>Selecione...</option>
                                                @foreach($course as $p)
                                                <option value="{{$p->id}}"> {{$p->course}} </option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>
                        

                         <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection