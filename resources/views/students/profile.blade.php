@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Perfil!                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/student/$student->id", 'method' => 'put']) !!}
                        <div class="form-group row">
                            {{ Form::label('nome', 'Nome do Aluno:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', $student->name, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('cpf', 'cpf:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('cpf', $student->cpf, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('RG', 'RG:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::number('RG', $student->RG, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('endereço', 'endereço:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('address', $student->address, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('cellphone', 'celular:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::number('cellphone', $student->cellphone, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('email', 'email:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                {{ Form::text('email', $student->email, ['class' => 'form-control form-control-sm'] ) }}
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