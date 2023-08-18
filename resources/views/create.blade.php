<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adicionar Pessoa</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Adicionar Registro</h2>
        <form class="data-form" action="{{ url('/') }}" method="POST">
            @csrf
            <fieldset class="personal-data">
                <legend>Dados Pessoais</legend>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class="input-field" type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input class="input-field" type="number" name="idade" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="input-field" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Sexo:</label>
                    <input type="radio" id="generoM" name="sexo" value="Masculino">
                    <label for="generoM">Masculino</label>

                    <input type="radio" id="generoF" name="sexo" value="Feminino">
                    <label for="generoF">Feminino</label>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input class="input-field" type="password" id="senha" name="senha">
                </div>
                
                <div class="form-group">
                    <label for="confirmaSenha">Confirme a Senha:</label>
                    <input class="input-field" type="password" id="confirmaSenha" name="confirmaSenha" required>
                </div>
            </fieldset>

            <fieldset class="address-data">
                <legend>Endereço</legend>
                
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input class="input-field" type="text" id="cep" name="cep">
                </div>
                <div class="form-group">
                    <label for="tipoLogradouro">Tipo de Logradouro:</label>
                    <select class="input-field" id="tipoLogradouro" name="tipoLogradouro">
                        @foreach($tiposLogradouro as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro:</label>
                    <input class="input-field" type="text" id="logradouro" name="logradouro">
                </div>
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input class="input-field" type="text" id="numero" name="numero">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input class="input-field" type="text" id="bairro" name="bairro">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <select class="input-field" id="cidade" name="cidade">
                        @foreach($cidades as $cidade)
                            <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
            <div class="form-buttons">
                <button class="submit-btn" type="submit">Salvar</button>
                <button class="reset-btn" type="reset">Limpar</button>
                <button class="cancel-btn" type="button" onclick="window.location='{{ url('/') }}'">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
