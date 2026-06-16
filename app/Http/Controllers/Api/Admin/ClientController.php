<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreClientRequest;
use App\Http\Requests\Api\Admin\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de clientes.
 */
class ClientController extends Controller
{
    /**
     * Listar clientes.
     *
     * Retorna todos os clientes ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return ClientResource::collection(
            Client::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar cliente.
     *
     * Adiciona um novo cliente ao portfólio. Opcionalmente, permite o upload do logótipo.
     */
    public function store(StoreClientRequest $request): ClientResource
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/clients', 'public');
        }

        return new ClientResource(Client::create($data));
    }

    /**
     * Visualizar cliente.
     *
     * Retorna os detalhes de um cliente específico.
     */
    public function show(Client $client): ClientResource
    {
        return new ClientResource($client);
    }

    /**
     * Atualizar cliente.
     *
     * Atualiza os dados de um cliente existente. Opcionalmente, permite alterar o logótipo.
     */
    public function update(UpdateClientRequest $request, Client $client): ClientResource
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('uploads/clients', 'public');
        }

        $client->update($data);

        return new ClientResource($client->fresh());
    }

    /**
     * Remover cliente.
     *
     * Elimina um cliente do portfólio.
     */
    public function destroy(Client $client): JsonResponse
    {
        $client->delete();

        return response()->json(['message' => 'Cliente removido com sucesso.']);
    }
}
