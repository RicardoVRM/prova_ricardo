@extends('layout.app')

@section('content')
    <h1>Listar Livros</h1>
    <hr>
    <div class="container">
        <a href="{{ route('livros.create') }}" class="btn btn-info btn sm">Cadastrar Novo Livro</a>
        <a href="/" class="btn btn-primary btn sm">Home</a>
    </div>
    <br>
    <div class="container">
        @include('layout.mensagens')

        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($livros as $livro)
                    <tr>
                        <td>{{ $livro->id }}</td>
                        <td class="col-sm-3">{{ $livro->name }}</td>
                        <td class="col-sm-7">{{ $livro->descricao }}</td>
                        <td class="col-sm-2">
                            <a href="{{ route('livros.edit', ['id' => $livro->id]) }}"
                                class="btn btn-warning btn-sm">Editar</a>

                            <form method="POST" action="{{ route('livros.destroy', ['id' => $livro->id]) }}"
                                style="display: inline" onsubmit="retunr confirm('Deseja excluir este registro?');">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
