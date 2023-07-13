<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $check = Testamento::all();

        if (count($check) > 0) {
            return response()->json($check);
        }

        return response()->json(['message' => 'Nenhum testamento encontrado']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $check = Testamento::create($request->all());

        if ($check) {
            return response()->json(['message' => 'Cadastrado com sucesso', 'content' => $request->all()]);
        }
        return response()->json(['message' => 'Erro ao cadastrar', 'content' => $request->all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $testamentoExist = Testamento::find($id);

        if($testamentoExist){
            return response()->json($testamentoExist);
        }
        
        return response()->json(['message' => 'Testamento não encontrado', 'content' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {

        $testamentoExist = Testamento::find($id);

        if ($testamentoExist) {

            $update = Testamento::find($id)->update($request->all());

            if ($update) {
                return response()->json(['message' => 'Testamento atualizado com sucesso!', 'content' => $request->all()]);
            }
            return response()->json(['message' => 'Não foi possivel atualizar o testamento!', 'content' => $request->all()]);
        }

        return response()->json(['message' => 'Testamento não encontrado', 'content' => $request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {

        $content = Testamento::find($id);

        if (!is_null($content)) {
            $destroy = Testamento::destroy($id);

            if ($destroy) {
                return  response()->json(['message' => 'Testamento deletado com sucesso', 'content' => $content]);
            }

            return response()->json(['message' => 'Erro ao deletar testamento', 'content' => $content]);
        }

        return response()->json(['message' => 'Nenhum registro encontrado', 'id' => $id]);
    }
}
