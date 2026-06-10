<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreGalleryItemRequest;
use App\Http\Requests\Api\Admin\UpdateGalleryItemRequest;
use App\Http\Resources\GalleryItemResource;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GalleryItemController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return GalleryItemResource::collection(
            GalleryItem::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    public function store(StoreGalleryItemRequest $request): GalleryItemResource
    {
        $data = $request->validated();

        if ($request->hasFile('src_file')) {
            $data['src'] = $request->file('src_file')->store('uploads/gallery', 'public');
        }

        unset($data['src_file']);

        return new GalleryItemResource(GalleryItem::create($data));
    }

    public function show(GalleryItem $galleryItem): GalleryItemResource
    {
        return new GalleryItemResource($galleryItem);
    }

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

    public function destroy(GalleryItem $galleryItem): JsonResponse
    {
        $galleryItem->delete();

        return response()->json(['message' => 'Item removido com sucesso.']);
    }
}
