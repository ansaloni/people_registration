<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="header">
        <h1 class="title">Cadastro de Pessoas</h1>
        <hr>
        <a href="{{ url('/create') }}"><button class="add-btn">Novo</button></a>
    </div>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr class="table-header">
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Idade</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th class="actions-cell">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pessoas as $user)
                    <tr>
                        <td>{{ $user->nome }}</td>
                        <td>{{ $user->enderecos->first()->logradouro ?? '' }}, {{ $user->enderecos->first()->numero ?? '' }} - {{ $user->enderecos->first()->bairro ?? '' }} - {{ $user->enderecos->first()->cidade->nome ?? '' }}</td>
                        <td>{{ $user->idade }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->sexo }}</td>
                        <td class="actions-cell">
                            <button class="edit-btn" type="button" onclick="window.location='{{ url("/{$user->id}/edit") }}'">Editar</button>
                            
                            <form class="delete-form" action="{{ url("/{$user->id}") }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
