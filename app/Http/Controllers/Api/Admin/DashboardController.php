<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Client;
use App\Models\Contact;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
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
