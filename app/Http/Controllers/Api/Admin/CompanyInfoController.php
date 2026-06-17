<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\UpdateCompanyInfoRequest;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Storage;

/**
 * Gestão de informações da empresa.
 */
class CompanyInfoController extends Controller
{
    /**
     * Visualizar informações da empresa.
     *
     * Retorna os dados institucionais da empresa. Se não existirem, retorna os valores padrão.
     */
    public function show()
    {
        $info = CompanyInfo::first();

        if (! $info) {
            $info = CompanyInfo::create([
                'name' => 'IS KENDA',
                'full_name' => 'IS KENDA CONSULTORIA & ACADEMIA',
                'slogan' => 'Transformando Conhecimento em Competência e Competência em Resultados',
                'founded_year' => 2022,
                'years_experience' => 4,
                'active_clients_count' => 20,
                'phone' => '+244 938 198 551',
                'email' => 'geral@iskenda.com',
                'working_hours' => 'Segunda a Sexta-feira, 08h00 às 17h00',
                'address' => 'Luanda, Angola',
                'copyright' => '© 2026 IS KENDA CONSULTORIA & ACADEMIA. Todos os Direitos Reservados.',
            ]);
        }

        return response()->json($this->format($info));
    }

    /**
     * Atualizar informações da empresa.
     *
     * Atualiza os dados institucionais da empresa. Opcionalmente, permite o upload do logótipo,
     * favicon e imagem de herói.
     */
    public function update(UpdateCompanyInfoRequest $request)
    {
        $info = CompanyInfo::first();

        if (! $info) {
            $info = new CompanyInfo;
        }

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($info->logo) {
                Storage::disk('public')->delete($info->logo);
            }
            $data['logo'] = $request->file('logo')->store('uploads/company', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($info->favicon) {
                Storage::disk('public')->delete($info->favicon);
            }
            $data['favicon'] = $request->file('favicon')->store('uploads/company', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($info->hero_image) {
                Storage::disk('public')->delete($info->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('uploads/company', 'public');
        }

        $info->fill($data);
        $info->save();

        return response()->json($this->format($info->fresh()));
    }

    private function format(CompanyInfo $info): array
    {
        return array_merge($info->toArray(), [
            'logo' => $info->logo ? asset('storage/'.$info->logo) : null,
            'favicon' => $info->favicon ? asset('storage/'.$info->favicon) : null,
            'hero_image' => $info->hero_image ? asset('storage/'.$info->hero_image) : null,
            'social_links' => $info->social_links ?? [],
        ]);
    }
}
