<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\UpdateSiteSectionsRequest;
use App\Http\Resources\SiteSectionResource;
use App\Models\SiteSection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de secções visíveis no site.
 */
class SiteSectionController extends Controller
{
    /**
     * Secções padrão da homepage, na ordem de apresentação.
     *
     * @var array<string, array{label: string, sort_order: int}>
     */
    private const HOME_SECTIONS = [
        'inicio' => ['label' => 'Início (Hero)', 'sort_order' => 1],
        'quem-somos' => ['label' => 'Quem Somos', 'sort_order' => 2],
        'equipa' => ['label' => 'Equipa', 'sort_order' => 3],
        'valores' => ['label' => 'Valores', 'sort_order' => 4],
        'servicos' => ['label' => 'Serviços', 'sort_order' => 5],
        'academia' => ['label' => 'Academia', 'sort_order' => 6],
        'honorarios' => ['label' => 'Honorários', 'sort_order' => 7],
        'clientes' => ['label' => 'Clientes', 'sort_order' => 8],
        'galeria' => ['label' => 'Galeria', 'sort_order' => 9],
        'contactos' => ['label' => 'Contactos', 'sort_order' => 10],
    ];

    /**
     * Listar secções do site.
     *
     * Retorna todas as secções por ordem de apresentação. Se ainda não existirem
     * registos (primeira execução), cria as secções padrão.
     */
    public function index(): AnonymousResourceCollection
    {
        $this->ensureDefaults();

        return SiteSectionResource::collection(
            SiteSection::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Atualizar visibilidade das secções.
     *
     * Recebe um array de secções e atualiza o estado de visibilidade de cada uma.
     */
    public function update(UpdateSiteSectionsRequest $request): AnonymousResourceCollection
    {
        foreach ($request->validated('sections') as $section) {
            SiteSection::where('key', $section['key'])->update([
                'is_visible' => $section['is_visible'],
            ]);
        }

        return SiteSectionResource::collection(
            SiteSection::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Garante que as secções padrão existem na base de dados.
     */
    private function ensureDefaults(): void
    {
        if (SiteSection::count() > 0) {
            return;
        }

        foreach (self::HOME_SECTIONS as $key => $section) {
            SiteSection::create([
                'key' => $key,
                'label' => $section['label'],
                'is_visible' => true,
                'sort_order' => $section['sort_order'],
            ]);
        }
    }
}
