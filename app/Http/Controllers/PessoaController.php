<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\TipoLogradouro;
use App\Models\Cidade;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::with('enderecos')->get();
        return view('index', compact('pessoas'));
    }

    public function create()
    {
        $tiposLogradouro = TipoLogradouro::all();
        $cidades = Cidade::all();

        return view('create', compact('tiposLogradouro', 'cidades'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:60',
            'idade' => 'required|integer',
            'email' => 'required|email|max:60',
            'sexo' => 'required|in:Masculino,Feminino',
            'senha' => 'nullable|min:6', 
            'cep' => 'nullable|numeric',
            'tipoLogradouro' => 'required|exists:tipo_logradouros,id', 
            'logradouro' => 'nullable|string|max:200',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string|max:60',
            'cidade' => 'required|exists:cidades,id',
        ]);

        $pessoa = Pessoa::create($validatedData);

        $enderecoData = [
            'tipo_logradouro_id' => $request->tipoLogradouro,
            'cidade_id' => $request->cidade,
            'pessoa_id' => $pessoa->id,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
        ];
        $endereco = Endereco::create($enderecoData);

        $pessoa->enderecos()->save($endereco);

        return redirect('/');
    }

    public function edit($id)
    {
        $user = Pessoa::with('enderecos')->findOrFail($id);
        $tiposLogradouro = TipoLogradouro::all();
        $cidades = Cidade::all();

        return view('edit', compact('user', 'tiposLogradouro', 'cidades'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:60',
            'idade' => 'required|integer',
            'email' => 'required|email|max:60',
            'sexo' => 'required|in:Masculino,Feminino',
            'senha' => 'nullable|min:6',
            'cep' => 'nullable|numeric',
            'tipoLogradouro' => 'required|exists:tipo_logradouros,id', 
            'logradouro' => 'nullable|string|max:200',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string|max:60',
            'cidade' => 'required|exists:cidades,id', 
        ]);

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($validatedData);

        $endereco = $pessoa->enderecos->first();
        $endereco->update([
            'tipo_logradouro_id' => $request->tipoLogradouro,
            'cidade_id' => $request->cidade,
            'pessoa_id' => $pessoa->id,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->enderecos()->delete(); 
        $pessoa->delete(); 

        return redirect('/');
    }
}
