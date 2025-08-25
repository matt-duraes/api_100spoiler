<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Lista todos os livros do usuário.
     * @param Request $request
     * @return response
     */
    public function index(Request $request)
    {
        $idUser = $request->query('user_id');
        if (!$idUser) {
            return response()->json([
                'message' => 'Erro ao buscar livros desse usuário'
            ], status: 400);
        }

        try {
            $books = Book::where('user_id', $idUser)->get()->all();
            return response()->json($books, status: 200);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Não foi possível buscar os livros desse usuário'
            ], status: 404);
        }
    }

    /**
     * Adiciona um novo Livro
     *
     * @param Request $request
     * @return response
     */
    public function store(BookRequest $request)
    {
        $dados = $request->validated();
        try {
            $book = new Book();
            // garantir que user_id esteja presente (vindo do request validado)
            if (!isset($dados['user_id']) && $request->user()) {
                $dados['user_id'] = $request->user()->id;
            }
            $book->fill($dados);
            $book->save();
            return response()->json(['mensagem' => 'Livro cadastrado com sucesso!'], status: 201);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return response()->json([
                'message' => 'Não foi possível cadastrar o livro'
            ], status: 400);
        }
    }

    /**
     * Busca apenas um livro.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Edita um livro.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove um livro.
     */
    public function destroy(string $id)
    {
        //
    }
}
