<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreTeamMemberRequest;
use App\Http\Requests\Api\Admin\UpdateTeamMemberRequest;
use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de membros da equipa.
 */
class TeamMemberController extends Controller
{
    /**
     * Listar membros da equipa.
     *
     * Retorna todos os membros da equipa ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return TeamMemberResource::collection(
            TeamMember::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar membro da equipa.
     *
     * Adiciona um novo membro à equipa. Opcionalmente, permite o upload da foto.
     */
    public function store(StoreTeamMemberRequest $request): TeamMemberResource
    {
        $data = $request->validated();

        if (! isset($data['color_class'])) {
            $data['color_class'] = 'bg-brand-blue text-white';
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads/team-members', 'public');
        }

        return new TeamMemberResource(TeamMember::create($data));
    }

    /**
     * Visualizar membro da equipa.
     *
     * Retorna os detalhes de um membro específico.
     */
    public function show(TeamMember $teamMember): TeamMemberResource
    {
        return new TeamMemberResource($teamMember);
    }

    /**
     * Atualizar membro da equipa.
     *
     * Atualiza os dados de um membro existente. Opcionalmente, permite alterar a foto.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember): TeamMemberResource
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads/team-members', 'public');
        }

        $teamMember->update($data);

        return new TeamMemberResource($teamMember->fresh());
    }

    /**
     * Remover membro da equipa.
     *
     * Elimina um membro da equipa.
     */
    public function destroy(TeamMember $teamMember): JsonResponse
    {
        $teamMember->delete();

        return response()->json(['message' => 'Membro removido com sucesso.']);
    }
}
