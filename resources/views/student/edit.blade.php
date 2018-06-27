@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edição de aluno                   
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/student/$student->id", 'method' => 'put']) !!}
                    <div class="form-group row">
                        {{ Form::label('name', 'Nome:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name', $student->name, ['class' => 'form-control form-control-sm'] ) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('cpf', 'CPF:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                                {{ Form::Number('cpf', $student->cpf, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('rg', 'RG:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                                {{ Form::Number('cpf', $student->rg, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('endereco', 'Endereco:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {{ Form::text('nome', $student->endereco, ['class' => 'form-control form-control-sm'] ) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('cell', 'Telefone:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                                {{ Form::Number('cpf', $student->cell, ['class' => 'form-control form-control-sm'] ) }}
                            </div>
                    </div>

                    <div class="form-group row">
                            {{ Form::label('curso', 'Selecione um curso:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                            <div class="col-sm-10">
                                    {{-- {{dd($decoy)}} --}}
                                    <select name="course_id">';
                                            @foreach($course as $p)
                                                @if($p->id==$student->course_id)
                                                    <option value="{{$p->id}}">{{$p->course}}</option>
                                                @endif
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
