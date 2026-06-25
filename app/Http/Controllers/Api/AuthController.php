<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Autenticação de administradores.
 */
class AuthController extends Controller
{
    /**
     * Login do administrador.
     *
     * Autentica o administrador e retorna um token de acesso Sanctum (Bearer Token)
     * juntamente com os dados do utilizador.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    /**
     * Terminar sessão.
     *
     * Invalida o token de acesso atual do administrador.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sessão terminada com sucesso.']);
    }

    /**
     * Dados do utilizador autenticado.
     *
     * Retorna as informações do administrador atualmente autenticado.
     */
    public function me(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    /**
     * Atualizar perfil.
     *
     * Atualiza o nome e email do administrador autenticado.
     * Retorna um novo token caso o email tenha sido alterado.
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $emailChanged = $user->email !== $request->email;

        $user->update($request->validated());

        if ($emailChanged) {
            $user->tokens()->delete();
            $token = $user->createToken('auth-token')->plainTextToken;
        }

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token ?? null,
        ]);
    }

    /**
     * Alterar palavra-passe.
     *
     * Valida a palavra-passe atual e atualiza para a nova.
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = $request->user();

        if (! Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['A palavra-passe actual está incorrecta.'],
            ]);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return response()->json(['message' => 'Palavra-passe alterada com sucesso.']);
    }
}
