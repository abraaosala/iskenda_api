<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de contactos (admin).
 */
class ContactController extends Controller
{
    /**
     * Listar contactos.
     *
     * Retorna todas as mensagens de contacto recebidas, ordenadas da mais recente à mais antiga.
     */
    public function index(): AnonymousResourceCollection
    {
        return ContactResource::collection(
            Contact::latest()->get()
        );
    }

    /**
     * Visualizar contacto.
     *
     * Retorna os detalhes de uma mensagem de contacto específica.
     */
    public function show(Contact $contact): ContactResource
    {
        return new ContactResource($contact);
    }

    /**
     * Remover contacto.
     *
     * Elimina uma mensagem de contacto.
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json(['message' => 'Contacto removido com sucesso.']);
    }
}
