<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LivroRequest;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.list', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livros.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livro = Livro::create($request->all());
        if ($livro) {
            Session::flash('success', "Livro #{$livro->id} cadastrado com sucesso.");

            return redirect()->route('livros.index');
        }
        return redirect()->back()->with(['error', 'Erro ao salvar Livro']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);

        if ($livro) {
            return view('livros.form', compact('livro'));
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $livro = Livro::where('id', $id)->update($request->except('_token', '_method'));
        if ($livro) {
            Session::flash('success', "Livro #{$id} alterado com sucesso.");

            return redirect()->route('livros.index');
        }
        return redirect()->back()->with(['error', "Erro ao alterar Livro #{$id}"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::where('id', $id)->delete();
        if ($livro) {
            Session::flash('success', "Livro #{$id} excluído com sucesso.");

            return redirect()->route('livros.index');
        }
        return redirect()->back()->with(['error', "Erro ao excluir Livro #{$id}"]);
    }
}
