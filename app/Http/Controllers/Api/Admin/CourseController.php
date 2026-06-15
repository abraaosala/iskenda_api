<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\StoreCourseRequest;
use App\Http\Requests\Api\Admin\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Gestão de cursos.
 */
class CourseController extends Controller
{
    /**
     * Listar cursos.
     *
     * Retorna todos os cursos ordenados por ordem de apresentação.
     */
    public function index(): AnonymousResourceCollection
    {
        return CourseResource::collection(
            Course::orderBy('sort_order')->orderBy('id')->get()
        );
    }

    /**
     * Criar curso.
     *
     * Adiciona um novo curso à academia.
     */
    public function store(StoreCourseRequest $request): CourseResource
    {
        return new CourseResource(Course::create($request->validated()));
    }

    /**
     * Visualizar curso.
     *
     * Retorna os detalhes de um curso específico.
     */
    public function show(Course $course): CourseResource
    {
        return new CourseResource($course);
    }

    /**
     * Atualizar curso.
     *
     * Atualiza os dados de um curso existente.
     */
    public function update(UpdateCourseRequest $request, Course $course): CourseResource
    {
        $course->update($request->validated());

        return new CourseResource($course->fresh());
    }

    /**
     * Remover curso.
     *
     * Elimina um curso da academia.
     */
    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json(['message' => 'Curso removido com sucesso.']);
    }
}
