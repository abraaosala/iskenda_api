<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreCompanyValueRequest;
use App\Http\Requests\Api\Admin\UpdateCompanyValueRequest;
use App\Http\Resources\CompanyValueResource;
use App\Models\CompanyValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de valores da empresa.
 */
class CompanyValueController extends Controller
{
    /**
     * Listar valores da empresa.
     *
     * Retorna todos os valores corporativos ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return CompanyValueResource::collection(
            CompanyValue::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar valor corporativo.
     *
     * Adiciona um novo valor ao conjunto de valores da empresa.
     */
    public function store(StoreCompanyValueRequest $request): CompanyValueResource
    {
        return new CompanyValueResource(CompanyValue::create($request->validated()));
    }

    /**
     * Visualizar valor corporativo.
     *
     * Retorna os detalhes de um valor específico.
     */
    public function show(CompanyValue $companyValue): CompanyValueResource
    {
        return new CompanyValueResource($companyValue);
    }

    /**
     * Atualizar valor corporativo.
     *
     * Atualiza os dados de um valor existente.
     */
    public function update(UpdateCompanyValueRequest $request, CompanyValue $companyValue): CompanyValueResource
    {
        $companyValue->update($request->validated());

        return new CompanyValueResource($companyValue->fresh());
    }

    /**
     * Remover valor corporativo.
     *
     * Elimina um valor do conjunto de valores da empresa.
     */
    public function destroy(CompanyValue $companyValue): JsonResponse
    {
        $companyValue->delete();

        return response()->json(['message' => 'Valor removido com sucesso.']);
    }
}
