<?php

declare(strict_types=1);

namespace DDD\Services\Presentation;

use DDD\Services\Application\Services\SignUpUserService;
use DDD\Services\Domain\Model\User\UserAlreadyExistsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class SignUpController
{
    public function signUpAction(Request $request): JsonResponse
    {
        $signUpService = new SignUpUserService(
            $this->get('user_repository')
        );

        try {
            $response = $signUpService->execute(
                new SignUpUserRequest(
                    (string)$request->request->get('email'),
                    (string)$request->request->get('password'),
                )
            );
        } catch (UserAlreadyExistsException $exception) {
            return response()->json();
        }
        return response()->json($response);
    }
}
