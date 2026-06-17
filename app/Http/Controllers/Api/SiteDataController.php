<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AcademyOfferResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CompanyValueResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\GalleryItemResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\TeamMemberResource;
use App\Models\AcademyOffer;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\CompanyValue;
use App\Models\Course;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\TeamMember;

/**
 * Dados públicos do site (não requer autenticação).
 */
class SiteDataController extends Controller
{
    /**
     * Dados públicos do site.
     *
     * Retorna todas as informações públicas necessárias para renderizar o site institucional,
     * incluindo dados da empresa, serviços, clientes, cursos, ofertas académicas,
     * valores, equipa e galeria.
     */
    public function __invoke(): array
    {
        $company = CompanyInfo::first();

        return [
            'company' => $company ? [
                'name' => $company->name,
                'fullName' => $company->full_name,
                'slogan' => $company->slogan,
                'foundedYear' => (int) $company->founded_year,
                'yearsExperience' => (int) $company->years_experience,
                'activeClientsCount' => (int) $company->active_clients_count,
                'phone' => $company->phone,
                'email' => $company->email,
                'workingHours' => $company->working_hours,
                'address' => $company->address,
                'copyright' => $company->copyright,
                'logo' => $company->logo ? asset('storage/'.$company->logo) : null,
                'favicon' => $company->favicon ? asset('storage/'.$company->favicon) : null,
                'heroImage' => $company->hero_image ? asset('storage/'.$company->hero_image) : null,
                'socialLinks' => $company->social_links ?? [],
            ] : [
                'name' => 'IS KENDA',
                'fullName' => 'IS KENDA CONSULTORIA & ACADEMIA',
                'slogan' => 'Transformando Conhecimento em Competência e Competência em Resultados',
                'foundedYear' => 2022,
                'yearsExperience' => 4,
                'activeClientsCount' => 20,
                'phone' => '+244 938 198 551',
                'email' => 'geral@iskenda.com',
                'workingHours' => 'Segunda a Sexta-feira, 08h00 às 17h00',
                'address' => 'Luanda, Angola',
                'copyright' => '© 2026 IS KENDA CONSULTORIA & ACADEMIA. Todos os Direitos Reservados.',
                'logo' => null,
                'favicon' => null,
                'heroImage' => null,
                'socialLinks' => [],
            ],
            'services' => ServiceResource::collection(
                Service::orderBy('sort_order')->get()
            ),
            'clients' => ClientResource::collection(
                Client::orderBy('sort_order')->get()
            ),
            'courses' => CourseResource::collection(
                Course::orderBy('sort_order')->get()
            ),
            'academyOffers' => AcademyOfferResource::collection(
                AcademyOffer::orderBy('sort_order')->get()
            ),
            'values' => CompanyValueResource::collection(
                CompanyValue::orderBy('sort_order')->get()
            ),
            'team' => TeamMemberResource::collection(
                TeamMember::orderBy('sort_order')->get()
            ),
            'gallery' => GalleryItemResource::collection(
                GalleryItem::orderBy('sort_order')->get()
            ),
        ];
    }
}
