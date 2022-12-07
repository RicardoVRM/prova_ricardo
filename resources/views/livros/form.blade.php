@extends('layout.app')
@section('title', 'Livros')

@section('content')
    @if (isset($livro))
        <h1>Alterar Livro</h1>
    @else
        <h1>Novo Livro</h1>
    @endif
    <hr>

    <div class="container">
        @if (isset($livro))
            {!! Form::model($livro, [
                'method' => 'put',
                'route' => ['livros.update', $livro->id],
                'class' => 'form-horizontal',
            ]) !!}
        @else
            {!! Form::open([
                'method' => 'post',
                'route' => 'livros.store',
                'class' => 'form-horizontal',
            ]) !!}
        @endif

        <div class="card">
            <div class="card-header">
                <span class="card-tittle">
                    @if (isset($livro))
                        Alterar Livro #{{ $livro->id }}
                    @else
                        Novo Livro
                    @endif
                </span>
            </div>
            <div class="card-body">
                <div class="form-row form-group">
                    {!! Form::label('name', 'Nome', ['class' => 'col-form-label col-sm-2 tect-right']) !!}

                    <div class="col-sm-8">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Informe o nome do livro']) !!}
                    </div>
                </div>
                <div class="form-row form-group">
                    {!! Form::label('descricao', 'Descrição', ['class' => 'col-form-label col-sm-2 tect-right']) !!}

                    <div class="col-sm-8">
                        {!! Form::textarea('descricao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Informe a descricao do livro',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::button('Cancelar', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'windo:history.go(-1);']) !!}
                {!! Form::submit(isset($livro) ? 'Atualizar' : 'Cadastrar', ['class' => 'btn btn-success btn-sm']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
