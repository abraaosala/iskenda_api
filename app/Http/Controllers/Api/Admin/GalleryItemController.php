<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreGalleryItemRequest;
use App\Http\Requests\Api\Admin\UpdateGalleryItemRequest;
use App\Http\Resources\GalleryItemResource;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão da galeria.
 */
class GalleryItemController extends Controller
{
    /**
     * Listar itens da galeria.
     *
     * Retorna todos os itens da galeria ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return GalleryItemResource::collection(
            GalleryItem::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar item na galeria.
     *
     * Adiciona um novo item à galeria. Opcionalmente, permite o upload de um ficheiro de imagem.
     */
    public function store(StoreGalleryItemRequest $request): GalleryItemResource
    {
        $data = $request->validated();

        if ($request->hasFile('src_file')) {
            $data['src'] = $request->file('src_file')->store('uploads/gallery', 'public');
        }

        unset($data['src_file']);

        return new GalleryItemResource(GalleryItem::create($data));
    }

    /**
     * Visualizar item da galeria.
     *
     * Retorna os detalhes de um item específico da galeria.
     */
    public function show(GalleryItem $galleryItem): GalleryItemResource
    {
        return new GalleryItemResource($galleryItem);
    }

    /**
     * Atualizar item da galeria.
     *
     * Atualiza os dados de um item existente. Opcionalmente, permite alterar o ficheiro de imagem.
     */
    public function update(UpdateGalleryItemRequest $request, GalleryItem $galleryItem): GalleryItemResource
    {
        $data = $request->validated();

        if ($request->hasFile('src_file')) {
            $data['src'] = $request->file('src_file')->store('uploads/gallery', 'public');
        }

        unset($data['src_file']);

        $galleryItem->update($data);

        return new GalleryItemResource($galleryItem->fresh());
    }

    /**
     * Remover item da galeria.
     *
     * Elimina um item da galeria.
     */
    public function destroy(GalleryItem $galleryItem): JsonResponse
    {
        $galleryItem->delete();

        return response()->json(['message' => 'Item removido com sucesso.']);
    }
}
