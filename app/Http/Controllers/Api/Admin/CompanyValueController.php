<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreCompanyValueRequest;
use App\Http\Requests\Api\Admin\UpdateCompanyValueRequest;
use App\Http\Resources\CompanyValueResource;
use App\Models\CompanyValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyValueController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CompanyValueResource::collection(
            CompanyValue::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    public function store(StoreCompanyValueRequest $request): CompanyValueResource
    {
        return new CompanyValueResource(CompanyValue::create($request->validated()));
    }

    public function show(CompanyValue $companyValue): CompanyValueResource
    {
        return new CompanyValueResource($companyValue);
    }

    public function update(UpdateCompanyValueRequest $request, CompanyValue $companyValue): CompanyValueResource
    {
        $companyValue->update($request->validated());

        return new CompanyValueResource($companyValue->fresh());
    }

    public function destroy(CompanyValue $companyValue): JsonResponse
    {
        $companyValue->delete();

        return response()->json(['message' => 'Valor removido com sucesso.']);
    }
}
