<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Client;
use App\Models\Contact;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\TeamMember;

/**
 * Painel administrativo.
 */
class DashboardController extends Controller
{
    /**
     * Resumo do painel.
     *
     * Retorna estatísticas gerais (contagem de serviços, clientes, membros da equipa, itens da galeria)
     * e os últimos 5 contactos recebidos.
     */
    public function __invoke(): array
    {
        return [
            'stats' => [
                'services' => Service::count(),
                'clients' => Client::count(),
                'team' => TeamMember::count(),
                'gallery' => GalleryItem::count(),
                'experience' => [
                    'years' => 4,
                    'suffix' => 'anos',
                ],
            ],
            'recentContacts' => ContactResource::collection(
                Contact::latest()->take(5)->get()
            ),
        ];
    }
}
