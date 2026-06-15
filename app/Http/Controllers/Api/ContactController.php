<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

/**
 * Formulário de contacto público.
 */
class ContactController extends Controller
{
    /**
     * Enviar mensagem de contacto.
     *
     * Endpoint público para envio de mensagens através do formulário de contacto do site.
     */
    public function store(StoreContactRequest $request): ContactResource
    {
        $contact = Contact::create($request->validated());

        return new ContactResource($contact);
    }
}
