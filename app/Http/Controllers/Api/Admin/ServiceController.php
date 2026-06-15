<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreServiceRequest;
use App\Http\Requests\Api\Admin\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de serviços.
 */
class ServiceController extends Controller
{
    /**
     * Listar serviços.
     *
     * Retorna todos os serviços ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return ServiceResource::collection(
            Service::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar serviço.
     *
     * Adiciona um novo serviço ao portfólio da empresa.
     */
    public function store(StoreServiceRequest $request): ServiceResource
    {
        $service = Service::create($request->validated());

        return new ServiceResource($service);
    }

    /**
     * Visualizar serviço.
     *
     * Retorna os detalhes de um serviço específico.
     */
    public function show(Service $service): ServiceResource
    {
        return new ServiceResource($service);
    }

    /**
     * Atualizar serviço.
     *
     * Atualiza os dados de um serviço existente.
     */
    public function update(UpdateServiceRequest $request, Service $service): ServiceResource
    {
        $service->update($request->validated());

        return new ServiceResource($service->fresh());
    }

    /**
     * Remover serviço.
     *
     * Elimina um serviço do portfólio.
     */
    public function destroy(Service $service): JsonResponse
    {
        $service->delete();

        return response()->json(['message' => 'Serviço removido com sucesso.']);
    }
}
